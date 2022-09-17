<?php

  $url = "https://api.paystack.co/transaction/charge_authorization";


  $fields = [

    'authorization_code' => "AUTH_3w36suuxvj",

    'email' => "solesiaderonke91@gmail.com",

    'amount' => "300000"

  ];


  $fields_string = http_build_query($fields);


  //open connection

  $ch = curl_init();

  

  //set the url, number of POST vars, POST data

  curl_setopt($ch,CURLOPT_URL, $url);

  curl_setopt($ch,CURLOPT_POST, true);

  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    "Authorization: Bearer sk_live_2eccc4469f60a3229c2fbf444668bf105aae244d",

    "Cache-Control: no-cache",

  ));

  

  //So that curl_exec returns the contents of the cURL; rather than echoing it

  //execute post

  $result = curl_exec($ch);

  echo $result;

?>
