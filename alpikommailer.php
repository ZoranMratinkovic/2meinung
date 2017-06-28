<?php
ob_start();
$brojac = rand(1,1000)*100;
$brojac1 = rand(1,1000)*100;
if(isset($_REQUEST['send'])){

	$ime=$_REQUEST['Ime'];
	$email=$_REQUEST['EMail'];
	$telefon=$_REQUEST['Telefon'];
	$kommentar=$_REQUEST['Poruka'];
	$zahnarzt=$_REQUEST['zahnarzt'];
	$imeslike=$_FILES['slika']['name'];

	$putanja="fotos/".$brojac.$imeslike;
	$tmp=$_FILES['slika']['tmp_name'];
	$imageFileType = pathinfo($putanja,PATHINFO_EXTENSION);
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "JPG") {
			$promenljiva ='<a href="http://www.2meinung.alpikom.rs/'.$putanja.'">Link zur Offerte</a>';
	}
	else{
		$promenljiva ='<a href="http://www.2meinung.alpikom.rs/'.$putanja.'"><img src="http://www.2meinung.alpikom.rs/'.$putanja.'" height="300px" width="200px"></a>';
	}
	move_uploaded_file($tmp,$putanja);
	/*if(!move_uploaded_file($tmp,$putanja)){
		echo "<script>alert('ne radi');</script>";
	}*/
	$imeslike1=$_FILES['slika1']['name'];
	$putanja1="fotos/".$brojac1.$imeslike1;
	$tmp1=$_FILES['slika1']['tmp_name'];
	$imageFileType1 = pathinfo($putanja1,PATHINFO_EXTENSION);
	if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
	&& $imageFileType1 != "gif" && $imageFileType1 != "JPG") {
			$promenljiva1 ='<a href="http://www.2meinung.alpikom.rs/'.$putanja1.'">Link zur Röntgenbilder</a>';
	}
	else{
		$promenljiva1 ='<a href="http://www.2meinung.alpikom.rs/'.$putanja1.'"><img src="http://www.2meinung.alpikom.rs/'.$putanja1.'" height="300px" width="200px"></a>';
	}
	move_uploaded_file($tmp1,$putanja1);
	$message = '
	<html>
	<body>
	<table>
	<tr><td>
	<p><b>Name:  <b/></td><td>'.$ime.'</p></td></tr><tr><td>
	<p><b>Email:  <b/></td><td>'.$email.'</p></td></tr><tr><td>
	<p><b>Telefon:  <b/></td><td>'.$telefon.'</p></td></tr><tr><td>
	<p><b>Kommentar:  <b/></td><td>'.$kommentar.'</p></td></tr><tr><td>
	<p><b>1 offerte von:  <b/></td><td>'.$zahnarzt.'</p></td></tr><tr><td>
	<p><b>Offerte:  <b/></td><td>'.$promenljiva.'</p></td></tr>
	<tr><td><p><b>Röntgenbilder:  <b/></td><td>'.$promenljiva1.'</p></td></tr>
	</table>
	</body>
	</html>
	';

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'To: David <zoran3001@gmail.com>' . "\r\n";
	$headers .= 'From: '.$_REQUEST['EMail'] . "\r\n";


	mail("zoran3001@gmail.com", "mysubject", $message, $headers);
	header("Location: http://www.2meinung.alpikom.rs/kontakt.html");
}

?>
