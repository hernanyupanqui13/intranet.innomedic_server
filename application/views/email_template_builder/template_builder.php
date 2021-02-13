<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Plantilla Editable</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <style type="text/css">
  
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

  img {
    max-width: 600px;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
  }

  a img { border: none; }
  table { border-collapse: collapse !important; }
  #outlook a { padding:0; }
  .ReadMsgBody { width: 100%; }
  .ExternalClass {width:100%;}
  .backgroundTable {margin:0 auto; padding:0; width:100%;}
  table td {border-collapse: collapse;}
  .ExternalClass * {line-height: 115%;}


  /* General styling */

  td {
    font-family: Arial, sans-serif;
    color: #6f6f6f;
  }

  body {
    -webkit-font-smoothing:antialiased;
    -webkit-text-size-adjust:none;
    width: 100%;
    height: 100%;
    color: #6f6f6f;
    font-weight: 400;
    font-size: 18px;
  }


  h1 {
    margin: 10px 0;
  }

  a {
    color: #27aa90;
    text-decoration: none;
  }

  .force-full-width {
    width: 100% !important;
  }

  .force-width-80 {
    width: 80% !important;
  }


  .body-padding {
    padding: 0 75px;
  }

  .mobile-align {
    text-align: right;
  }

  
    .editable_text {
        background:none;
        border:none;
        font: inherit;
        text-align:center;
        overflow-y: visible;
        
    }

    .logo_img { 
        width: 100%;
        height: 150px;
        max-width:100%;
        display: flex;
        align-items:center;
    }

    .footer_links_container {
      display: flex; 
      flex-flow: row wrap;
      justify-content: center;
      margin-top: 10px;
    }

    .footer_links {
      display: block;
      border-radius: 5px;
      margin: 5px;
      padding: 10px;
      font-size: 20px;
      background-color: #03a9f3;
      color: white;
      text-decoration: none;
    }

    .main_grid_container {
      display: grid;
      grid-template-columns: 1fr 3fr; 
      grid-template-rows: auto min-content auto;
    }

    .footer_links_container {
      grid-column: 2/3;
      grid-row: 2/3;
    }

    .item_container {
      border-radius: 8px;
      background-color: white;
      margin:5px;
      padding:5px 15px;
      font-family: Poppins, sans-serif,serif;
      display: grid;
      grid-template-columns: auto min-content;

    }
    
    .item_container:hover {      
      cursor: pointer;
    }

    
    .active_template .date_modification {
      color:white;
    }

    .active_template {
      background-color: #03a9f3;
    }

    .template_name {
      font-weight: 100;
      color: black;
      font-family: Poppins, sans-serif,serif !important;
      grid-column: 1/2;

    }

    .date_modification {
      color: gray;
      font-weight:100;
      font-size:14px;
      font-family: Poppins, sans-serif,serif !important;
      grid-column: 1/2;
    }
    .icon_container {
      grid-column: 2/3;
      grid-row: 1/2;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .view_list {
      margin:5px;
      padding:0px;
    }

    .h3_template {
      font-family: Poppins, sans-serif, serif !important;
    }

    .side_menu_template {
      grid-row: 1/4;
    }

    .close_icon {
      width: 20px;
      height: 20px;
      display:flex;
      justify-content: center;
      align-items:center;
      background-color: #ED6A5A;
      color: white;
      font-weight: bold;
      padding-left: 1px;
    }




  </style>

  <style type="text/css" media="screen">
      @media screen {
        @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,900);
        /* Thanks Outlook 2013! */
        * {
          font-family: 'Source Sans Pro', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
        }
        .w280 {
          width: 280px !important;
        }
      }
  </style>

  <style type="text/css" media="only screen and (max-width: 480px)">
    /* Mobile styles */
    @media only screen and (max-width: 480px) {

      table[class*="w320"] {
        width: 320px !important;
      }

      td[class*="w320"] {
        width: 280px !important;
        padding-left: 20px !important;
        padding-right: 20px !important;
      }

      img[class*="w320"] {
        width: 250px !important;
        height: 67px !important;
      }

      td[class*="mobile-spacing"] {
        padding-top: 10px !important;
        padding-bottom: 10px !important;
      }

      *[class*="mobile-hide"] {
        display: none !important;
      }

      *[class*="mobile-br"] {
        font-size: 12px !important;
      }

      td[class*="mobile-w20"] {
        width: 20px !important;
      }

      img[class*="mobile-w20"] {
        width: 20px !important;
      }

      td[class*="mobile-center"] {
        text-align: center !important;
      }

      table[class*="w100p"] {
        width: 100% !important;
      }

      td[class*="activate-now"] {
        padding-right: 0 !important;
        padding-top: 20px !important;
      }

      td[class*="mobile-block"] {
        display: block !important;
      }

      td[class*="mobile-align"] {
        text-align: left !important;
      }

    }

  </style>
</head>
<body  class="body" style="padding:0; margin:0; display:block; background:transparent; -webkit-text-size-adjust:none;">
<div class="main_grid_container">
<div class="side_menu_template">
  <div class="h3 h3_template">Plantillas guardadas</div>
  <ul class="view_list" id="the_view_list"></ul>
</div>
  <div id="html_page">
    <table align="center" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td align="center" valign="top" style="background-color:transparent" width="100%">

        <center>

          <table cellspacing="0" cellpadding="0" width="600" class="w320">
            <tr>
              <td align="center" valign="top">


              <table style="margin:0 auto;" cellspacing="0" cellpadding="0" width="100%">
                <tr style="background-color:white;">
                  <td style="text-align: center;">
                    <a href="http://www.innomedic.pe" target="_blank"><div class="logo_img"><img src="<?=base_url();?>/assets/images/innomedic.png?v=1790690457"></div></a>
                  </td>
                </tr>
              </table>


              <table cellspacing="0" cellpadding="0" class="force-full-width" style="background-color:#3bcdb0;">
                <tr>
                  <td style="background-color:#3bcdb0;">

                    <table cellspacing="0" cellpadding="0" class="force-full-width">
                      <tr>
                        <td style="font-size:40px; font-weight: 600; color: #ffffff; text-align:center;" class="mobile-spacing">
                        <div class="mobile-br"><br></div>
                          <span class="editable_text" role="textbox"contenteditable>Your order shipped!</span>
                        <br/>
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size:24px; text-align:center; padding: 0 75px; color: #6f6f6f;" class="w320 mobile-spacing">
                        <span class="editable_text" role="textbox"contenteditable>We would like you to know that your order has shipped! Details below.</span>
                        </td>
                      </tr>
                    </table>

                    <table cellspacing="0" cellpadding="0" width="100%">
                      <tr>
                        <td>
                          <img src="https://www.filepicker.io/api/file/4BgENLefRVCrgMGTAENj" style="max-width:100%; display:block;">
                        </td>
                      </tr>
                    </table>

                  </td>
                </tr>
              </table>

              <table cellspacing="0" cellpadding="0" class="force-full-width" bgcolor="#ffffff" >
                <tr>
                  <td style="background-color:#ffffff; padding-top: 15px;">

                  <center>
                  

                    <table style="margin:0 auto;" cellspacing="0" cellpadding="0" class="force-width-80">
                      <tr>
                        <td  class="mobile-block">
                        <br>

                          <table cellspacing="0" cellpadding="0" class="force-full-width">
                            <tr>
                              <td style="border-bottom:1px solid #e3e3e3; font-weight: bold; text-align:left">
                              <span class="editable_text" role="textbox"contenteditable>Delivery Date</span>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:left;"><span class="editable_text" role="textbox"contenteditable>
                              Monday, 20th May 2014</span>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>


                    <table style="margin: 0 auto;" cellspacing="0" cellpadding="0" class="force-width-80">
                      <tr>
                        <td style="text-align: left;">
                        <br><span class="editable_text" role="textbox"contenteditable>
                          To track or view your order please click the button below. Thank you for your business.<br><br>
                          Awesome Inc</span>
                        </td>
                      </tr>
                    </table>
                  </center>

                  <table style="margin:0 auto;" cellspacing="0" cellpadding="10" width="100%">
                    <tr>
                      <td style="text-align:center; margin:0 auto;">
                      <br>
                        <div><!--[if mso]>
                          <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:180px;" stroke="f" fillcolor="#f5774e">
                            <w:anchorlock/>
                            <center>
                          <![endif]-->
                              <a href="javascript:void(0)" id="final_link_container" target="_blank"
                            style="background-color:#f5774e;color:#ffffff;display:inline-block;font-family: Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:45px;text-align:center;text-decoration:none;width:180px;-webkit-text-size-adjust:none;">
                                <span id="final_link">My Order</span>
                            </a>
                              <!--[if mso]>
                            </center>
                          </v:rect>
                        <![endif]--></div>
                        <br>
                      </td>
                    </tr>
                  </table>


                  <!-- Footer de la plantilla, quitado por requerimiento, se puede volver a activar, contiene links de redes solciales -->
                  <!--
                  <table cellspacing="0" cellpadding="0" bgcolor="#363636"  class="force-full-width">
                    <tr>
                      <td style="background-color:#363636; text-align:center;">
                      <br>
                      <br>
                        <a href="https://www.facebook.com/InnomedicInternational/" target="_blank"><img width="68" height="56" src="https://www.filepicker.io/api/file/W6gXqm5BRL6qSvQRcI7u"></a>
                        <a href="https://twitter.com/innomedic_peru?lang=es" target="_blank"><img width="61" height="56" src="https://www.filepicker.io/api/file/eV9YfQkBTiaOu9PA9gxv"></a>
                      <br>
                      <br>
                      </td>
                    </tr>
                    <tr>
                      <td style="color:#f0f0f0; font-size: 14px; text-align:center; padding-bottom:4px;">
                        © 2021 All Rights Reserved
                      </td>
                    </tr>
                    <tr>
                      <td style="color:#27aa90; font-size: 14px; text-align:center;">
                        <a href="javascript:void(0)" id="testing">Ver en el navegador</a> | <a href="#">Contacto</a> | <a href="#">Darse de baja</a>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-size:12px;">
                      </td>
                    </tr>
                  </table>-->

                  </td>
                </tr>
              </table>







              </td>
            </tr>
          </table>

        </center>




        </td>
      </tr>
    </table>
  </div>

  <div class="footer_links_container" style="">
    <a href="javascript:void(0)" class="footer_links" id="download_button" onclick="downloadImage()">Termine de editar la plantilla!</a>
    <a href="javascript:void(0)" class="footer_links" id="save_template" onclick="saveTemplate()">Guardar Plantilla</a>
  </div> 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="<?php echo base_url().'assets_sistema/';?>dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" type="text/JavaScript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.js" type="text/JavaScript"></script>


<script src="<?=base_url();?>/application/views/email_template_builder/script.js"></script>

</body>
</html>