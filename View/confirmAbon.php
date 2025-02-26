<!DOCTYPE html>
<html lang="en">
<?php 
  $title="Confirm Subscribe";
  ?>
<?php
      // include header partial
      require_once '../film/partials/_includehead.php';
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
                        <center>
                            <h1><?php echo $_SESSION['message'];
                                  unset($_SESSION['message']); ?></h1>

                        </center>
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

</html>