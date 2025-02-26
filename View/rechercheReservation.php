<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../controller/reservationR.php";

$reservationR = new reservationR();

if (isset($_POST['recherche'])) {
    $etat = $_POST['etat'];
    $list = $reservationR->recherche($etat);
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header('Location: Listreservations.php');
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
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <?php if (isset($_SESSION['message'])): ?>
                                        <label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                        ?></label>
                                    <?php endif ?>
                                    <h4 class="card-title">recherche reservation</h4>
                                    <center><a href="Listreservations.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Listreservations</button></a></center>
                                    <form action="" method="post" class="forms-sample">
                                        <div class="form-group">
                                            <label for="etat">recherche etat</label>
                                            <input type="text" name="etat" class="form-control" id="etat">
                                        </div>
                                        <button onclick="return validaterecherche()" type="submit" name="recherche" class="btn btn-primary">recherche</button>
                                    </form>
                                    <?php if(isset($list)): ?>
                                        <?php require_once 'affichage.php'; ?>
                                    <?php endif; ?>
                                </div>
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
        <?php
            // include header partial
            require_once '../admin/partials/_includeend.html';
        ?>
        <script src="../Controller/validation.js"></script>    
   
