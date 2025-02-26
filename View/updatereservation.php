<?php

include '../Controller/reservationR.php';

$error = "";

// create reservation
$reservation = null;

// create an instance of the controller
$reservationR = new reservationR();
if (
    isset($_POST["id_user"]) &&
    isset($_POST["id_ticket"]) &&
    isset($_POST["siege"]) &&
    isset($_POST["etat"]) &&
    isset($_POST["id_proj"]) 
){
    if (
        !empty($_POST["id_user"]) &&
        !empty($_POST["id_ticket"]) &&
        !empty($_POST["siege"]) &&
        !empty($_POST["etat"]) &&
        !empty($_POST["id_proj"]) 

    ) {
        $reservation = new reservation(
            null,
            $_POST['id_user'],
            $_POST['id_ticket'],
            $_POST['siege'],
            $_POST['etat'],
            $_POST['id_proj']
        );
        $reservationR->updatereservation($reservation, $_POST["id_res"]);
        $_SESSION['message'] = "Record Modified Successfully";
        $_SESSION['msg_type'] = "success";
        header('Location:Listreservations.php');
    } else {
    $_SESSION['message'] = "Missing information";
    $_SESSION['msg_type'] = "warning";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<?php 
  $title="Dashboard";
  ?>
  <?php
  // include header partial
  require_once '../admin/partials/_includehead.php';
?>

<body>
<div class="container-scroller">

<?php
  // include header partial
  require_once '../admin/partials/_navbar.php';
?>
<?php
  // include header partial
  require_once '../admin/partials/_sidebar.php';
?>
 <div class="main-panel">
          <div class="content-wrapper">
          <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php if(isset($_SESSION['message'])):
        ?>
		<label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?></label>
      <?php endif ?>

 <?php
 $res= null;
    if (isset($_GET['id_res'])) {
        $res = $reservationR->showreservation($_GET['id_res']);

    ?>
                      <h4 class="card-title">update reservation</h4>
                      <center><a href="Listreservations.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">List reservation</button></a></center>
                    <form action="" method="post" class="forms-sample">
                      
                    <input type="hidden" name="id_res" id="id_res" value="<?php echo $res['id_res']; ?>" maxlength="20">
                    <div class="form-group">
                        <label for="id_user">User</label>
                        <select class="form-control" name="id_user" id="id_user">
                        <?php 
                        include_once '../controller/Comptetable.php';
                        $userController = new compte_table();
                        $rows = $userController->Affichercompte();

                        foreach($rows as $row):
                          ?>
                          <option <?php echo ($res['id_user']==$row['id_user']) ? 'selected="selected"':'';?> value="<?=$row['id_user'];?>"> <?=$row['email'];?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="id_ticket">type user</label>
                        <select class="form-control" name="id_ticket" id="id_ticket">
                         <?php 
                        	$sql="SELECT * FROM ticket";
                          $db = config::getConnexion();

                            $rows = $db->query($sql);


                        foreach($rows as $row):
                          ?>
                          <?php
                                                  include_once '../Controller/ticketC.php';
                                                  $ticketCc = new ticketC();
                                                  $ticket = $ticketCc->showticket($row['id_ticket']);
                          ?>
                          <option <?php echo ($res['id_ticket']==$row['id_ticket']) ? 'selected="selected"':'';?> value="<?=$row['id_ticket'];?>"> <?=$ticket['type'];?></option>
                          <?php endforeach?>  
                        </select>
                      </div>  

                      <div class="form-group">
                        <label for="siege">siege</label>
                        <input type="text" name="siege" class="form-control" value="<?php echo $res['siege']; ?>" id="siege">
                      </div>

                      <div class="form-group">
                        <label for="etat">etat</label>
                        <input type="text" name="etat" class="form-control" value="<?php echo $res['etat']; ?>" id="etat">
                      </div>
                      <div class="form-group">
                      <label for="id_proj">Projection</label>
                      <select class="form-control" name="id_proj" id="id_proj">
                         <?php 
                        	$sql="SELECT * FROM projections";
                          $db = config::getConnexion();

                            $rows = $db->query($sql);


                        foreach($rows as $row):
                          ?>
                          <?php
                                                  include_once '../Controller/filmC.php';
                                                  $filmC = new filmC();
                                                  $film = $filmC->showfilm($row['id_film']);
                          ?>
                          <option <?php echo ($res['id_proj']==$row['id_proj']) ? 'selected="selected"':'';?> value="<?=$row['id_proj'];?>"> <?=$row['h_proj'];?> <?=$row['date_proj'];?> <?=$film['titre'];?></option>
                          <?php endforeach?>  
                        </select>
                      </div>  













                    
          
                        <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
<?php
    }
    ?>

          </div>
<?php
  // include header partial
  require_once '../admin/partials/_footer.html';
?>
</div>
</div>
<?php
  // include header partial
  require_once '../admin/partials/_includeend.html';
?>
</body>

</html>