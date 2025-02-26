<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../Controller/abonnementC.php';
require 'PayPal-PHP-SDK/autoload.php';

$clientId = 'AeCYZEPgFVFBhfg46-WqnccMMg0emNyMlvPooilDnX197m36Ykqp--a7cmp1xYigOHQEv3N5LbbPBD4M';
$clientSecret = 'EGpYlitJ13m56tM_aMGy9OmYjTQiXOmqkEcGjY2SS8SZoAccKcF-Kf8mSiQFP3C1kNp2DpYidv8I_Ruj';
$abonnementC=new abonnementC();

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        $clientId,
        $clientSecret
    )
);
if(!empty(($_POST['subscription'])))
{
$_SESSION['subscriptiontopay']=$_POST['subscription'];
}
$category=$abonnementC->RecupererCategorie($_SESSION['subscriptiontopay']); 
if(!empty(($_POST['subscription'])) || isset($_SESSION['subscriptiontopay']))
{
if(!isset($_GET['paymentId'])){

$payment = new \PayPal\Api\Payment();

$payment->setIntent('sale')
    ->setPayer(
        new \PayPal\Api\Payer([
            'payment_method' => 'paypal'
        ])
    )
    ->setTransactions([
        (new \PayPal\Api\Transaction())
            ->setAmount(
                new \PayPal\Api\Amount([
                    'total' => $category['prix_typeabon'],
                    'currency' => 'CAD'
                ])
            )
    ])
    ->setRedirectUrls(
        new \PayPal\Api\RedirectUrls([
            'return_url' => 'http://localhost/netninjaclass/Process/pay_service.php',
            'cancel_url' => 'http://example.com/cancel'
        ])
    );

$payment->create($apiContext);
foreach ($payment->getLinks() as $link) {
    if ($link->getRel() == 'approval_url') {
        $redirectUrl = $link->getHref();
        break;
    }
}

header('Location: ' . $redirectUrl);
}else{
    $paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];
$payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

$execution = new \PayPal\Api\PaymentExecution();
$execution->setPayerId($payerId);

$payment->execute($execution, $apiContext);

$abonnement = new abonnement(
    null,
    $_SESSION['subscriptiontopay'],
    date("Y-m-d"),
    date("Y-m-d", strtotime("+1 year", strtotime(date("Y-m-d")))),
    $_SESSION["id_user"],
    $paymentId
);
$abonnementC->AjouterAbonnement($abonnement);
$_SESSION['message'] ="Payment Completed with paymentID=".$paymentId."<br>You have successfully subscribed to ".$category['label_typeabon'];
$_SESSION['msg_type'] = "success";
header('Location: ../View/confirmAbon.php');
}
}else{
    $_SESSION['message'] ="You have not selected a category, Please try again.";
$_SESSION['msg_type'] = "danger";
header('Location: ../View/confirmAbon.php');
}
?>