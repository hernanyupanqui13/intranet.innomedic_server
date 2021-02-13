(function ($) {

"use strict";

var $document = $(document),
	$window = $(window),
	forms = {
	contactForm: $('#contactForm'),
	questionForm: $('#questionForm'),
	bookingForm: $('#bookingForm'),
	bookingForm_nosotros: $('#bookingForm_nosotros'),
	requestForm: $('#requestForm')

};

$document.on('ready', function () {

	// datepicker
	if ($('.datetimepicker').length) {
		$('.datetimepicker').datetimepicker({
			format: 'YYYY/MM/DD',
			ignoreReadonly: true,
			icons: {
				time: 'icon icon-clock',
				date: 'icon icon-calendar2',
				up: 'icon icon-top',
				down: 'icon icon-bottom',
				previous: 'icon icon-left',
				next: 'icon icon-right',
				today: 'icon icon-tick',
				clear: 'icon icon-close',
				close: 'icon icon-close'
			}
		});
	}
	if ($('.timepicker').length) {
		$('.timepicker').datetimepicker({
			format: 'LT',
			ignoreReadonly: true,
			icons: {
				time: 'icon icon-clock',
				up: 'icon icon-top',
				down: 'icon icon-bottom',
				previous: 'icon icon-left',
				next: 'icon icon-right'
			}
		});
	}

	// contact page form
	if (forms.contactForm.length) {
		var $contactform = forms.contactForm;
		$contactform.validate({
			rules: {
				name: {
					required: true,
					minlength: 2
				},
				message: {
					required: true,
					minlength: 20
				},
				email: {
					required: true,
					email: true
				}

			},
			messages: {
				name: {
					required: "Please enter your name",
					minlength: "Your name must consist of at least 2 characters"
				},
				message: {
					required: "Please enter message",
					minlength: "Your message must consist of at least 20 characters"
				},
				email: {
					required: "Please enter your email"
				}
			},
			submitHandler: function submitHandler(form) {
				$(form).ajaxSubmit({
					type: "POST",
					data: $(form).serialize(),
					url: "form/process-contact.php",
					success: function success() {
						$('.successform', $contactform).fadeIn();
						$contactform.get(0).reset();
					},
					error: function error() {
						$('.errorform', $contactform).fadeIn();
					}
				});
			}
		});
	}

	// question form
	if (forms.questionForm.length) {
		var $questionForm = forms.questionForm;
		$questionForm.validate({
			rules: {
				name: {
					required: true,
					minlength: 2
				},
				messages: {
					required: true,
					minlength: 20
				},
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				name: {
					required: "Please enter your name",
					minlength: "Your name must consist of at least 2 characters"
				},
				message: {
					required: "Please enter message",
					minlength: "Your message must consist of at least 20 characters"
				},
				email: {
					required: "Please enter your email"
				}
			},
			submitHandler: function submitHandler(form) {
				$(form).ajaxSubmit({
					type: "POST",
					data: $(form).serialize(),
					url: "form/process-question.php",
					success: function success() {
						$('.successform', $questionForm).fadeIn();
						$questionForm.get(0).reset();
					},
					error: function error() {
						$('.errorform', $questionForm).fadeIn();
					}
				});
			}
		});
	}

	// booking form
	if (forms.bookingForm.length) {
		var $bookingForm = forms.bookingForm;
		$bookingForm.validate({
			rules: {
				bookingname: {
					required: true,
					minlength: 2
				},/*
				bookingmessage: {
					required: true,
					//minlength: 20
				},*/
				bookingemail: {
					required: true,
					email: true
				},
				bookingtime: {
					required: true,
					//email: true
				},
				bookingservice: {
					required: true,
					//email: true
				},
				bookingdate: {
					required: true,
					//email: true
				},
				bookingphone: {
					required: true,
					minlength: 6,
					maxlength: 9
				},
				bookingage: {
					//required: true,
					minlength: 1,
					maxlength: 3
				},
				bookingemploye: {
					required: true,
					minlength: 2
				}


			},
			messages: {
				bookingname: {
					required: "Ingrese su nombres completos",
					minlength: "Su nombre debe constar de al menos 2 caracteres."
				},
				bookingemploye: {
					required: "Ingrese el nombre de la empresa",
					minlength: "Su nombre de la empresa debe constar de al menos 2 caracteres."
				},
				/*bookingmessage: {
					required: "Please enter message",
					//minlength: "Your message must consist of at least 20 characters"
				},*/
				bookingemail: {
					required: "Ingrese su e-mail"
				},
				bookingtime: {
					required: "Ingrese la hora a reservar"
				},
				bookingservice: {
					required: "Seleccione Especialidad"
				},
				bookingdate: {
					required: "Ingrese fecha a reservar"
				},
				bookingphone: {
					required: "Ingrese su teléfono/celular",
					minlength: "Su teléfono debe tener minimo 6 caracteres.",
					maxlength: "Su teléfono debe tener maximo 9 caracteres."
				},
				bookingage: {
					minlength: "Su edad debe tener minimo 1 caracteres.",
					maxlength: "Su edad debe tener maximo 3 caracteres."
				}
			},

			submitHandler: function submitHandler(form) {
					$(form).ajaxSubmit({
						type: "POST",
						data: $(form).serialize(),
						url: "assets/form/process-booking.php",
						//url: "Inicio/process_booking/",
						success: function success() {
							$('.successform', $bookingForm).fadeIn();
							$bookingForm.get(0).reset();
						},
						error: function error() {
							$('.errorform', $bookingForm).fadeIn();
						}
					});
					$(form).ajaxSubmit({
						type: "POST",
						data: $(form).serialize(),
						//url: "assets/form/process-booking.php",
						url: "Inicio/process_booking/",
						success: function success() {
							$('.successform', $bookingForm).fadeIn();
							$bookingForm.get(0).reset();
						},
						error: function error() {
							$('.errorform', $bookingForm).fadeIn();
						}
					});
				
				
					
			}
		});
	}

	// booking_nosotros form
	if (forms.bookingForm_nosotros.length) {
		var $bookingForm_nosotros = forms.bookingForm_nosotros;
		$bookingForm_nosotros.validate({
			rules: {
				bookingname: {
					required: true,
					minlength: 2
				},/*
				bookingmessage: {
					required: true,
					//minlength: 20
				},*/
				bookingemail: {
					required: true,
					email: true
				},
				bookingtime: {
					required: true,
					//email: true
				},
				bookingservice: {
					required: true,
					//email: true
				},
				bookingdate: {
					required: true,
					//email: true
				},
				bookingphone: {
					required: true,
					minlength: 6,
					maxlength: 9
				},
				bookingage: {
					//required: true,
					minlength: 1,
					maxlength: 3
				},
				bookingemploye: {
					required: true,
					minlength: 2
				}


			},
			messages: {
				bookingname: {
					required: "Ingrese su nombres completos",
					minlength: "Su nombre debe constar de al menos 2 caracteres."
				},
				bookingemploye: {
					required: "Ingrese el nombre de la empresa",
					minlength: "Su nombre de la empresa debe constar de al menos 2 caracteres."
				},
				/*bookingmessage: {
					required: "Please enter message",
					//minlength: "Your message must consist of at least 20 characters"
				},*/
				bookingemail: {
					required: "Ingrese su e-mail"
				},
				bookingtime: {
					required: "Ingrese la hora a reservar"
				},
				bookingservice: {
					required: "Seleccione Especialidad"
				},
				bookingdate: {
					required: "Ingrese fecha a reservar"
				},
				bookingphone: {
					required: "Ingrese su teléfono/celular",
					minlength: "Su teléfono debe tener minimo 6 caracteres.",
					maxlength: "Su teléfono debe tener maximo 9 caracteres."
				},
				bookingage: {
					minlength: "Su edad debe tener minimo 1 caracteres.",
					maxlength: "Su edad debe tener maximo 3 caracteres."
				}
			},
			submitHandler: function submitHandler(form) {
				$(form).ajaxSubmit({
					type: "POST",
					data: $(form).serialize(),
					//url: "form/process-booking.php",
					url: "process_booking1/",
					success: function success() {
						$('.successform', $bookingForm_nosotros).fadeIn();
						$bookingForm_nosotros.get(0).reset();
					},
					error: function error() {
						$('.errorform', $bookingForm_nosotros).fadeIn();
					}
				});
			}
		});
	}

	// request form
	if (forms.requestForm.length) {
		var $requestForm = forms.requestForm;
		$requestForm.validate({
			rules: {
				requestname: {
					required: true,
					minlength: 2
				},
				requestmessage: {
					required: true,
					minlength: 20
				},
				requestemail: {
					required: true,
					email: true
				},
				requestemploye: {
					required: true,
					minlength: 2
				},
				requestphone: {
					required: true,
					minlength: 6,
					maxlength: 9
				}

			},
			messages: {
				requestname: {
					required: "por favor, escriba su nombre",
					minlength: "Su nombre debe constar de al menos 2 caracteres."
				},
				requestmessage: {
					required: "Por favor ingrese el mensaje",
					minlength: "Su mensaje debe tener al menos 20 caracteres."
				},
				requestemail: {
					required: "Por favor introduzca su correo electrónico"
				},
				requestemploye: {
					required: "por favor, escriba su nombre de su empresa",
					minlength: "Su empresa debe constar de al menos 2 caracteres."
				},
				requestphone: {
					required: "Ingrese su teléfono/celular",
					minlength: "Su teléfono debe tener minimo 6 caracteres.",
					maxlength: "Su teléfono debe tener maximo 9 caracteres."
				}
			},
			submitHandler: function submitHandler(form) {
				$(form).ajaxSubmit({
					type: "POST",
					data: $(form).serialize(),
					//url: "Inicio/process_booking_request/" + "assets/form/process-request.php",
					url: "assets/form/process-request.php",
					success: function success() {
						$('.successform', $requestForm).fadeIn();
						$requestForm.get(0).reset();
					},
					error: function error() {
						$('.errorform', $requestForm).fadeIn();
					}
				});

				$(form).ajaxSubmit({
					type: "POST",
					data: $(form).serialize(),
					url: "Inicio/process_booking_request/",
					//url: "assets/form/process-request.php",
					success: function success() {
						$('.successform', $requestForm).fadeIn();
						$requestForm.get(0).reset();
					},
					error: function error() {
						$('.errorform', $requestForm).fadeIn();
					}
				});
			}
		});
	}

});

})(jQuery);