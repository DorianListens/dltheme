<?php

echo "Made it this far!";
?>
<html>
<body>
	a thing
</body>
</html>
<?php

//Sanitize input data using PHP filter_var().
	$user_Name        = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
	$user_Email       = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
	$user_Subject     = filter_var($_POST["userSubject"], FILTER_SANITIZE_STRING);
	$user_Message     = filter_var($_POST["userMessage"], FILTER_SANITIZE_STRING);
	$user_Human 	  = filter_var($_POST["userHuman"], FILTER_SANITIZE_STRING);
	
	//additional php validation
	if(strlen($user_Name)<2) // If length is less than 2 it will throw an HTTP error.
	{
		header('HTTP/1.1 500 Name is too short or empty!');
		exit();
	}
	if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) //email validation
	{
		header('HTTP/1.1 500 Please enter a valid email!');
		exit();
	}
	if(strlen($user_Subject)<2) // Check for subject length
	{
		header('HTTP/1.1 500 Subject is too short or empty!');
		exit();
	}
	if(strlen($user_Message)<5) //check emtpy message
	{
		header('HTTP/1.1 500 Too short message! Please enter something.');
		exit();
	}
	if($user_Human != "2")
	{
		header('HTTP/1.1 500 ROBOT DETECTED! EXTERMINATE!');
		exit();
	}

	//PHPMailer
	require( echo site_url().'/wp-includes/class-phpmailer.php' );

	$mail = new PHPMailer();

	$mail->IsSMTP();

	$mail->SetFrom($user_Email, $user_Name);

	$mail->AddReplyTo($user_Email, $user_Name);

	$mail->AddAddress("dorian.scheidt@gmail.com");

	$mail->Subject = "DLFORM: ".$user_Subject;

	$mail->MsgHTML($user_Message);

if ($mail->Send()) {
    echo "Sent. Nice. ";
} else {
    echo "Error. Bummer.";
    echo "Use regular email, I guess.";
}

