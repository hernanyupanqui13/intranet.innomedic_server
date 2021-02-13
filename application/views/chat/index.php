<div class="row">
    <div class="col-12">
        <div class="card m-b-0">
            <!-- .chat-row -->
            <div class="chat-main-box">
                <!-- .chat-left-panel -->
                <div class="chat-left-aside">
                    <div class="open-panel"><i class="ti-angle-right"></i></div>
                    <div class="chat-left-inner">
                        <div class="form-material">
                            <input class="form-control p-2" id="buscar_contacto" type="text" placeholder="Buscar contacto">
                        </div>
                        <ul class="chatonline style-none"  id="chatUser-list-container">
                            <!--<li>
                                <a href="javascript:void(0)"><img src="<?php echo base_url().'assets_sistema/';?>images/users/1.jpg" alt="user-img" class="img-circle"><span>RR.HH<small class="text-success">online</small></span></a>
                            </li>                                           
                            <li class="p-20"></li>-->
                        </ul>
                        
                    </div>
                </div>
                <!-- .chat-left-panel -->
                <!-- .chat-right-panel -->
                <div class="chat-right-aside">
                    <div class="chat-main-header">
                        <div class="p-3 b-b">
                            <h4 class="box-title">Mensaje de chat</h4>
                        </div>
                    </div>
                    <div class="chat-rbox">
                        <ul class="chat-list p-3" id="chat-board">
                           
                        </ul>
                    </div>
                    <div class="card-body border-top">
                        <form class="row" id="chat-form">
                            <div class="col-8">
                                <textarea placeholder="Escribe tu mensaje aquí" name="mensaje-input" class="form-control border-0"></textarea>
                            </div>
                            <div class="col-4 text-right">
                                <button type="submit" class="btn btn-info btn-circle btn-lg"><i class="fas fa-paper-plane"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- .chat-right-panel -->
            </div>
            <!-- /.chat-row -->
        </div>
    </div>
</div>
<script src="<?php echo base_url().'application/views/chat/chat-index.js'?>" type="module"></script>
<style>
.chat_user_a {
    display: grid;
    grid-template-columns: min-content auto 30px

}

.unred_mess {
    width: 30px;
    height: 30px;
    background-color: #03a9f3;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color:white;

}
</style>
