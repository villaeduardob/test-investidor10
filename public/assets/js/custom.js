;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function(){

		if (document.getElementById('formNews') !== null) 
		{
			var formName = $('#formNews');
			var formAction = $('#formNews').attr('action');

			// validação formulário
			formName.validate({
				ignore: '', 
				rules: {
					title:	'required',
					text:	'required',
					auhor:	'required',
				},
				messages: {
					title:	'Campo obrigatório',
					text:	'Campo obrigatório',
					auhor:	'Campo obrigatório',
				},
				submitHandler: function(form) {

					formName.find('#buttonForm').prop('disabled', true).html('Gravando...');

					var formData = new FormData(form);
					$.ajax({
						url: 			formAction,
						type: 			'post',
						data: 			formData,
						dataType:		'json',
						mimeType: 		'multipart/form-data',
						contentType: 	false,
						cache: 			false,
						processData: 	false,
						success: function(data, textStatus, xhr) {

							formName[0].reset();
							$('#messageAlert').removeClass().addClass('success').html(xhr.responseJSON.message).show();
							$('body,html').animate({ scrollTop:0 }, 600);
							setTimeout(function(){
								$('span.message').removeClass().html('');
								window.location = xhr.responseJSON.redirect;
							}, 2500);

						},
						error: function(xhr, textStatus) {

							$('#messageAlert').removeClass().addClass('danger').html(xhr.responseJSON.message).show();
							$('body,html').animate({ scrollTop:0 }, 600);
							setTimeout(function(){ 
								$('#messageAlert').removeClass().html('').hide();
								$('#buttonForm').prop('disabled', false).html('Salvar');
							}, 2500);

						}  
					
					});

				}

			});

		}

	});
	
})(jQuery, window);