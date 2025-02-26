<?php
	include '../Controller/abonnementC.php';
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

	$abonnementC=new abonnementC();
    $listeCategorie=$abonnementC->AfficherCategorie(); 
    ?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title="Liste Abonnement";
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
	  <center><a href="ajoutTypeAbon.php"><button type="button" class="btn btn-inverse-primary btn-fw" spellcheck="false">Add Categorie</button></a>
	  <a href="afficherAbon.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">List Abonnement</button></a></center>
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
				<th>Label</th>	
				
			</tr>
			</thead>
			<?php
		
				foreach($listeCategorie as $category){
			?>
			<tr>
				<td><?php echo $category['id_typeabon']; ?></td>
				<td><?php echo $category['label_typeabon']; ?></td>

				<td>
				<a href="ajoutTypeAbon.php?id_typeabon=<?php echo $category['id_typeabon'] ?>" spellcheck="false">
                      <i class="mdi mdi-tooltip-edit"></i> 
                    </a>
				<a href="../Process/processTypeAbon.php?delete=<?php echo $category['id_typeabon'] ?>">
                      <i class="mdi mdi-trash-can"></i> 
                    </a></td>
			</tr>
			<?php
				}
			?>
		</table>
    <div id="paging-first-datatable" class="pager-nav text-center"></div>
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