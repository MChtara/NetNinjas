<?php
include '../Controller/categorieC.php';
$categorie = new categorieC();
$list = $categorie->listCategorie();
?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title="Liste Categorie";
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
	  <center><a href="addcat.php"><button type="button" class="btn btn-inverse-primary btn-fw" spellcheck="false">Add Categorie</button></a>
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
				<th>Nom </th>	
				
			</tr>
			</thead>
            <?php
        foreach ($list as $categorie) {
        ?>
			<tr>
				<td><?php echo $categorie['id_cat']; ?></td>
				<td><?php echo $categorie['nom_cat']; ?></td>

				<td>
				<a href="updatecat.php?id_cat=<?php echo $categorie['id_cat'] ?>" spellcheck="false">
                      <i class="mdi mdi-tooltip-edit"></i> 
                    </a>
				<a href="deletecat.php?id_cat=<?php echo $categorie['id_cat'] ?>">
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

      <!--Statistique -->
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Statistique</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Charts</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Chart-js
                  </li>
                </ol>
              </nav>
            </div>

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Nombre  de  films  par  rapport  au  categorie</h4>
                  <canvas id="barChart" style="height: 230px"></canvas>
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
<script src="chart.js"></script>
</body>