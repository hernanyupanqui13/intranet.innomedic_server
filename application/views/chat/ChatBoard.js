import ChatUser from './ChatUser.js';

export default class ChatBoard {
    constructor(main_html_parent) {
        let self = this;

        // HTML elements 
        this.conversation_board = main_html_parent.querySelector("#chat-board");
        this.barra_buscar_contacto = main_html_parent.querySelector("#buscar_contacto");
        this.chat_form = main_html_parent.querySelector("#chat-form");        
        this.mensaje_input = main_html_parent.querySelector("#chat-form")['mensaje-input'];
        this.chat_user_list_container = document.getElementById("chatUser-list-container");


        // Variables
        this.current_user;
        this.target_user;
        this.chat_user_list;
        this.active_conversation;
        this.new_msg_interval;
        this.current_filter_condition = "";

        // Obtaining and defining data
        this.defineCurrentUser();
        this.defineChatUserList();

        this.chat_form.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                this.processMessageSending(event);
            }
        }.bind(self));

        this.chat_form.addEventListener("submit", function (event) {this.processMessageSending(event);}.bind(self));
        this.setSearchBar();
        this.updateNewMsgNotifications();
    }

    defineCurrentUser() {
        let self = this;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                let response_obj = JSON.parse(this.responseText);
                self.current_user = new ChatUser(response_obj.current_user_id, response_obj.nombre, response_obj.estado, response_obj.imagen);
            }
        }

        xhttp.open("GET", `${window.location.origin}/Chat/Chat/getCurrentUser`, false);
        xhttp.send();
    }

    defineChatUserList(filter_pattern = "") {
        let self=this;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
    
            if (this.readyState == 4 && this.status == 200) {
                let list = JSON.parse(this.responseText);
                self.chat_user_list = list.map(function(item) {
                    return new ChatUser(item.Id, item.nombre, item.connect, item.imagen_perfil, item.unread_messages);
                });
            }
        }

        xhttp.open("GET", `${window.location.origin}/Chat/Chat/getChatUserList/${filter_pattern}`, false);
        xhttp.send();
    }

    renderEverything() {
        let self = this;
        self.chat_user_list_container.innerHTML = "";
        this.chat_user_list.forEach(function(one_chat_user) {
            one_chat_user.renderOn(self.chat_user_list_container);
            one_chat_user.htmlElement.addEventListener("click", () => self.setTargetUser(one_chat_user));
        });

        this.barra_buscar_contacto.scrollIntoView();
        if (this.target_user != null && this.target_user != undefined) {
            this.target_user.htmlElement.focus();
        }        
    }

    setTargetUser(targeted_user) {
        
        let self = this;
        this.target_user = targeted_user;

        this.barra_buscar_contacto.scrollIntoView();
        this.target_user.htmlElement.focus();

        clearInterval(self.new_msg_interval);

        this.resetConversationBoard();
        this.viewMessage(targeted_user);

        
        
        this.new_msg_interval = setInterval(() => {
            this.checkIfNewMessage(targeted_user).then((data) => {

                if (data===true) {
                    clearInterval(self.new_msg_interval);
                    this.setTargetUser(targeted_user);
                }
                
            });
    
        }, 2000);        
    }

    async checkIfNewMessage(from_user) {

        let condition;    
        let number_of_msg = [...document.querySelectorAll(".from_message")].length

        const my_ajax = await $.ajax({
            type: "POST",
            async:true,
            url: `${window.location.origin}/Chat/Chat/checkIfNewMessage/`,
            data: {"n_msg_client": number_of_msg, "from_user": from_user.userId}
        });

        if (my_ajax == "false") {
            condition = false;
        } else if (my_ajax == "true")
            condition = true;
            

        return condition;
    }

    updateNewMsgNotifications() {

        setInterval(() => {            
            this.resetChatUsersList();
        }, 6000);
    }

    resetChatUsersList() {
        this.defineChatUserList(this.current_filter_condition);
        this.renderEverything();
    }

    viewMessage(targeted_user) {

        // This is to change the view state in the browser
        $.ajax({
            type: "POST",
            async:false,
            url: `${window.location.origin}/Chat/Chat/viewMessage/`,
            data: {"from_user": targeted_user.userId},  
    
        });

        // This is to change the notifications in the client
        const unread_number_html = targeted_user.htmlElement.querySelector(".unred_mess");
        if (unread_number_html!=null) {unread_number_html.remove();}
    }


    resetConversationBoard() {
        let self = this;
        this.conversation_board.innerHTML="";

        this.active_conversation = this.current_user.getConversationWith(self.target_user);

        this.renderActiveConversation();
        this.barra_buscar_contacto.scrollIntoView();
        
        if (this.target_user.htmlElement != null && this.target_user.htmlElement != undefined) {
            this.target_user.htmlElement.focus();
        }

    }

    processMessageSending(event) {
        event.preventDefault();

        this.current_user.sendMessageTo(this.target_user, this.mensaje_input.value);

        this.resetConversationBoard();
        this.chat_form.reset();
        this.barra_buscar_contacto.scrollIntoView();
        this.target_user.htmlElement.focus();
    }

    renderActiveConversation() {
        let self = this; 
        this.conversation_board.innerHTML = "";
        this.active_conversation.forEach(function(item) {
            
            const li_conversation_item = document.createElement("li");
            
            if (item.from_user == self.current_user.userId) {

                li_conversation_item.classList.add("reverse");
                li_conversation_item.classList.add("to_message");
               
                li_conversation_item.innerHTML = `
                <div class="chat-content">
                    <h5>` + self.current_user.userName + `</h5>
                    <div class="box bg-light-info">` + item.message + `</div>
                    <div class="chat-time">` + item.time_send + `</div>
                </div>
                <div class="chat-img"><img src="` + self.current_user.profile_photo + `" alt="user" /></div>
                `;

            } else {       
                
                li_conversation_item.classList.add("from_message");

                li_conversation_item.innerHTML = `
                <div class="chat-img"><img src="` + self.target_user.profile_photo + `" alt="user" /></div>
                <div class="chat-content">
                    <h5>` + self.target_user.userName + `</h5>
                    <div class="box bg-light-info">` + item.message + `</div>
                    <div class="chat-time">` + item.time_send + `</div>
                </div>
                `;
            }

            self.conversation_board.appendChild(li_conversation_item);
            li_conversation_item.scrollIntoView();
            
        });
    }

    setSearchBar() {
        let self = this;
        this.barra_buscar_contacto.addEventListener("keyup", function (event) {
            
            if (event.keyCode === 13) {
                self.current_filter_condition = self.barra_buscar_contacto.value;
                self.resetChatUsersList();
            }
           
        });

    }
}