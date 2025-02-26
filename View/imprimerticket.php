<?php
include '../Controller/reservationR.php';
// create reservation
$reservation = null;

// create an instance of the controller
$reservationR = new reservationR();

if(isset($_GET["id_res"]))
{
    $reservation = $reservationR->showreservation($_GET['id_res']);

}
else
{
    header('Location:Listreservations.php');
}

?>
<h1><?php echo $reservation['siege'];?></h1>
<h1><?php echo $reservation['id_user'];?></h1>
<img class="qrious">

<script src="../Controller/qrious.js"></script>
<script>

var qr = new QRious({
    element: document.querySelector('.qrious'),
    size: 250,
    value: "<?php echo $reservation['siege'];?> <?php echo $reservation['id_user'];?> <?php echo $reservation['id_proj'];?>"
  });

</script>