<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../Controller/ticketC.php';

$error = "";

// create reservation
$ticket = null;

// create an instance of the controller
$ticketC = new ticketC();
if (
    
    isset($_POST["type"]) &&
    isset($_POST["prix"]) 
    
) {
    if (
        !empty($_POST["type"]) &&
        !empty($_POST["prix"]) 
    ) {
        $ticket = new ticket(
            null,
            $_POST['type'],
            $_POST['prix']

            );
            $ticketC->addticket( $ticket);
        $_SESSION['message'] ="Record has been saved!";
        $_SESSION['msg_type'] = "success";
        header('Location:Listtickets.php');
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

                      <h4 class="card-title">Add  ticket</h4>
                      <center><a href="Listticket.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Listtickets</button></a></center>
                    <form action="" method="post" class="forms-sample">

                      <div class="form-group">
                        <label for="type">type</label>
                        <input type="text" name="type" class="form-control" id="type">
                      </div>

                      <div class="form-group">
                        <label for="prix">prix</label>
                        <input type="text" name="prix" class="form-control" id="prix">
                      </div>
                      
                      <button onclick="return validateticket()" type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>

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
    </body>

</html>