<?php
function setclass($name) {
	if (!isset($_GET[$name]) && isset($_GET["submit"]))
		echo "redBorder";
}
function getValue($name) {
	if (isset($_GET[$name])) 
		echo html_entity_decode(htmlentities($_GET[$name], ENT_QUOTES));
}
function requiredField($name, $custemText = 'This field is required.') {
	if (!isset($_GET[$name]) && isset($_GET["submit"]))
		echo '<div class="redText">'.$custemText.'</div><br />';
}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles.css">
		<title>Contact Us</title>
	</head>

	<body>
		<div id="ContactForm">
			<form action="contact.php" method="post">
				<input class="<?php setclass("name"); ?>" name="name" value='<?php getValue("name"); ?>' placeholder="Name" autofocus="" type="text">
				<?php requiredField("name"); ?>
				<input class="<?php setclass("email"); ?>" name="email" value="<?php getValue("emailv"); getValue("email"); ?>" placeholder="Email Address" type="text">
				<?php requiredField("email", "Please enter a valid email address."); ?>
				<input class="<?php  setclass("phone"); ?>" name="phone" value="<?php getValue("phone"); ?>" placeholder="Phone Number (###-####-#####)" type="text">
				<?php requiredField("phone"); ?>
				<textarea class="<?php  setclass("message"); ?>" name="message" placeholder="Message"><?php getValue("message"); ?></textarea>
				<?php requiredField("message"); ?>
				<input class="submitButton" type="submit" name="submit" value="Send"/>
			</form>
		</div>
	</body>

</html>