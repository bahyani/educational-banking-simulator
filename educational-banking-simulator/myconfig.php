<?php
session_start();


include 'connect.php';
require_once('PHPMailer/class.phpmailer.php');

$account=$_SESSION['username'];
$query=mysqli_query($link, "select * from account where account = '$account'" );
$row=mysqli_fetch_array($query);

$first=$row['first'];
$last=$row['last'];
$mypin = $row['transfer_pin'];
$last_login=$row['last_login'];
$deposit=$row['deposit'];
$email = $row['email'];
$last=$row['last'];
$phone = $row['tel'];
$picture=$row['picture'];
$mypass = $row['pin'];

if($picture == ""){
	$picture = "img/t1.jpg";
}

?>