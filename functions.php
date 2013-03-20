<?php
// Sanitizing, validating and sending an email.		
			function send_mail($sender_name, $sender_email, $sender_message){
// First we declare an empty array named $errors.
// It will contain all the errors that might come up.			
				$errors = array();
// Here we check whether the name of the user that is stored inside $sender_name
// is empty and if it is not, we then sanitize it, i. e. we are removing all the
// html elements that might contain.				
				if(!empty($sender_name)){
					$sender_name = filter_var($sender_name, FILTER_SANITIZE_STRING);
// The below statements check again whether the sender name is not empty
// because by sanitizing it above, it might have left with no characters at all.
// For example, if the evil user had just entered "<script></script>" elements 
// without any values, the above statement would have removed those scripts
// leaving the sender name empty, so that is why we double check for the 
// for the presence of characters. If the check if successful and the user is 
// honourable, we run a regular expression to check whether the sender's name
// only has alphabetic characters. 
					if(!empty($sender_name)){
						if(!preg_match('/^[a-z]+[a-z ]+[a-z]$/i', $sender_name)){
							$errors[] = 'Please enter a valid name!';
						
						}
// Now we check whether the sender's name does not exceed 40 characters.
// We have put that check inside the is-not-empty conditional statement
// because if the field is empty, it can't overbalance 40 characters anyways.
// If the check returns false, the $errors array is appended.						
						if(strlen($sender_name) > 40){
							$errors[] = 'Name must not be longer than 40 characters!';
						}
					}
// It seems confusing, but the below else statement will add this error
// to the $errors array if the user had clicked "submit" and had left
// the name field empty.
				}else{
					$errors[] = 'Please populate your name!';
				}
// So now we check whether email field has been populated.
// If it has, we run a sanitizing function that strips the email
// from any evil characters, like html tags, and at the same time,
// it validates the email, like making it mandatory for the email
// to contain typical email stuff like an "@" symbol and so on.
				if(!empty($sender_email)){
					if(!filter_var($sender_email, FILTER_VALIDATE_EMAIL)){
						$errors[] = 'Please enter a valid email!';
					}
// We append the $errors array if the email field has been left empty.					
				}else{
					$errors[] = 'Please populate your email!';
				}
// We do the same steps with the message text area, we check whether
// it is empty and then we strip all evil html tags.
				if(!empty($sender_message)){
					$sender_message = filter_var($sender_message, FILTER_SANITIZE_STRING);
// If the sanitizing of the message field hasn't killed off all characters, 
// we check thether the message is longer than 10000 characters.
					if(!empty($sender_message)){
						if(strlen($sender_message) > 10000){
							$errors[] = 'Message must not exceed 500 characters!';
						}
// We append the $errors array if the message is left blank.
					}else{
						$errors[] = 'Please populate your message!';
					}
// And we do the same thing with the same check.
				}else{
					$errors[] = 'Please populate your message!';
				}
// Now here is the tricky part. Until now, we have only appended any errors
// that might have popped up into the $errors array.
// What we do below is that we check whether the $errors
// array is empty and if it is, we send the email.
// Empty $errors array means that that everything is OK 
// with the user input.
				if(empty($errors)){
				if(mail('stefany.dyulgerova@gmail.com', 'Съобщение от сайта www.dyulgerova.info изпратено от '.$sender_name, $sender_message, 'From: '.$sender_email)){
					return '<article><p>Message has been sent! Thank you very much, I will be in touch with you as soon as possible</p></article>';
				}
// Here we check whether the email has been sent. If there is some problem,
// and the email is not sent, display an error message.
				else{
					return '<article><p>Your message couldn\'t be send! Please try again later!</p></article>';
				}
// The below else statement is made in case the $errors array is 
// not empty. If it is not empty, then we display the errors on the screen.
// Note that the email will only be allowed to be send if the $errors array is empty.
				}else{
					foreach($errors as $error){
						printf('%s <br />', $error);
					} 	
				}
			}
// End of the document.