

<?php 

echo '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Android Group</title>
</head>
<body>
	
</body>
</html>';


$base_url = "https://slack.com/api/users.admin.invite?token=YOUR_TOKEN_HERE&email="; // Change YOUR_TOKEN_HERE with your token
$mail = "";
$mail = $_POST["email"];
$endUrl = $base_url . $mail;

if (strlen($mail) < 1) {
	$mail = 'Please input your email';
}

echo '<b> Hello: </b> '. '<font color=red>' . $mail . '</font>';


$json = file_get_contents($endUrl);
$obj = json_decode($json);
echo '<br />';

$ok = $obj->ok;

echo "<b> Status: </b>";
if ($ok	 == true) {
	echo '<font color=red>All done,  Please check your email :) </font>';
}else {
	echo '<font color=red>Some thing was wrong , scheck <font color=black><b> Status code</b></font> below </font> <br /> ';
	echo '<b> Status code: </b>';
	echo  '<font color=red>' . $obj->error . '</font>';
}
echo '<br />';
echo '<a href="index.php"> back</a>';
 ?>