<?php
include '../Controller/ticketC.php';
$ticketC = new ticketC();
$list = $ticketC->Listtickets();
?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title="List tickets";
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
	  <center><a href="addticket.php"><button type="button" class="btn btn-inverse-primary btn-fw" spellcheck="false">Add ticket</button></a>
	  </center>
	  </br>
    <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
            <div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
            <th>id_ticket</th>
            <th>type</th>
            <th>prix</th>
           <!-- <th>Update</th>
            <th>Delete</th> -->
        </tr>
        </thead>
        <?php
        foreach ($list as $ticket) {
        ?>
   			<tr>
				<td><?php echo $ticket['id_ticket']; ?></td>
				<td><?php echo $ticket['type']; ?></td>
        <td><?php echo $ticket['prix']; ?></td>
				<td>
				<a href="updateticket.php?id_ticket=<?php echo $ticket['id_ticket'] ?>" spellcheck="false">
                      <i class="mdi mdi-tooltip-edit"></i> 
                    </a>
				<a href="deleteticket.php?id_ticket=<?php echo $ticket['id_ticket'] ?>">
                      <i class="mdi mdi-trash-can"></i> 
                    </a></td>
			</tr>
        <?php
        }
        ?>
    </table>
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
