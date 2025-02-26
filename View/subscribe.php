<?php
	include_once '../Controller/abonnementC.php';

	$abonnementC=new abonnementC();
  
    $listeCategorie=$abonnementC->AfficherCategorie(); 
    ?>
<!DOCTYPE html>
<html lang="en">
<?php 
  $title="Subscribe";
  ?>
<?php
      // include header partial
      require_once '../film/partials/_includehead.php';
      if(!isset($_SESSION["id_user"])){
        header('Location:login.php');
      }
      else
      {
        $abon = $abonnementC->CheckAbonnementUser($_SESSION["id_user"]);
        if (!$abon)
        {
          $_SESSION['message'] ="You already have a subscription.";
          header('Location: confirmAbon.php');
        }
      }
    ?>
  <link rel="stylesheet" href="css/notfound.css">

<body>
    <div class="container">
        <?php
      // include header partial
      require_once '../film/partials/_navbar.php';
    ?>

        <main>
            <div class="main-panel">
                <div class="content-wrapper">
                <br>
                <br>
                <div class="card_film">
                <div>
  <div class="starsec"></div>
  <div class="starthird"></div>
  <div class="starfourth"></div>
  <div class="starfifth"></div>
</div>
                <center><h3>Select your subscription type</h3></center>
                            <br>
                            <br>
                            <div class="c-btn-group c-btn-group--block">
                                <?php
                                				foreach($listeCategorie as $category){
                                                    if(!($category['prix_typeabon']==0)){
                                                    ?>
                            <a class="c-btn" id="<?php echo $category['id_typeabon']; ?>" onclick="getID(this.id)"><i class="mdi mdi-<?php echo $category['icon_typeabon']; ?>" style="font-size: 128px;"><?php $category['label_typeabon']; ?></i><p><?php echo $category['label_typeabon']; ?></p><p><?php echo $category['prix_typeabon']; ?> DT</p></a>
                            <?php }
                                                }
                            ?>
                            </div>
                            <form action="../Process/pay_service.php" method="post" class="forms-sample">
                            <input type="hidden" name="subscription" id="subscription" value = "5">
                            <center>
                                <br>
                                <br>
                                <div class="g-recaptcha" data-sitekey="6Ld-EbElAAAAABHAEemNC8J-M2ghnvxy9W9mhEG5"></div>
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                    <br>
                            <button type="submit" name="subscribe" id="subscribe" onclick="return dosubmit()" disabled class="btn btn-primary">Subscribe</button>
                            </center>
                            </form>
                </div>

                
                </div>
            </div>
        </main>


        <?php
      // include header partial
      require_once '../film/partials/_footer.html';
    ?>

    </div>

    <?php
  // include header partial
  require_once '../film/partials/_includeend.html';
?>
</body>
<script>
    const buttons = document.querySelectorAll(".c-btn");
buttons.forEach(button => {
    
  button.addEventListener("click",() => {5
    // do some action according to button
    buttons.forEach(button => {
        button.classList.remove("c-btn--active");
    })
    // show success feedback
    button.classList.add("c-btn--active");
    document.getElementById("subscribe").disabled = false;
  })
})
function getID(btnID){
    document.getElementById("subscription").value=btnID;
}
function dosubmit() {
  var response = grecaptcha.getResponse();
  if(response.length != 0) {
    return true;
  } else {
    return false;
  }
}

    </script>
</html>