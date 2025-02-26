<?php
	include '../controller/Comptetable.php';


	$Comptetable=new Compte_table();
  $listecompte=$Comptetable->Affichercompte(); 
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
          <center><a href="addcompte.php"><button type="button" class="btn btn-inverse-primary btn-fw" spellcheck="false">Ajouter Compte</button></a></center>
</br>
          <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
            <div class="table-responsive">
<table class="table">
		   <thead>
			<tr>
				<th>ID</th>
				<th>firstname</th>
        <th>lastname</th>		
				<th>Date de naissance</th>
				<th>email</th>
				<th>password</th>
        <th>role</th>	
			</tr>
			</thead>
			<?php
		
				foreach($listecompte as $compte){
			?>
			<tr>
				<td><?php echo $compte['id_user']; ?></td>
				<td><?php echo $compte['firstname']; ?></td>
				<td><?php echo $compte['lastname']; ?></td>
				<td><?php echo $compte['date_de_N']; ?></td>
				<td><?php echo $compte['email']; ?></td>
        <td><?php echo $compte['password']; ?></td>
        <td><?php echo $compte['role']; ?></td>
        <td>
        <a href="supprimecompte.php?delete=<?php echo $compte['id_user'] ?>">
                      <i class="mdi mdi-trash-can"></i> 
                    </a></td>
                    <td>
                    <a href="updatecompte.php?id_compte=<?php echo $compte['id_user'] ?>" spellcheck="false">
                      <i class="mdi mdi-tooltip-edit"></i>
			</tr>
     
			<?php
				}
			?>
       <div class="float-right">
      <a href="excel.php" class="btn btn-success"><i class="dwn"></i>Export</a>
    </div>
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