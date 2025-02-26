<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once '../Controller/ticketC.php';
include_once '../Controller/reservationR.php';
require 'PayPal-PHP-SDK/autoload.php';

$clientId = 'AeCYZEPgFVFBhfg46-WqnccMMg0emNyMlvPooilDnX197m36Ykqp--a7cmp1xYigOHQEv3N5LbbPBD4M';
$clientSecret = 'EGpYlitJ13m56tM_aMGy9OmYjTQiXOmqkEcGjY2SS8SZoAccKcF-Kf8mSiQFP3C1kNp2DpYidv8I_Ruj';

$reservationR=new reservationR();
$ticketC=new ticketC();

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        $clientId,
        $clientSecret
    )
);
if(!empty(($_POST['reservation'])))
{
$_SESSION['reservationtopay']=$_POST['reservation'];
}
if(!empty(($_POST['chair'])))
{
$_SESSION['chair']=$_POST['chair'];
}
if(!empty(($_POST['id_proj'])))
{
$_SESSION['id_proj']=$_POST['id_proj'];
}
$ticket=$ticketC->showticket($_SESSION['reservationtopay']); 
if(!empty(($_POST['reservation'])) || isset($_SESSION['reservationtopay']) || !empty(($_POST['chair'])) || isset($_SESSION['chair']) || !empty(($_POST['id_proj'])) || isset($_SESSION['id_proj']))
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
                    'total' => $ticket['prix'],
                    'currency' => 'CAD'
                ])
            )
    ])
    ->setRedirectUrls(
        new \PayPal\Api\RedirectUrls([
            'return_url' => 'http://localhost/netninjaclass/Process/pay_service_reserver.php',
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

$reservation = new reservation(
    null,
    $_SESSION["id_user"],
    $_SESSION['reservationtopay'],
    $_SESSION['chair'],
    'confirme paypal',
    $_SESSION['id_proj']
);
$reservationR->addreservation($reservation);
$_SESSION['message'] ="Payment Completed with paymentID=".$paymentId."<br>You have successfully reserved a ticket to the projection";
$_SESSION['msg_type'] = "success";
header('Location: ../View/confirmAbon.php');
}
}else{
    $_SESSION['message'] ="You have not selected an information, Please try again.";
$_SESSION['msg_type'] = "danger";
header('Location: ../View/confirmAbon.php');
}
?>