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
				<input name="name" value="" placeholder="Name" autofocus="" type="text">
				<input name="email" value="" placeholder="Email Address" type="text">
				<input name="phone" value="" placeholder="Phone Number" type="text">
				<textarea name="message" value="" placeholder="Message" type="text"></textarea>
				<input class="submitButton" type="submit" name="submit" value="Send"/>
			</form>
		</div>
	</body>

</html>