<?php
if($_POST)
{
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    } 
	
	$to_Email   	= "dorian.scheidt@gmail.com"; //Replace with recipient email address
	// $subject        = 'Ah!! My email from Somebody out there...'; //Subject line for emails

	//check $_POST vars are set, exit if any missing
	if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userSubject"]) || !isset($_POST["userMessage"]))
	{
		die();
	}

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

	$subject 		= "DLFORM: ".$user_Subject;

	//proceed with PHP email.
	$headers = 'From: '.$user_Name. '<'.$user_Email.'>' . "\r\n" .
	'Reply-To: '.$user_Email.'' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
	@$sentMail = mail($to_Email, $subject, strip_tags($user_Message) .'  -'.$user_Name, $headers);
	
	if(!$sentMail)
	{
		header('HTTP/1.1 500 Could not send mail! Sorry about that... try BigD@dorianlistens.com');
		exit();
	}else{
		echo 'Hi '.$user_Name .', Thanks for reaching out! ';
		echo "I'm a bit of an email addict, so I'll probably get back to you extremely quickly.";
	}
}
?>