<?php
require_once '../Controller/filmC.php';
require_once '../Controller/categorieC.php';
require_once '../Controller/mediaC.php';
$categorie = new categorieC();
$mediaC = new mediaC();
$list_cat = $categorie->listCategorie();
$media = null;
$filmC = new filmC();
$list_film = $filmC->listFilms();

$list_annee = $filmC->listFilms();
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

<body>
    <div class="container">
        <?php
      // include header partial
      require_once '../film/partials/_navbar.php';
    ?>


        <main>


            <section class="movies"> <br>

                <div class="filter-bar">
                    <div class="filter-dropdowns">
                        <select name="genre_f" class="genre_f">
                            <option value="all genres">All genres</option>
                            <?php
                        foreach ($list_cat as $categorie) {
                          echo "<option value=\"".$categorie['id_cat']."\">".$categorie['nom_cat']."</option>";                  
                          }
                        ?>
                        </select>

                        <select name="year_f" class="year_f">
                            <option value="all years">All the years</option>

                            <?php
                $added_years = array(); // temporary array to store added years

                foreach ($list_annee as $film) {
                  if (!in_array($film['annee'], $added_years)) { // check if year already added
                    echo "<option value=\"".$film['annee']."\">".$film['annee']."</option>";
                    array_push($added_years, $film['annee']); // add year to array
                  }
                }
                ?>
                        </select>
                    </div>

                </div>
                <br><br>

                <div class="movies-grid">
                    <?php foreach ($list_film as $film): ?>
                    <?php $media = $mediaC->searchfilm($film['id_film']);?>
                    <div class="movie-card" data-genre="<?= $film['id_cat'] ?>" data-year="<?= $film['annee'] ?>">
                        <a href="film.php?film_id=<?php echo $film['id_film'];?>">
                            <div class="card-head">
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
                        </a>
                        <div class="card-body">
                            <h3 class="card-title"><?= $film['titre']; ?></h3>
                            <div class="card-info">
                                <span class="genre"><?= $film['nom_cat']; ?></span>
                                <span class="year"><?= $film['annee']; ?></span>
                            </div>
                            <span class="synopsis"><?= $film['realisateur']; ?></span><br><br>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </section>


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

    <script src="../Controller/filtre.js"></script>

    <script>
    var genreDropdown = document.querySelector('select[name="genre_f"]');
    var yearDropdown = document.querySelector('select[name="year_f"]');

    genreDropdown.addEventListener('change', filterResults);
    yearDropdown.addEventListener('change', filterResults);
    </script>

</body>

</html>