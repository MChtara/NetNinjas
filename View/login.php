<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../Controller/Comptetable.php';
include_once '../Controller/abonnementC.php';
include_once '../Controller/filmC.php';
require_once '../Controller/mediaC.php';
$error = "";
$filmC = new filmC();
$mediaC = new mediaC();
$list_film1 = "";
$list_film2 = "";
$list_film3 = "";
$list_film4 = "";
$list_film5 = "";
$list_film6 = "";

foreach ($filmC->listFilmstri("DESC","id_film") as $film):
$media = $mediaC->searchfilm($film['id_film']);
$med = null;
if (!empty($media['img'])) 
{ 
	$med=$media['img'];
} else {
	$med="../film/assests/images/film.jpg"; 
	} 
$list_film1=$list_film1.'<div class="line" style="background-image:url('.$med.')"><div class="img" style="background-image:url('.$med.')"></div></div>';

endforeach;
foreach ($filmC->listFilmstri("ASC","id_film") as $film):
	$media = $mediaC->searchfilm($film['id_film']);
	if (!empty($media['img'])) 
{ 
	$med=$media['img'];
} else {
	$med="../film/assests/images/film.jpg"; 
	} 
$list_film2=$list_film2.'<div class="line" style="background-image:url('.$med.')"><div class="img" style="background-image:url('.$med.')"></div></div>';

	endforeach;
	foreach ($filmC->listFilmstri("DESC","titre") as $film):
		$media = $mediaC->searchfilm($film['id_film']);
		if (!empty($media['img'])) 
{ 
	$med=$media['img'];
} else {
	$med="../film/assests/images/film.jpg"; 
	} 
$list_film3=$list_film3.'<div class="line" style="background-image:url('.$med.')"><div class="img" style="background-image:url('.$med.')"></div></div>';

		endforeach;
		foreach ($filmC->listFilmstri("ASC","titre") as $film):
			$media = $mediaC->searchfilm($film['id_film']);
			if (!empty($media['img'])) 
			{ 
				$med=$media['img'];
			} else {
				$med="../film/assests/images/film.jpg"; 
				} 
			$list_film4=$list_film4.'<div class="line" style="background-image:url('.$med.')"><div class="img" style="background-image:url('.$med.')"></div></div>';
			
			endforeach;
			foreach ($filmC->listFilmstri("ASC","realisateur") as $film):
				$media = $mediaC->searchfilm($film['id_film']);
				if (!empty($media['img'])) 
{ 
	$med=$media['img'];
} else {
	$med="../film/assests/images/film.jpg"; 
	} 
$list_film5=$list_film5.'<div class="line" style="background-image:url('.$med.')"><div class="img" style="background-image:url('.$med.')"></div></div>';

				endforeach;
				foreach ($filmC->listFilmstri("DESC","realisateur") as $film):
					$media = $mediaC->searchfilm($film['id_film']);
					if (!empty($media['img'])) 
{ 
	$med=$media['img'];
} else {
	$med="../film/assests/images/film.jpg"; 
	} 
$list_film6=$list_film6.'<div class="line" style="background-image:url('.$med.')"><div class="img" style="background-image:url('.$med.')"></div></div>';

					endforeach;
$mediaC = new mediaC();

// create client
$compte = null;

// create an instance of the controller
$Comptetable = new compte_table();
$abonnementC=new abonnementC();

if (
  isset($_POST["email"]) &&
  isset($_POST["password"])
  
) {
  if (
      !empty($_POST["email"]) &&
      !empty($_POST["password"])
) {
$compte=$Comptetable->getUserByemail($_POST["email"]);
if(!empty($compte))
{
  if($compte["password"]!=hash('sha256', $_POST['password']))
  {$_SESSION['message'] ="password incorrect ";
  $_SESSION['msg_type'] = "warning";
  }else{
    $type=$Comptetable->Recuperertype($compte["role"]);
    $_SESSION["firstname"]=$compte["firstname"];
    $_SESSION["lastname"]=$compte["lastname"];
    $_SESSION["email"]=$compte["email"];
    $_SESSION["id_user"]=$compte["id_user"];
    $_SESSION["role"]=$compte["role"];
    $_SESSION["rolelabel"]=$type["role"];
    $abon = $abonnementC->CheckAbonnementUser($_SESSION["id_user"]);
    if (!$abon)
    {
      $abonnemenet= $abonnementC->GetAbonnementType($_SESSION["id_user"]);
      $_SESSION["abon"]=$abonnemenet;
    }
    header('Location:../index.php');
  }

}else{
  $_SESSION['message'] ="email incorrect ";
    $_SESSION['msg_type'] = "danger";


}
  }else{ $_SESSION['message'] ="missing information ";
    $_SESSION['msg_type'] = "danger";}
  }
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Filmopia - Se connecter</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/css/paralaxeffect.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="http://localhost/netninjaclass/assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="wrapper-images" style="z-index: 650;">
	<?php for($x = 0; $x < 7; $x++): 
			?>
	<!-- 5 images by row -->
	<div class="images-line">
	
	<?php echo $list_film1; ?>
		<?php echo $list_film2; ?>
		<?php echo $list_film3; ?>
	</div>
	<!-- 5 images by row -->
	<div class="images-line">
	<?php echo $list_film4; ?>
		<?php echo $list_film5; ?>
		<?php echo $list_film6; ?>
	</div>
	<?php endfor; ?>
</div>
            <div class="row w-100 m-0" style="z-index: 900;">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth" style="opacity: 0.9;background-color: rgba(0, 0, 0, .25);">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Se connecter</h3>
                            <?php if(isset($_SESSION['message'])):
        ?>
                            <label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?></label>
                            <?php endif ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Email </label>
                                    <input name="email" type="text" class="form-control p_input" id="email">
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe </label>
                                    <input name="password" type="password" class="form-control p_input" id="password">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <a href="forget.php" class="forgot-pass">Mot de passe oublié</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Se connecter</button>
                                </div>

                                <p class="sign-up">Déjà sur notre platforme?<a href="register.php"> S'enregistrer</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="http://localhost/netninjaclass/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="http://localhost/netninjaclass/assets/js/off-canvas.js"></script>
    <script src="http://localhost/netninjaclass/assets/js/hoverable-collapse.js"></script>
    <script src="http://localhost/netninjaclass/assets/js/misc.js"></script>
    <script src="http://localhost/netninjaclass/assets/js/settings.js"></script>
    <script src="http://localhost/netninjaclass/assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>