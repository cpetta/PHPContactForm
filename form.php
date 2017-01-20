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
				<input name="name" value='<?php if (isset($_GET["name"])) echo $_GET["name"]; ?>' placeholder="Name" autofocus="" type="text">
				<input name="email" value="<?php if (isset($_GET["email"])) echo $_GET["email"]; ?>" placeholder="Email Address" type="text">
				<input name="phone" value="<?php if (isset($_GET["phone"])) echo $_GET["phone"]; ?>" placeholder="Phone Number (###-####-#####)" type="text">
				<textarea name="message" placeholder="Message" type="text"><?php if (isset($_GET["message"])) echo $_GET["message"]; ?></textarea>
				<input class="submitButton" type="submit" name="submit" value="Send"/>
			</form>
		</div>
	</body>

</html>