<?php
function messageSent() {
	$messageSent = FALSE;
	if (isset($_GET["sent"]) && ($_GET["sent"] === 'true'))
		$messageSent = 'sent';
	elseif (isset($_GET["sent"]) && ($_GET["sent"] === 'false'))
		$messageSent = 'notSent';
	return $messageSent;
}
	
function setclass($name) {
	if (!isset($_GET[$name]) && isset($_GET["submit"])) {
		echo "redBorder";
	}
	elseif (isset($_GET["sent"])) {
		echo "disabled";
	}
	//elseif (isset($_GET[$name]) && isset($_GET["submit"])) // Uncomment for green borders
		//echo "greenBorder";
}
function getValue($name) {
	if (isset($_GET[$name])) 
		echo html_entity_decode(htmlentities($_GET[$name], ENT_QUOTES));
}
function requiredField($name, $custemText = 'This field is required.') {
	if (!isset($_GET[$name]) && isset($_GET["submit"]))
		echo $custemText;
}
function whenSentSetDisabled() {
	if (isset($_GET["sent"]) && ($_GET["sent"] === 'true')) {
		echo 'disabled';
	}
}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<script type="application/javascript" src="formvalidation.js"></script>
		<title>Contact Us</title>
	</head>
	
	<body>
		<div id="ContactForm">
			<form onsubmit="return checkform()" name="contact" action="contact.php" method="post">
				
				<?php
				if (messageSent() === 'sent') 
					echo "<div id=\"output\">Thank you for contacting us</div><br />"; 
				elseif (messageSent() === 'notSent')
					echo "<div id=\"output\" class=\"redText\">There was an issue sending your message, please wait a few minutes and try again.</div><br />"
					
				?>
				
				<div id="name" class="redText"><?php requiredField("name"); ?></div>
				<input name="name" onblur="validInput('name')" class="<?php setclass("name"); ?>" value='<?php getValue("name"); ?>' placeholder="Name" autofocus="" type="text" required=""/>
				
				<div id="email" class="redText"><?php requiredField("email", "Please enter a valid email address."); ?></div>
				<input name="email" onblur="validInput('email', 'email', 'Please enter a valid email address.')" class="<?php setclass("email"); ?>" value="<?php getValue("emailv"); getValue("email"); ?>" placeholder="Email Address" type="text" required=""/>
				
				<div id="phone" class="redText"><?php requiredField("phone"); ?></div>
				<input name="phone" onblur="validInput('phone')" class="<?php  setclass("phone"); ?>"  value="<?php getValue("phone"); ?>" placeholder="Phone Number (###-####-#####)" type="text" required=""/>
				
				<div id="message" class="redText"><?php requiredField("message"); ?></div>
				<textarea name="message" onblur="validInput('message')" class="<?php  setclass("message"); ?>" placeholder="Message" required=""><?php getValue("message"); ?></textarea>
				
				<input class="submitButton" type="submit" name="submit" value="Send" <?php whenSentSetDisabled() ?>/>
				
			</form>
		</div>
	</body>

</html>