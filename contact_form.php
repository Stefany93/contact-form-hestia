<?php
// Here we include the send_mail() function from the
// "functions" file. 
	include 'functions.php';
// Here we check whether the user has clicked the "submit" button.
// If they have, we call the send_mail() function.
	if(isset($_POST['submit'])){
		send_mail($_POST['name'], $_POST['email'], $_POST['message']);
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Contact Form</title>
		<script type="text/javascript" src="javascript.js"></script>
	</head>
<body>
	<form method="post" action="">
		<fieldset id="fieldset_name">
			<label for="name_field">Name:*</label> 
			<input type="text" id="name_field" name="name" maxlength="40"  />	
		</fieldset>
		<fieldset id="fieldset_email">
			<label for="email_field">Email:*</label> 
			<input type="text" name="email" id="email_field" maxlength="200" />
		</fieldset>
		<fieldset id="fieldset_message">
			<label for="text_area">Message:*</label>
				<br />
			<textarea name="message" id="text_area" rows="10" cols="50" ></textarea>
		</fieldset>	
		<fieldset>
			<input type="submit"  value="Send Message" id="submited" name="submit" />
		</fieldset>
	</form>				
	</body>
	</html>