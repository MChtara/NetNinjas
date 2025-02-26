
<?php
	require_once '../Controller/salleC.php';
	$salleC=new salleC(); 
  if(isset($_POST["type"]))
  {
    if($_POST["type"]=="tri")
    $listesalles=$salleC->affichertri();
  }
  else 
  {
    $listesalles=$salleC->afficherSalle();
  }
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
      <center><a href="addsalle.php"><button type="button" class="btn btn-inverse-primary btn-fw" spellcheck="false">Add Salle</button></a>
      <form action="" method="POST">
      <button type="submit" class="btn btn-inverse-primary btn-fw" spellcheck="false" name="type" value="tri">Sort</button>
</form>
	  </center>
	  </br>
        <div class="col-md-11 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Liste des salles:</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nom salle</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>nb places</th>
                      <th>Heure ouverture</th>
                      <th>Heure fermerture</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($listesalles as $row) {
                      ?>
                      <tr>
                        <td><?php echo $row['id_salle']; ?></td>
                        <td><?php echo $row['nom_salle']; ?></td>
                        <td><?php echo $row['latitude']; ?></td>
                        <td><?php echo $row['longitude']; ?></td>
                        <td><?php echo $row['nb_places']; ?></td>
                        <td><?php echo $row['H_ouv']; ?></td>
                        <td><?php echo $row['H_ferm']; ?></td>
                        <td>
                          <form method="POST" action="supprimersalle.php">
                          <button type="submit" class="btn btn-danger btn-fw">Supprimer</button>
						<input type="hidden" value=<?PHP echo $row['id_salle']; ?> name="id_salle">
					</form>
          <form method="POST" action="updatesalle.php">
          <b><button type="submit" class="btn btn-success btn-fw">Modifier</button>
          <input type="hidden" name="id_salle" value=<?PHP echo $row['id_salle']; ?>>
          
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
