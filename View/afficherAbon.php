<?php
	include '../Controller/abonnementC.php';

	$abonnementC=new abonnementC();
    $listeAbonnement=$abonnementC->AfficherAbonnement(); 
    ?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title="Liste Type Abonnement";
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
	  <center><a href="ajoutAbon.php"><button type="button" class="btn btn-inverse-primary btn-fw" spellcheck="false">Add Abonnement</button></a>
	  <a href="afficherTypeAbon.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">List Categorie</button></a></center>
	  </br>
	  <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
				  <input id="myInput" class="form-control" type="text" placeholder="Search.." spellcheck="false">
            <div class="table-responsive">
<table class="table" id="myTable">
		   <thead>
			<tr>
				<th>ID</th>
				<th>Type</th>	
				<th>Date Debut</th>
				<th>Date Fin</th>
				<th>ID Utilisateur</th>
				<th>Actions</th>
			</tr>
			</thead>
			<?php
		
				foreach($listeAbonnement as $abonnement){
					$category=$abonnementC->RecupererCategorie($abonnement['type'])
			?>
			<tr>
				<td><?php echo $abonnement['id_ab']; ?></td>
				<td><?php echo $category['label_typeabon']; ?></td>
				<td><?php echo $abonnement['date_debut']; ?></td>
				<td><?php echo $abonnement['date_expiration']; ?></td>
				<td><?php echo $abonnement['id_user']; ?></td>
				<td>
				<a href="ajoutAbon.php?id_abon=<?php echo $abonnement['id_ab'] ?>" spellcheck="false">
                      <i class="mdi mdi-tooltip-edit"></i> 
                    </a>
				<a href="../Process/processAbon.php?delete=<?php echo $abonnement['id_ab'] ?>">
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
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
        let myTable = new Pager('myTable', 5);
        
        myTable.init();
        myTable.showPageNav('myTable', 'paging-first-datatable');
        myTable.showPage(1);
        
    </script>
</body>