<?php
require('config.php');

use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Exception\PPConnectionException;
if(isset($_GET['price'] )&& !empty($_GET['price'])) {
    $payer = new Payer();
    $details = new Details();
    $amount = new Amount();
    $transaction = new Transaction();
    $payment = new Payment();
    $redirectUrls = new RedirectUrls();

    $payer->setPaymentMethod('paypal');

    $details->setShipping('0.00')
        ->setTax('0.00')
        ->setSubtotal($_GET['price']);

    $amount->setCurrency('USD')
        ->setTotal($_GET['price'])
        ->setDetails($details);

    $transaction->setAmount($amount)
        ->setDescription('MyShop Command');

    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([$transaction]);

    $redirectUrls->setReturnUrl('http://localhost/projet/paypal/pay.php?approved=true')
        ->setCancelUrl('http://localhost/projet/paypal/pay.php?approved=false');

    $payment->setRedirectUrls($redirectUrls);

    try {
        $payment->create($api);
        //generate and store hash
        $hash = md5($payment->getId());
        $_SESSION['paypal_hash'] = $hash;
        //prepare and execute transaction
        $store = $bd->prepare("INSERT INTO transactions_paypal(user_id, payment_id, hash, complete) VALUES(?, ?, ?,0)");
        $store->execute([$_SESSION['id'], $payment->getId(), $hash]);
    } catch (PPConnectionException $e) {
        header('location:error.php');
    }

    foreach ($payment->getLinks() as $link) {
        if ($link->getRel() == 'approval_url') {
            $redirectUrls = $link->getHref();
        }
    }
    header("location: " . $redirectUrls);
}