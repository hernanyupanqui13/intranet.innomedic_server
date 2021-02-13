(function($){
	$('#frm_login').submit(function(ev){
		ev.preventDefault();
		$("#alert").html("");
		//$("#username").removeAttr('');
		$.ajax({
			url:'validate/',
			type: "POST",
			data: $(this).serialize(), 
			success: function(data){
				var json= JSON.parse(data);
				//console.log(json.url);
				window.location.replace(json.url);
			},
			statusCode:{
				400: function(xhr){
					$("#username").html('');

					$("#password").html('');

					var json = JSON.parse(xhr.responseText);
					if (json.username.length !=0) {
						$("#username").html(json.username);	
					}
					if (json.password.length !=0) {
						$("#password").html(json.password);

					}
				},
				401: function(xhr){
					var json = JSON.parse(xhr.responseText);
					$("#alert").html(' <div class="alert alert-danger text-center" id="alerta" role="alert">'+json.msg+'</div>');
				}
			}
			

		});
	});
})(jQuery)