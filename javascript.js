// Input validation in the contact form
// The clicked variable checks whether the "submit" button has been clicked.
		clicked = true;
// The onload property of the window object will collect the
// IDs of the form fieds we intend to get the get the values from
// as soon as the webpage has finished loading.
		window.onload = function(){
		document.forms[0].onsubmit = function(){
		name_field = document.getElementById("name_field");
		email_field = document.getElementById("email_field");
		text_area = document.getElementById("text_area");
// If the "submit" button has been clicked, we set the "clicked" variable to false
// so that our JS errors won't be repeated.		
		if(clicked === true){
			clicked = false;
// Here we take the IDs from the fieldset elements of the form 
// we are conducting the check on. Later on, we shall append 
// text nodes to these fieldset elements as children 
// and in that way we shall display the errors
// our user might have allowed.
			var fieldset_name = document.getElementById("fieldset_name");
			var fieldset_email = document.getElementById("fieldset_email");	
			var fieldset_message = document.getElementById("fieldset_message");
// Our regular expression, we are going to need it later when we validate the 
// email address of the user.
			var re = /^[a-z]+[a-z0-9.]+@{1}[a-z0-9\-]+[.]{1}[a-z]{1,5}[a-z.]{1,5}?[a-z]$/i;
// Due to the lack of a better idea, the variable there_is_error 
// is just defined and it will be given the value of true 
// every time there is an error with the user input.
			var there_is_error;
// Here we declare the error messages our user is going to get
// if he has populated the wrong data in the mandatory fields of 
// our contact form.				
			var name_error = document.createTextNode(" Please populate your name! ");	
			var email_error2 = document.createTextNode(" Please enter your email! ");
			var email_error = document.createTextNode(" Please enter a valid email! ");
			var message_error = document.createTextNode(" Please populate your message! ");
// If the name field is less than 2 characters, diplay an error.		
			if(name_field.value.length <= 2){
				fieldset_name.appendChild(name_error);
				there_is_error = true;
			}
// If the email is less than 5 characters, display an error
			if(email_field.value.length <= 5){
				fieldset_email.appendChild(email_error2);
				there_is_error = true;
			}
// If the email is not a proper one, i.e. missing an "@" symbol
// and other typical email address character, or if it containt 
// characters unrepresentative for an email address
// display an error. We check all that with the regular expression
// we had declared earlier with the "re" variable.
			if(!re.test(email_field.value)){
				fieldset_email.appendChild(email_error);
				there_is_error = true;
			}
// If the message body is not populated at all,
// display an error
			if(text_area.value.length < 1){
				fieldset_message.appendChild(message_error);
				there_is_error = true;
			}
// If the "there_is_error" variable evaluates true,
// that means that there the user has entered incorrect information
// at some point, and what we do next is that we return false,
// which prevents the form to be submited to the server
// where it will be handled by some server side programming language.
			if(there_is_error === true){
				return false;
			}
		}
		}
		}
		