<?php
define('INVALID_EMAIL', 'Neispravna e-mail adresa!');
define('IME_PRAZNO', 'Polje Ime je prazno!');
define('PORUKA_PRAZNA', 'Polje Poruka je prazno!');
define('EMAIL_PRAZNO', 'Polje EMail je prazno!');

$toMail = 'zoran3001@gmail.com'; // your email address
$CCMail = 'zoran3001@gmail.com'; // CC (Crbon copy) also send the email to this address (leave empty if you don't use it)
$thanksPage = 'http://www.alpikom.rs/potvrda.html'; // the URL of the thank you page.
$mailSub = 'Offerte Anfrage für eine 2 Meinung'; // the subject of the email
// If you are asking for a email address in your form, you can name the input fields "EMail".
// It's necessary that you should have an "EMail" input field in your HTML form. You just need to call this script in your form like: <FORM action="wmdformmailer.php" method="post" name="ContactForm" id="ContactForm">
// If you do this, the message will apear to come from that email address and you can simply click the reply button to answer it.
// You can use this script to submit your forms or to receive orders by email.

// We will really appreciate if you add our website details below:
// This script is developed by WebMultimediaDesigner.com and it's free for personal or professional use. It's fully compatible with PHP 5.0.3 and will not create any problem in displaying form data in Outlook.
// <a href="http://www.webmultimediadesigner.com/" target="_blank"> Web Multimedia Designer.com</a> - We are an offshore software development &amp; web design company in New Delhi, India, providing web designing, offshore programming, web development, offshore outsourcing services like web maintenance and web marketing. 
//We are an offshore software development &amp; web design company in New Delhi, India, providing web designing, offshore programming, web development, offshore outsourcing services like web maintenance and web marketing. 


//================= DON'T EDIT BELOW THIS CODE ==============================

function message($text) {
	echo '<html><head></head><body>';
	echo '<script type="text/javascript">';
	echo "alert('$text');";
	echo 'parent.history.back();';
	echo '</script>';
	echo '</body></html>';
	die();
}

if(isset($_POST['EMail']) AND !empty($_POST['EMail'])) {
	if (!eregi("^[^@ ]+@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z][a-zA-Z][a-zA-Z]?$", $_POST["EMail"]))
		message(INVALID_EMAIL);
	if (!isset($_POST['Ime']) OR empty($_POST['Ime']))
		message(IME_PRAZNO);
	if (!isset($_POST['Poruka']) OR empty($_POST['Poruka']))
		message(PORUKA_PRAZNA);
	$mailBody = '<font face="tahoma" size="2" color="#333333">';
	foreach ($_POST as $field => $input) { 
		if(strtolower($field) != 'submit' || strtolower($field) != 'reset'){
			$mailBody .= '<b>'.ucfirst ($field) .' : </b>'. trim(strip_tags($input)) . '<br>'; 
		}	
	}
	//===============================================================
	$mailBody .= '</font>';
	//===============================================================
	$usrMail = $_POST['EMail'];
	$headers = "From:$usrMail\r\n";
	$headers .= "cc:$CCMail\r\n";
	$headers .= "Content-type: text/html\r\n";
	$sendRem = mail($toMail, $mailSub, $mailBody, $headers);
	if($sendRem){
		header('location:'.$thanksPage);
		exit;
	}else{
		print '<h2>Failed to send your query.</h2>';
		print '<h3>Please Try Later.</h3>';
	}
}
else message(EMAIL_PRAZNO); 
?>