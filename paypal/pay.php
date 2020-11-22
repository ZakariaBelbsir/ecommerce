<?php
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require 'config.php';
if(isset($_GET['approved'])){
    $approved = $_GET['approved'] === 'true';
    if($approved){
        $payerId = $_GET['PayerID'];
        //Get payment id
        $paymentId = $bd->prepare('select payment_id from transactions_paypal where hash = ?');
        $paymentId->execute([$_SESSION['paypal_hash']]);
        $paymentId = $paymentId->fetchObject()->payment_id;
        $payment = Payment::get($paymentId, $api);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);
        $payment->execute($execution, $api);
        $updateTransaction = $bd->prepare("UPDATE transactions_paypal SET complete=1 where payment_id=?");
        $updateTransaction->execute([$paymentId]);
        //Updating products table
        $selectCart = $bd->prepare("SELECT * FROM shoppingCart WHERE userId = ?");
        $selectCart->execute([$_SESSION['id']]);
        $cart = $selectCart->fetchAll(PDO::FETCH_OBJ);

        foreach ($cart as $item){
            $updateProduct = $bd->prepare("UPDATE products SET quantity=quantity-?, sales=sales+1 WHERE productId=?");
            $updateProduct->execute([$item->quantity, $item->productId]);
        }

        //Saving new command
        $commandRef=uniqid("myshop_cmd", true);
        $date = date("Ymd");
        $newCommand = $bd->prepare("insert into command (commandRef, userId, commandDate) values(?, ?, ?)");
        $newCommand->execute([$commandRef, $_SESSION['id'], $date]);

        //Inserting bought items into command_details table

//            $addCommand = $bd->prepare("insert into command_details(userId, productId, price, quantity, commandRef) values(?, ?, ?, ?, ?)");
//            $addCommand->execute([$item->userId, $item->productId, $item->price, $item->quantity, $commandRef]);

    foreach ($cart as $item){
        //Update cart after buying

            $updateCart = $bd->prepare("update shoppingCart set complete=1, commandRef=? where productId=? and complete=0");
            $updateCart->execute([$commandRef, $item->productId]);

    }
        header("location:complete.php?p=" . $paymentId);
        //complete.php ==> sends email containing command details to user with a thank you message
        exit();
    } else{
        header('location:cancel.php?p=error');
        exit();
    }
}