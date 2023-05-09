<?php

//fetch the username from the db
//check if you have a counter

$data = array(
            'secret' => "0xC0c05A65f07c3BD1140117d38b104e27fCdf2a3a",
            'response' => $_POST['h-captcha-response']
        );
$verify = curl_init();
curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
curl_setopt($verify, CURLOPT_POST, true);
curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($verify);
$responseData = json_decode($response, true);
// var_dump($responseData);

if($responseData->success) {
    // your success code goes here
} 
else {
   // return error to user; they did not pass
}
?>