<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../Controller/Comptetable.php';
include_once '../Controller/filmC.php';
require_once '../Controller/mediaC.php';
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


$error = "";

// create client
$compte = null;

// create an instance of the controller
$Comptetable = new compte_table();

if(isset($_REQUEST['pwdrst']))
{
    $pdo = new PDO("mysql:host=localhost;dbname=filmopia",'root','',);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $email = $_REQUEST['email'];
    $stmt = $pdo->prepare("SELECT email FROM user WHERE email=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $res = $stmt->rowCount();
if($res>0)
{
    $message = '<div>
<p><b>Hello!</b></p>
<p>You are recieving this email because we recieved a password reset request for your account.</p>
<br>
<p><button class="btn btn-primary"><a href="http://localhost/netninjaclass/View/reset.php?secret='.base64_encode($email).'">Reset Password</a></button></p>
<br>
<p>If you did not request a password reset, no further action is required.</p>
    </div>';
include_once("../PHPMailer/class.phpmailer.php");
include_once("../PHPMailer/class.smtp.php");
$email = $email; 
$compte=$Comptetable->getUserByemail($_POST["email"]);
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = "wael.bechraoui@esprit.tn";   //Enter your username/emailid
$mail->Password =  "pabrdihqxajoeoqv";  //Enter your password
$mail->FromName = "Tech Area";
$mail->AddAddress($email);
$mail->Subject = "Reset Password";
$mail->isHTML( TRUE );
$mail->Body =$message;
if($mail->send())
{
$_SESSION['msg'] = "We have e-mailed your password reset link!";
$_SESSION['email']=$email;
  $_SESSION["firstname"]=$compte["firstname"];
    $_SESSION["lastname"]=$compte["lastname"];
    $_SESSION["date"]=$compte["date_de_N"];
    $_SESSION["id_user"]=$compte["id_user"];
    $_SESSION["role"]=$compte["role"];
}
}
else
{
    $_SESSION['msg'] = "We can't find a user with that email address";
}
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
                <h3 class="card-title text-left mb-3">Forget Password</h3>
                <?php if(isset($_SESSION['msg'])):
        ?>
		<label class="badge badge-<?=$_SESSION['msg'];?>"><?php 
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
      ?></label>
      <?php endif ?>
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Email </label>
                    <input name="email" type="text" class="form-control p_input" id="email">
                  </div>
                 
                  
                  <div class="text-center">
                    <button type="submit" name="pwdrst"class="btn btn-primary btn-block enter-btn">Reset</button>
                  </div>

                  <p class="sign-up">Don't have an Account?<a href="register.php"> Sign Up</a></p>
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