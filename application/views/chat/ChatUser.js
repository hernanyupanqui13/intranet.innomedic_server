export default class ChatUser {
    
    constructor(the_userId, the_userName, the_user_state, the_profile_photo, the_unread_messages = 0) {
        this.userId = the_userId;

        if(the_user_state === "1") {
            this.user_state = "Online";
        } else {
            this.user_state = "Offline";
        }

        this.profile_photo = `${window.location.origin}/upload/images/${the_profile_photo}`;   
        this.userName = the_userName;
        this.htmlElement;
        this.current_conversation;
        this.unread_messages = the_unread_messages;
    }

    sendMessageTo(anotherUser, mensaje) {
        let self= this;
        $.ajax({
            type: "POST",
            async:false,
            url: `${window.location.origin}/Chat/Chat/sendMessage/`,
            data: {"mensaje": mensaje, "from_user": self.userId, "to_user": anotherUser.userId}
        });
    }

    renderOn(parentHtmlElement) {
        const container = document.createElement("li");
        let unread_messages_html;
        
        let class_of_state = "";
        if(this.user_state == "Online") {
            class_of_state = "text-success";
        } else {
            class_of_state = "text-danger";
        }

        if(this.unread_messages == 0 || this.unread_messages == undefined || this.unread_messages == null) {
            unread_messages_html = ""
        } else {
            unread_messages_html = `<div class="unred_mess">${this.unread_messages}</div>`
        }

        // Creating the html content
        container.innerHTML = `
            <a href="javascript:void(0)" class="chat_user_a">
                <img src="${this.profile_photo}" alt="user-img" class="img-circle">
                <span>${this.userName}<small class="${class_of_state}">${this.user_state}</small></span>
                ${unread_messages_html}
            </a>
        `;

        this.htmlElement = container;
        parentHtmlElement.appendChild(container);
    }

    getConversationWith(anotherUser) {
        let self = this;
        let response;

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                response = JSON.parse(this.responseText);
            }
        };
        xhttp.open("POST", `${window.location.origin}/Chat/Chat/getConversationWith`, false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`current_user=${self.userId}&target_user=${anotherUser.userId}`);
        
        return response;
    }    

    async getUnreadMessagesFrom(another_user) {        

        const n_new_msg = await $.ajax({
            type: "POST",
            async:true,
            url: `${window.location.origin}/Chat/Chat/getUnreadMessages/`,
            data: {"from_user":another_user.userId}
        });

        return parseInt(n_new_msg);

    }

    renderUnreadMessagesNotification(n_of_unread_msg) {

        let notification_element = this.htmlElement.querySelector(".unred_mess");

        if(notification_element == null) {
            const new_msg_notif_html = document.createElement("div");
            new_msg_notif_html.classList.add("unred_mess");
            new_msg_notif_html.innerHTML = n_of_unread_msg;
            let item = this.htmlElement.querySelector(".chat_user_a");
            item.appendChild(new_msg_notif_html);
        } else  {
            notification_element.innerHTML = n_of_unread_msg;
        }        
    }
}