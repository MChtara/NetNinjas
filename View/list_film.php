<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../Controller/filmC.php';
require_once '../Controller/categorieC.php';

$filmC = new filmC();
$list = $filmC->listFilms();
?>

<!DOCTYPE html>
<html lang="en">

<?php 
  $title="Liste des Films";
  ?>
  <?php
  // include header partial
  require_once '../admin/partials/_includehead.php';
?>

<body>
    <div class="container-scroller">

    <?php
    // include header partial
     require_once '../admin/partials/_navbar.php';
    ?>
    <?php
    // include header partial
     require_once '../admin/partials/_sidebar.php';
    ?>

<div class="main-panel">
          <div class="content-wrapper">
          <?php
          if(isset($_SESSION['message'])):
        ?>
		<label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?></label>
      <?php endif ?>
	  <center><a href="add_film.php"><button type="button" class="btn btn-inverse-primary btn-fw" spellcheck="false">Add Film</button></a>
	  </center>
	  </br>
    <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
            <div class="table-responsive">
            <table class="table">
		   <thead>
			<tr>
				<th>ID</th>
				<th>Titre</th>	
        <th>Realisateur</th>
        <th>durree</th>
        <th>synopsis</th>
        <th>annee</th>	
        <th>categorie</th>
			</tr>
			</thead>
            <?php
        foreach ($list as $film) {
        ?>
			<tr>
				<td><?php echo $film['id_film']; ?></td>
				<td><?php echo $film['titre']; ?></td>
                <td><?php echo $film['realisateur']; ?></td>
                <td><?php echo $film['duree']; ?></td>
                <td><?php echo $film['synopsis']; ?></td>
                <td><?php echo $film['annee']; ?></td>
                <td><?php echo $film['nom_cat']; ?></td>

				<td>
        <a href="add_video_film.php?id_film=<?php echo $film['id_film'] ?>" spellcheck="false">
                      <i class="mdi mdi-video-plus"></i>
        </a>
        <a href="add_img_film.php?id_film=<?php echo $film['id_film'] ?>" spellcheck="false">
                      <i class="mdi mdi-image-area"></i>
        </a>
				<a href="update_film.php?id_film=<?php echo $film['id_film'] ?>" spellcheck="false">
                      <i class="mdi mdi-tooltip-edit"></i> 
                    </a>
				<a href="delete_film.php?id_film=<?php echo $film['id_film'] ?>">
                      <i class="mdi mdi-trash-can"></i> 
                    </a></td>
			</tr>
			<?php
				}
			?>
		</table>
          </div>
            </div>
      </div>
      </div>
      </div>
<?php
  // include header partial
  require_once '../admin/partials/_footer.html';
?>
</div>
</div>
<?php
  // include header partial
  require_once '../admin/partials/_includeend.html';
?>
</body>

</html>