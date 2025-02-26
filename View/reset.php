<?php
include '../Controller/Comptetable.php';
include_once '../Controller/filmC.php';
include_once '../Controller/mediaC.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Connect to database using PDO
$pdo = new PDO("mysql:host=localhost;dbname=filmopia",'root','',);
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


$compte = null;

$Comptetable = new compte_table();

if(isset($_GET["email"])) :
$compte=$Comptetable->getUserByemail($_GET["email"]);
endif;
if (isset($_POST["password"])

) {
if (

!empty($_POST["password"])

) {
$compte = new compte(
null,
$_SESSION['firstname'],
$_SESSION['lastname'],
$_SESSION['date'],
$_SESSION['email'],
hash('sha256', $_POST['password']),
$_SESSION['role']
);
$Comptetable->pass($compte,$_SESSION["email"]);
header('Location:login.php');
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
    <title>Filmopia - Login</title>
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
                <h3 class="card-title text-left mb-3">reset password</h3>
                <?php if(isset($_SESSION['message'])):
        ?>
		<label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?></label>
      <?php endif ?>
                <form action="" method="POST">
                  
                  <div class="form-group">
                    <label for='pasword'> New Password </label>
                    <input name="password" type="password" class="form-control p_input" id="password">
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">change</button>
                  </div>

                
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