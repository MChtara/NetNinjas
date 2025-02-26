<li class="l-section section">
    <?php
require_once '../Controller/projC.php';
require_once '../Controller/filmC.php';
require_once '../Controller/categorieC.php';
require_once '../Controller/mediaC.php';
require_once '../Controller/salleC.php';
$projC=new projC();
$filmC= new filmC();
$mediaC= new mediaC();
$salleC= new salleC();
$categorieC = new categorieC();
$daytosearch = date('Y-m-d');

$listeproj = $projC->afficherProjFront($daytosearch);
$i=0;
if(!$listeproj)
for($x = 0; $x < 7; $x++)
{
    $i++;
    $daytosearch=date('Y-m-d', strtotime("+$x day"));
    $listeproj = $projC->afficherProjFront($daytosearch);
    if($listeproj)
    {
        break;
    }
}
$films = array(); 
                                    
                                    foreach ($listeproj as $projection) {
                                        if (!in_array($projection['id_film'], $films)) {
                                          array_push($films, $projection['id_film']); // add year to array
                                        }
                                      }
?>
    <div class="work">
        <?php if($listeproj)
        { ?>
        <h2>Projection pour la journée de <?= $daytosearch ?></h2>
        <div cgpcinemashow="" cgpshowtimeloader="" class="card-screening">

            <?php
                                      foreach ($films as $film_id)
                                      {
                                        $film = $filmC->showfilm($film_id);
                                        $categorie = $categorieC->showCategorie($film['id_cat']);
                                        $media = $mediaC->searchfilm($film['id_film']);
                                        ?>
            <div class="card-screening__content f">
                <div class="movie-card" data-genre="<?= $film['id_cat'] ?>" data-year="<?= $film['annee'] ?>">
                    <a href="film.php?film_id=<?php echo $film['id_film'];?>">
                        <picture class="mr-3 card-screening__img">
                            <div class="card-head" style="height:100%;">
                                <img <?php if (!empty($media['img'])) { ?>src="<?php echo $media['img'];?>"
                                    <?php } else { ?>src="../film/assests/images/film.jpg" <?php } ?> alt=""
                                    class="card-img">
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
                            <a href="/en/movies-events/la-plus-belle-pour-aller-danser-34901" style="line-height: 0.2;"
                                class="textwhite">
                                <?php echo  $film['titre'];?>
                            </a>
                        </p>
                        <div class="ft-secondary f-inline f-wrap f-ai-center whitetext">


                            <span>
                                <?php
                                                        echo $categorie['nom_cat'];
                                                        ?>

                            </span>
                        </div>

                        <cgp-content-rating>
                            <div class="card-screening__warning f-ai-center f-inline ft-divider">
                                &nbsp;
                            </div>

                        </cgp-content-rating>
                    </div>
                </div>



                <div class="slider slider--screening">
                    <div class="slider__wrapper">
                        <?php 
                                                                       $projec = $projC->recupererproj_par_film($film_id,$daytosearch);
                                                                       foreach ($projec as $proj)
                                                                       {
                                                                        $salle = $salleC->recuperersalle($proj['id_salle']);
                                                                        ?>

                        <a role="button" href="reserver.php?id_proj=<?php echo $proj['id_proj'];?>" class="screening"
                            style="width:60px;text-decoration: none;">
                            <span class="ft-700 screening__title">
                                <?= substr($proj['h_proj'], 0, 5);?>
                            </span>
                            <br>
                            <span>
                                <?= $salle['nom_salle'];?>
                            </span>
                        </a>

                        <?php }?>

                    </div>
                </div>

            </div>
            <?php
                                      
                                    }
                                  }
                                  else
                                  {
                    ?>
        </div>

                      <h2>Projections are not available at the moment.</h2>
<?php 
                                    }
                                    ?>
    
    </div>
</li>