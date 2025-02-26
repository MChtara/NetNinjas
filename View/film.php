<?php
require_once '../Controller/filmC.php';
require_once '../Controller/mediaC.php';
require_once '../Controller/categorieC.php';
require_once '../Controller/abonnementC.php';
$categorie = new categorieC();
$filmC = new filmC();
$mediaC = new mediaC();
$abonnementC = new abonnementC();
$film = null;
$media = null;
if(isset($_GET['film_id']))
{
  $film = $filmC->showfilm($_GET['film_id']);
  $media = $mediaC->searchfilm($_GET['film_id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<?php 
  $title=$film['titre'];
  ?>
<?php
      // include header partial
      require_once '../film/partials/_includehead.php';
      if (isset($_SESSION['email']))
      {
      $abon = $abonnementC->CheckAbonnementUser($_SESSION["id_user"]);
      }else{
        $abon=true;
      }
      if(!isset($_GET['film_id']))
      {
    $_SESSION['errorcode']="404";
    $_SESSION['errormessage']="The movie you requested is lost in the void.";
    header('Location:empty.php');
      }
    ?>

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
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <div class="movie-card">

                                    <div class="card-head">
                                        <img <?php if (!empty($media['img'])) { ?>src="<?php echo $media['img'];?>"
                                            <?php } else { ?>src="../film/assests/images/film.jpg" <?php } ?> alt=""
                                            class="card-img">
                                        <div class="card-overlay">
                                            <div class="rating">
                                                <ion-icon name="time-outline"></ion-icon>
                                                <span><?= $film['duree']; ?> min</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h2 class="card-title"><?php echo $film['titre'];?></h2>
                                <br>
                                <br>
                                <p class="font-18 max-width-600"><?php echo $film['synopsis'];?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <?php if ($media['trailer']!="")
                    {
                      ?>
                    <div class="card_film">
                        <?php 
                            if ($abon)
                            {
                              if($media['trailer']!="")
                              {
                          $restofstring = substr($media['trailer'], 8);
                          echo '<iframe frameborder="0" scrolling="no" height="720px" width="100%" type="text/html" src="https://www.youtube.com/embed/'.$restofstring.'?autoplay=0&fs=1&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=1&start=0&end=0&vq=hd720&origin=https://youtubeembedcode.com"></iframe>';
                              }
                          } else
                          {
                             if ($media['video']!="")
                             {
                          echo '<video width="100%" height="720" controls>
                                    <source src="'.$media['video'].'">
                                </video>';
                             }
                             else
                             {
                              if($media['trailer']!="")
                              {
                              $restofstring = substr($media['trailer'], 8);
                          echo '<iframe frameborder="0" scrolling="no" height="720px" width="100%" type="text/html" src="https://www.youtube.com/embed/'.$restofstring.'?autoplay=0&fs=1&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=1&start=0&end=0&vq=hd720&origin=https://youtubeembedcode.com"></iframe>';
                            echo '<h4>This movie has yet to be released on our website.</h4>';
                          }
                             }
                            }
                                         
                      ?>
                    </div>
                    <?php } ?>
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