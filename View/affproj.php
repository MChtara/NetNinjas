
<?php
	require_once '../Controller/projC.php';
	$projC=new projC();
	$listeproj=$projC->afficherProj(); 
?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title="Dashboard";
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
      <center><a href="addproj.php"><button type="button" class="btn btn-inverse-primary btn-fw" spellcheck="false">Add Proj</button></a>
	  </center>
    <br>
        <div class="col-md-11 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Liste des projections:</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id proj</th>
                      <th>Heure projection</th>
                      <th>ID Film</th>
                      <th>ID Salle</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($listeproj as $row) {
                      ?>
                      <tr>
                        <td><?php echo $row['id_proj']; ?></td>
                        <td><?php echo $row['h_proj']; ?></td>
                        <td><?php echo $row['id_film']; ?></td>
                        <td><?php echo $row['id_salle']; ?></td>
                        <td><?php echo $row['date_proj']; ?></td>
                     
                        <td>
                          <form method="POST" action="supprimerproj.php">
                          <button type="submit" class="btn btn-danger btn-fw">Supprimer</button>
						<input type="hidden" value=<?= $row['id_proj']; ?> name="id_proj">
					</form>
          <form method="POST" action="modiproj.php">
          <b><button type="submit" class="btn btn-success btn-fw">Modifier</button>
          <input type="hidden" name="id_proj" value=<?= $row['id_proj']; ?>>
          
                    </form>
                        </td>
                      </tr>
                      <?php       
                    }
                    ?>
                  </tbody>
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