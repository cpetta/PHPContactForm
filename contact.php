<?php
if (isset($_POST["submit"])) {
//Forum Validation

	//for HTML <input> tags, name="" goes into $name 
	function validInput($name, $type) {
		switch ($type) {
			case('text'): // Checks to make sure the form input is not null.
				if($_POST[$name] == NULL)
					return FALSE;
				else
					return TRUE;
			break;
				
			case('email'): // Makes sure that the form's input contains the valid format for an email.
				if($_POST[$name] == NULL)
					return FALSE;
				elseif(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/', $_POST[$name]))
					return FALSE;
				else
					return TRUE;
			break;
				
			default: //just in case someone accidentally passes an invalid type.
				die ("Error: undefined type \"".$type."\" passed into function validInput()");
			break;
		}
	}
	
	function assignVariable($name, $type) {
		if (validInput($name, $type)) {
			return htmlentities($_POST[$name], ENT_QUOTES);
		}
		else {
			return FALSE;
		}
	}
	
	$name = assignVariable('name', 'text');
	$email = assignVariable('email', 'email');
	$phone = assignVariable('phone', 'text');
	//$subject = assignVariable('subject', 'text');
	$message = assignVariable('message', 'text');
	//$WhateverOtherFormThingsYouWant = assignVariable('name', 'type');

//End Form Validation

	if($name && $email && $phone && $message) { //if form validates, run the code below
		$to = 'test@mail.local'; //Adress that the email will get sent to.
		$subject = 'subject of the email'; // = 'Sent from contact form on mydomain.net, Subject: '.$subject;
		$message = 'From: '.$name.' Email: '.$email.' Phone: '.$phone.' Message: '.$message;
		//$message = wordwrap($message, 70, "\r\n");
		
		$headers = 'From: NOREPLY@YourDomain.com' . "\r\n" . 'Reply-To: NOREPLY@YourDomain.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		if (mail($to, $subject, $message, $headers)) { //see https://secure.php.net/manual/en/function.mail.php
			header('Location: form.php?sent=true');
		}
		else {
			//header('Location: form.php?sent=false'); //need some sort of error message for the user.
			echo "Your message wasn't sent because there was a problem with the email server.<br />";
		}
	}
	else {
		
		$name = NULL;
		$email = NULL;
		$phone = NULL;
		$message = NULL;
		
		if (validInput('name', 'text'))
			$name = 'name='.urlencode(htmlentities($_POST["name"], ENT_QUOTES));
		if (validInput('email', 'email'))
			$email = 'email='.urlencode(htmlentities($_POST["email"], ENT_QUOTES));
		else
			$email = 'emailv='.urlencode(htmlentities($_POST["email"], ENT_QUOTES)); // this is required so that email gets relayed back to the calling script
		if(validInput('phone', 'text'))
			$phone = 'phone='.urlencode(htmlentities($_POST["phone"], ENT_QUOTES));
		if(validInput('message', 'text'))
			$message = 'message='.urlencode(htmlentities($_POST["message"], ENT_QUOTES));
			
		$location = 'Location: form.php?submit=true&'.$name.'&'.$email.'&'.$phone.'&'.$message;
		echo $location;
		header($location);
	}
}
?>