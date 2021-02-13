$(function() {
  $('#WAButton').floatingWhatsApp({
    phone: '51946887798', //WhatsApp Business phone number International format-
    //Get it with Toky at https://toky.co/en/features/whatsapp.
    headerTitle: '¡Chatea con nosotros en WhatsApp!', //Popup Title
    popupMessage: 'Hola, ¿Como te podemos Ayudar?', //Popup Message
    showPopup: true, //Enables popup display
   // buttonImage: '<img src="public/assets/color/btn_whatsapp.png"/>',
   // buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', //Button Image
    //headerColor: 'crimson', //Custom header color
    //backgroundColor: 'crimson', //Custom background button color
    position: "left"    
  });
});
