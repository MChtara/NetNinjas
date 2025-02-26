<?php
require_once '../Controller/projC.php';
require_once '../Controller/filmC.php';
require_once '../Controller/categorieC.php';
require_once '../Controller/mediaC.php';
require_once '../Controller/salleC.php';
$projC=new projC();
$filmC= new filmC();
$mediaC= new mediaC();
$categorieC = new categorieC();
$salleC= new salleC();
$daytosearch=null;
   if (isset($_GET['date_proj'])) {

    $daytosearch=$_GET['date_proj'];
    $listeproj = $projC->afficherProjFront($_GET['date_proj']);
}
else 
{
    $today = date('Y-m-d');
    $daytosearch=$today;
    $listeproj = $projC->afficherProjFront($today);
    if(!$listeproj)
    for($x = 0; $x < 7; $x++)
    {
        $daytosearch=date('Y-m-d', strtotime("+$x day"));
        $listeproj = $projC->afficherProjFront($daytosearch);
        if($listeproj)
        {
            break;
        }
    }
    //$listeproj = $projC->afficherProj();

}
    ?>

<!DOCTYPE html>
<html lang="en">
<?php 
  $title="Films";
  ?>
<?php
      // include header partial
      require_once '../film/partials/_includehead.php';
    ?>
<link rel="stylesheet" href="http://localhost/netninjaclass/assets/css/projection.css">

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
                    <div class="card_film">

                        <div class="row align-items-center">
                            <div class="col col-lg-14 col-lg-offset-3 mb-3 mb-lg-0">
                                <swiper
                                    class="slider slider--date mb-2 mt-2 mb-lg-3 mt-lg-3 swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                                    <!---->
                                    <div class="swiper-wrapper slider__wrapper">
                                        <!---->

                                        <?php
                                        for ($x = 0; $x < 7; $x++) {?>
                                        <div data-swiper-slide-index="<?=$x?>" class="swiper-slide swiper-slide-active"
                                            style="margin-right: 5px;">
                                            <!---->
                                            <cgp-calendar-item>

                                                <?php $currentDate = date('Y-m-d', strtotime("+$x day"));
                                                $dayName = date('l', strtotime($currentDate)); 
                                                $shortDayName = substr($dayName, 0, 3);
                                                $date = new DateTime($currentDate);
                                                $monthName = $date->format('F');
                                                $shortMonthName = substr($monthName, 0, 3);
                                                $day_num=date('d', strtotime("+$x day"));
                                                $dayfull=date('Y-m-d', strtotime("+$x day"));
                                                ?>
                                                <a href="http://localhost/netninjaclass/View/projection.php?date_proj=<?php echo $dayfull;?>"
                                                    name="date_p"
                                                    class="date ft-center <?php if($daytosearch==$dayfull) {echo 'activedate '; }; if(!$projC->hasfilm($dayfull)) {echo 'disabled'; };?>">
                                                    <span class="ft-label-large ft-700"> <?= $shortDayName?>
                                                    </span>
                                                    <span class="date__number h2 ft-700"> <?= $day_num?>
                                                    </span>
                                                    <span class="date__month ft-label-large ft-700">
                                                        <?= $shortMonthName?>
                                                    </span>

                                                </a>




                                            </cgp-calendar-item>
                                            <!---->
                                        </div>
                                        <?php }
                                    ?>

                                        <!---->
                                    </div>
                                    <span slot="container-end" cgpswipernav="">
                                        <div class="slider__prev swiper-button-disabled">
                                            <button class="link-icon link-icon--small link-icon--white">
                                                <svg class="icon icon-arrow-left">
                                                    <use xlink:href="/assets/source/img/sprite.svg#icon-arrow-left">

                                                    </use>
                                                </svg>
                                            </button>

                                            <div class="slider__next">
                                                <button class="link-icon link-icon--small link-icon--white">
                                                    <svg class="icon icon-arrow-right">
                                                        <use
                                                            xlink:href="/assets/source/img/sprite.svg#icon-arrow-right">

                                                        </use>
                                                    </svg>
                                                </button>
                                            </div>
                                    </span>
                                    <!---->
                                </swiper>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <!---->
                        <div class="col col-lg-14 col-lg-offset-1 mb-3 mb-lg-0">


                            <div cgpcinemashow="" cgpshowtimeloader="" class="card-screening">
                                <!---->
                                <?php
                                    $films = array(); 
                                    
                                    foreach ($listeproj as $projection) {
                                        if (!in_array($projection['id_film'], $films)) {
                                          array_push($films, $projection['id_film']); // add year to array
                                        }
                                      }
                                      
                                      foreach ($films as $film_id)
                                      {
                                        $film = $filmC->showfilm($film_id);
                                        $categorie = $categorieC->showCategorie($film['id_cat']);
                                        $media = $mediaC->searchfilm($film['id_film']);
                                        ?>
                                <div class="card-screening__content f">
                                    <div class="movie-card" data-genre="<?= $film['id_cat'] ?>"
                                        data-year="<?= $film['annee'] ?>">
                                        <a href="film.php?film_id=<?php echo $film['id_film'];?>">
                                            <picture class="mr-3 card-screening__img">
                                                <div class="card-head" style="height:100%;">
                                                    <img <?php if (!empty($media['img'])) { ?>src="<?php echo $media['img'];?>"
                                                        <?php } else { ?>src="../film/assests/images/film.jpg"
                                                        <?php } ?> alt="" class="card-img">
                                                    <div class="card-overlay">
                                                        <div class="rating">
                                                            <ion-icon name="time-outline"></ion-icon>
                                                            <span><?= $film['duree']; ?> min</span>
                                                        </div>
                                                        <div class="play">
                                                            <ion-icon name="film-outline"></ion-icon>
                                                        </div>
                                                    </div>
                                                </div>

                                            </picture>
                                        </a>

                                    </div>

                                    <div class="card-screening__right">
                                        <div class="mb-lg-4">
                                            <p class="h3 ft-700 mt-1 mb-04">
                                                <a href="/en/movies-events/la-plus-belle-pour-aller-danser-34901"
                                                    style="line-height: 0.2;">
                                                    <?php echo  $film['titre'];?>
                                                </a>
                                            </p>
                                            <div class="ft-secondary f-inline f-wrap f-ai-center whitetext">


                                                <span>
                                                    <?php
                                                        echo $categorie['nom_cat'];
                                                        ?>
                                                    <!---->
                                                </span>
                                            </div>
                                            <!---->
                                            <cgp-content-rating>
                                                <div class="card-screening__warning f-ai-center f-inline ft-divider">
                                                    <!----> &nbsp;
                                                </div>
                                                <!---->
                                            </cgp-content-rating>
                                        </div>
                                    </div>
                                    <div>
                                        <!---->

                                        <div class="slider slider--screening">
                                            <div class="slider__wrapper">
                                                <?php 
                                                                       $projec = $projC->recupererproj_par_film($film_id,$daytosearch);
                                                                       foreach ($projec as $proj)
                                                                       {
                                                                        $salle = $salleC->recuperersalle($proj['id_salle']);
                                                                        ?>

                                                <a role="button"
                                                    href="reserver.php?id_proj=<?php echo $proj['id_proj'];?>"
                                                    class="screening">
                                                    <span class="ft-700 screening__title">
                                                        <?= substr($proj['h_proj'], 0, 5);?>
                                                    </span>
                                                    <br>
                                                    <span>
                                                        <?= $salle['nom_salle'];?>
                                                    </span>
                                                </a>

                                                <?php }?>

                                                <!---->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                      
                                      }
                   


                        

                      ?>
                            </div>
                            

                            <!---->
                        </div>
                    </div>
                </div>
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