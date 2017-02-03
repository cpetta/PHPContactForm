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
	
	$form_name = assignVariable('name', 'text');
	$form_email = assignVariable('email', 'email');
	$form_phone = assignVariable('phone', 'text');
	//$subject = assignVariable('subject', 'text');
	$form_message = assignVariable('message', 'text');
	//$WhateverOtherFormThingsYouWant = assignVariable('name', 'type');

//End Form Validation

	if($form_name && $form_email && $form_phone && $form_message) { //if form validates
		$to = 'test@mail.local'; //Adress that the email will get sent to.
		$subject = 'subject of the email'; // = 'Sent from contact form on mydomain.net, Subject: '.$subject;
		$message = 'From: '.$form_name.' Email: '.$form_email.' Phone: '.$form_phone.' Message: '.$form_message;
		$message = wordwrap($message, 70, "\r\n");
		$headers = 'From: NOREPLY@YourDomain.com' . "\r\n" . 'Reply-To: NOREPLY@YourDomain.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		
		if (mail($to, $subject, $message, $headers)) { //see https://secure.php.net/manual/en/function.mail.php
			header('Location: form.php?sent=true');
		}
		else {
			header('Location: form.php?sent=false');
		}
	}
	else {
		
		$url_name = NULL;
		$url_email = NULL;
		$url_phone = NULL;
		$url_message = NULL;
		
		if (validInput('name', 'text'))
			$url_name = 'name='.urlencode(htmlentities($_POST["name"], ENT_QUOTES));
		if (validInput('email', 'email'))
			$url_email = 'email='.urlencode(htmlentities($_POST["email"], ENT_QUOTES));
		elseif(validInput('email', 'text'))
			$url_email = 'emailv='.urlencode(htmlentities($_POST["email"], ENT_QUOTES)); // this is required so that email gets sent back to the form if its not correctly entered.
		if(validInput('phone', 'text'))
			$url_phone = 'phone='.urlencode(htmlentities($_POST["phone"], ENT_QUOTES));
		if(validInput('message', 'text'))
			$url_message = 'message='.urlencode(htmlentities($_POST["message"], ENT_QUOTES));
			
		$location = 'Location: form.php?submit=false&'.$url_name.'&'.$url_email.'&'.$url_phone.'&'.$url_message;
		header($location);
	}
}
else {
	header('Location: form.php');
}
?>