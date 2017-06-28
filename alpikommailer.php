<?php
$message = '
<html>
<body>
<img src="http://tmin.rs/images/slider/TMIN-Markovac-1.jpg">
</body>
</html>
';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'To: David <zoran3001@gmail.com>' . "\r\n";
$headers .= $_REQUEST['EMail'] . "\r\n";

mail("zoran3001@gmail.com", "mysubject", $message, $headers);
header('Location:kontakt.html')?>
