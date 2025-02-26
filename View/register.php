<?php

include '../Controller/Comptetable.php';
include_once '../Controller/filmC.php';
require_once '../Controller/mediaC.php';

$error = "";

// create client
$compte = null;
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


// create an instance of the controller
$Comptetable = new compte_table();
if (
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["date"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"])
    
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"])
        
        

    
        ) {
        $compte = new compte(
            null,
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['date'],
            $_POST['email'],
            hash('sha256', $_POST['password']),          
            1
        );
        $Comptetable->Ajoutercompte($compte);
        $login=$Comptetable->getUserByemail($compte->getemail());
        $type=$Comptetable->Recuperertype($login["role"]);
        $_SESSION["firstname"]=$login["firstname"];
        $_SESSION["lastname"]=$login["lastname"];
        $_SESSION["email"]=$login["email"];
        $_SESSION["id_user"]=$login["id_user"];
        $_SESSION["role"]=$login["role"];
        $_SESSION["rolelabel"]=$type["role"];
        header('Location:../index.php');
      } else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Filmopia - Création de compte</title>
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
                <h3 class="card-title text-left mb-3">Création de compte</h3>
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="firstName">Prénom</label>
                    <input type="text" name="firstName" id="firstName" class="form-control p_input" >
                  </div> <div class="form-group">
                    <label for="lastName">Nom</label>
                    <input type="text" name="lastName" id="lastName" class="form-control p_input">
                  </div> <div class="form-group">
                    <label for="date">Date de naissance</label>
                    <input type="date" name="date" id="date" class="form-control p_input">
      </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control p_input">
</div>
          
                  <div class="text-center">
                  <button type="submit" name="ajouter" class="btn btn-primary">S'inscrire</button>
                  </div>
                  <p class="sign-up text-center">Déjà inscrit?<a href="login.php"> Se connecter</a></p>
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