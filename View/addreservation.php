<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
) {
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
        $reservationR->addreservation($reservation);
        $_SESSION['message'] ="Record has been saved!";
        $_SESSION['msg_type'] = "success";
        header('Location:Listreservations.php');
    } else
      //  $error = "Missing information";
      $_SESSION['message'] = "Missing information";
      $_SESSION['msg_type'] = "warning"; 
}


?>
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
            <div id="error">
              <?php echo $error; ?>
                </div>
                  <?php if(isset($_SESSION['message'])):
        ?>
		<label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?></label>
      <?php endif ?>

                      <h4 class="card-title">Add reservation</h4>
                      <center><a href="Listreservations.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Listreservations</button></a></center>
                    <form action="" method="post" class="forms-sample">
                    <div class="form-group">
                        <label for="id_user">User</label>
                        <select class="form-control" name="id_user" id="id_user">
                        <?php 
                        include_once '../controller/Comptetable.php';
                        $userController = new compte_table();
                        $rows = $userController->Affichercompte();

                        foreach($rows as $row):
                          ?>
                          <option value="<?=$row['id_user'];?>"> <?=$row['email'];?></option>
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
                          <option value="<?=$row['id_ticket'];?>"> <?=$ticket['type'];?></option>
                          <?php endforeach?>  
                        </select>
                      </div>  

                      <div class="form-group">
                        <label for="siege">siege</label>
                        <input type="text" name="siege" class="form-control" id="siege">
                      </div>

                      <div class="form-group">
                        <label for="etat">etat</label>
                        <input type="text" name="etat" class="form-control" id="etat">
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
                          <option value="<?=$row['id_proj'];?>"> <?=$row['h_proj'];?> <?=$row['date_proj'];?> <?=$film['titre'];?></option>
                          <?php endforeach?>  
                        </select>
                      </div>  

                      
                      <button onclick="return validateReservation()" type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>

                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
 <script src="../Controller/validation.js"></script>  
 <!-- on commence a partir d'ici -->

  </div>
   
</div>

    </body>

</html>