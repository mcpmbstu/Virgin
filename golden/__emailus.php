<?php
$to = $_POST['useremail'];
$subject = $_POST['usersubject'];
$data 	= $_POST["data"];

$message = "
	<html>
	<head>
	<title>View Wishlist - Virginias Vintage Hire</title>
	</head>
	<body>"
	.$data.
	"</body>
	</html>
	";
	/*if (strpos($to,'@outlook.com') !== false) {
    	$headers = "From: \Virginia\'s-Vintage". "\\r\n";
	}else{
		$headers = "From: \Virginia\'s-Vintage <guest@guest.com>". "\\r\n";
	}*/
	$headers = "From: \Virginia\'s-Vintage <guest@guest.com>". "\\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
	$headers .= "Content-Transfer-Encoding: 8bit\r\n";
	$headers .= 'Cc:  virginiasvintagehire@gmail.com' . "\r\n";
	$headers .= 'Reply-To: virginiasvintagehire@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

?>