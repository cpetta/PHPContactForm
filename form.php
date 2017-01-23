<?php
function setclass($name)
{
	if (!isset($_GET[$name]) && isset($_GET["submit"]))
		echo "redBorder";
}
function getValue($name)
{
	if (isset($_GET[$name])) 
		echo html_entity_decode(htmlentities($_GET[$name], ENT_QUOTES));
		//echo $_GET[$name];
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
				<input class="<?php setclass("email"); ?>" name="email" value="<?php getValue("emailv"); getValue("email"); ?>" placeholder="Email Address" type="text">
				<input class="<?php  setclass("phone"); ?>" name="phone" value="<?php getValue("phone"); ?>" placeholder="Phone Number (###-####-#####)" type="text">
				<textarea class="<?php  setclass("message"); ?>" name="message" placeholder="Message" type="text"><?php getValue("message"); ?></textarea>
				<input class="submitButton" type="submit" name="submit" value="Send"/>
			</form>
		</div>
	</body>

</html>