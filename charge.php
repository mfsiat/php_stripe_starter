<?php
require_once('vendor/autoload.php');

\Stripe\Stripe::setApiKey('sk_test_51H9tEeBR2rrqIRF2k4gY3pja2kOXONXQoDJ3RIS5A7uyKSIV8rgTMAasZCu5OXN9nZUlOHB4yQflxtMMRWSLcrk900SMV4JkTg');

// Sanitize post array 
// To prevent any malicious code posting we prevent it 
// by sanitizing it 
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

// Variables
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

// Test
// echo $token;

// Create customer in stripe 
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer 
$charge = \Stripe\Charge::create(array(
  "amount" => 5000,
  "currency" => "usd",
  "description" => "Payment",
  "customer" => $customer->id
));

// Prints full data 
// print_r($charge);

// Redirect to success
header('Location: success.php?tid=' . $charge->id . '&product=' . $charge->description);
