// Input validation in the contact form
		clicked = false;
		window.onload = function(){
		document.forms[0].onsubmit = function(){
		name_field = document.getElementById("name_field");
		email_field = document.getElementById("email_field");
		text_area = document.getElementById("text_area");
			
		if(clicked === false){
			clicked = true;
			var fieldset_name = document.getElementById("fieldset_name");
			var fieldset_email = document.getElementById("fieldset_email");	
			var fieldset_message = document.getElementById("fieldset_message");
			var re = /^[a-z]+[a-z0-9.]+@{1}[a-z0-9\-]+[.]{1}[a-z]{1,5}[a-z.]{1,5}?[a-z]$/i;
			var there_is_error;
				
			var name_error = document.createTextNode(" Please populate your name! ");	
			var email_error2 = document.createTextNode(" Please enter your email! ");
			var email_error = document.createTextNode(" Please enter a valid email! ");
			var message_error = document.createTextNode(" Please populate your message!");
			
			if(name_field.value.length <= 2){
				fieldset_name.appendChild(name_error);
				there_is_error = true;
			}
			if(email_field.value.length <= 5){
				fieldset_email.appendChild(email_error2);
				there_is_error = true;
			}
			if(!re.test(email_field.value)){
				fieldset_email.appendChild(email_error);
				there_is_error = true;
			}
			if(text_area.value.length < 1){
				fieldset_message.appendChild(message_error);
				there_is_error = true;
			}
			if(there_is_error === true){
				
				return false;
			}
			
		}
		}
		}
		