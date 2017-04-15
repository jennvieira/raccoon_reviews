<?php

// echo "From functions";

function redirect_to($location){
  if($location != NULL){
    header("Location: {$location}");
    exit;
  }
}

function sendMessage($name, $email, $company, $message, $direct){

  $to = "carly.marsh@hotmail.com";
  $subj = "Message from mysite.com";
  $extra = "Reply to {$email}";
  $body = "Name: {$name}\n\nEmail: {$email}\n\nCompany: {$company}\n\nMessage: {$message}\n\n{$extra}";
  // echo $body;
// //This will not work on wamp/mamp.....
//   mail($to, $subj, $body, $extra);
// //.................................
redirect_to($direct);
}

 ?>
