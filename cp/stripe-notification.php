<?php
require 'boot.php';

require("../lib/pnp/stripe/lib/Stripe.php");

$stripe_key=ORM::for_table('paymentgateways')->where('name','Stripe')->find_one();

$secret_key=$stripe_key['ins'];
$pk_key=$stripe_key['value'];

$amount=_post('amount');
$currency=_post('currency');

$amount=round($amount);

$stripe = array(
    "secret_key"      =>$secret_key,
    "publishable_key" =>$pk_key
);


Stripe::setApiKey($stripe['secret_key']);


$token  = $_POST['stripeToken'];


    $customer = Stripe_Customer::create(array(
        'card'  => $token
    ));


try {
    $charge = Stripe_Charge::create(array(
        'customer' => $customer->id,
        'amount' => $amount, // Amount in cents!
        'currency' => $currency,
        'card' => $token
    ));

r2('stripe-message.php?_msg=success','s','Your Transaction Successfully Done.');

} catch (Stripe_ApiConnectionError $e) {
    $e_json = $e->getJsonBody();
    $error = $e_json['error'];
    $message= $error['message'];
    r2("stripe-message.php?_msg=".$message,"e",$message);

} catch (Stripe_InvalidRequestError $e) {
    $e_json = $e->getJsonBody();
    $error = $e_json['error'];
    $message=$error['message'];
    r2("stripe-message.php?_msg=".$message,"e",$message);
} catch (Stripe_ApiError $e) {
    $e_json = $e->getJsonBody();
    $error = $e_json['error'];
    $message=$error['message'];
    r2("stripe-message.php?_msg=".$message,"e",$message);

} catch (Stripe_CardError $e) {
    $e_json = $e->getJsonBody();
    $error = $e_json['error'];
    $message=$error['message'];
    r2("stripe-message.php?_msg=".$message,"e",$message);
}

?>