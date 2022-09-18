<?php

//+918827213789+919893781265+9630590950+916269405630
require_once './vendor/autoload.php';


if (isset($_POST['provider']) && $_POST['provider'] == "twilio") {
    if (isset($_POST['numbers'])) {
        $numbers = $_POST['numbers'];
        $message = $_POST['message'];




        foreach (explode("+", $numbers) as $phone) {

            //twillio
            $sid = $_POST['key']; // Your Account SID from www.twilio.com/console
            $token = $_POST['secrete']; // Your Auth Token from www.twilio.com/console

            $client = new Twilio\Rest\Client($sid, $token);
            $message = $client->messages->create(
                    '+' . $phone, array(
                'from' => $_POST['dummy_number'], // From a valid Twilio number
                'body' => $message
                    )
            );
            if ($message->sid) {
                $data = array(
                    "response" => "success",
                    "current" => '+' . $phone
                );

                echo json_encode($data);
            }
        }
    }
} else if (isset($_POST['provider']) && $_POST['provider'] == "nexmo") {
    if (isset($_POST['numbers'])) {
        $numbers = $_POST['numbers'];
        $msg = $_POST['message'];

        $sid = $_POST['key'];
        $token = $_POST['secrete'];


        foreach (explode("+", $numbers) as $phone) {

            $basic = new \Nexmo\Client\Credentials\Basic($_POST['key'], $_POST['secrete']); //key , secrete
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => $phone,
                'from' => $_POST['dummy_number'],
                'text' => $msg
            ]);



            $data_array = array($message['to'], $message['status'], 'nexmo');
            echo json_encode($data_array);

            //$message['to']
            //$message['remaining-balance']
            //$message['status']  = 0 means sent successfully
        }
    }
} else if (isset($_POST['provider']) && $_POST['provider'] == "textlocal") {


    if (isset($_POST['numbers'])) {
        $numbers = $_POST['numbers'];
        $message = $_POST['message'];
        foreach (explode("+", $numbers) as $phone) {
            // Authorisation details.
            $username = $_POST['key'];
            $hash = $_POST['secrete'];

            // Config variables. Consult http://api.textlocal.com/docs for more info.
            $test = "0";

            // Data for text message. This is the text message data.
            $sender = $_POST['dummy_number']; // This is who the message appears to be from.
            $numbers = preg_replace('/[^0-9]/', '', $phone); // A single number or a comma-seperated list of numbers
            // 612 chars or less
            // A single number or a comma-seperated list of numbers
            $message = urlencode($message);
            $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
            $ch = curl_init('http://api.textlocal.com/send/?');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch); // This is the result from the API

            if ($result) {
                $data = array(
                    "response" => "success",
                    "current" => '+' . $phone
                );

                echo json_encode($data);
            }

            curl_close($ch);
        }
    }
} else if (isset($_POST['provider']) && $_POST['provider'] == "sinch") {


    if (isset($_POST['numbers'])) {
        $numbers = $_POST['numbers'];
        $message = $_POST['message'];
        foreach (explode("+", $numbers) as $phone) {

            $service_plan_id = $_POST['key']; //"556a66824114405ab57ac2f7b32d13e7";
            $bearer_token = $_POST['secrete']; //"0a36d4337c624082b040503e47f1f3a9";

            $send_from = $_POST['dummy_number']; //"+12089087284";
            $recipient_phone_numbers = '+' . $phone;



            // Set necessary fields to be JSON encoded
            $content = [
                'to' => array_values($recipient_phone_numbers),
                'from' => $send_from,
                'body' => $message
            ];

            $data = json_encode($content);

            $ch = curl_init("https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
            curl_setopt($ch, CURLOPT_XOAUTH2_BEARER, $bearer_token);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Curl error: ' . curl_error($ch);
            } else {
                if ($result) {
                    $data = array(
                        "response" => "success",
                        "current" => '+' . $phone
                    );

                    echo json_encode($data);
                }
            }
            curl_close($ch);
        }
    }
} else if (isset($_POST['provider']) && $_POST['provider'] == "telnyx") {
    if (isset($_POST['numbers'])) {
        $numbers = $_POST['numbers'];
        $message = $_POST['message'];
        foreach (explode("+", $numbers) as $phone) {

            \Telnyx\Telnyx::setApiKey($_POST['key']);

            $new_message = \Telnyx\Message::Create([
                        'from' => $_POST['dummy_number'],
                        'to' => "+" .$phone,
                        'text' => $message
            ]);

            if ($new_message) {
                $data = array(
                    "response" => "success",
                    "current" => '+' . $phone
                );

                echo json_encode($data);
            }
        }
    }
}
