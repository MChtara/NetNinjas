<?php
require_once '../Controller/mediaC.php';
require_once '../Controller/filmC.php';
require_once '../Controller/categorieC.php';
$error = "";


$filmC = new filmC();
$mediaC = new mediaC();
$list = $filmC->listFilms();
if (isset($_POST["id_film"]) && !isset($_FILES["vid"]))
{
  if (isset($_POST["id_film"]) && isset($_POST["vid"]))
  {
    $mediaC->searchfilm($_POST["id_film"]);
    $mediaC->addlink($_POST["id_film"]);
    $_SESSION['message'] ="Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header('Location:list_film.php');
  }
}
if (isset($_POST["id_film"]) && isset($_FILES["vid"]))
{
  $mediaC->addvideo($_POST["id_film"]);
  $_SESSION['message'] ="Record has been saved!";
  $_SESSION['msg_type'] = "success";
  header('Location:list_film.php');
}
else
{

  $error = "Missing information";
  $_SESSION['msg_type'] = "warning";
}

?>
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
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div id="error">
              <?php echo $error; ?>
                </div>
                  <?php if(isset($_SESSION['message'])):
        ?>
		<label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?></label>
      <?php endif ?>

                      <h4 class="card-title">Add a video</h4>
                      <center><a href="list_film.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Liste films</button></a></center>
                    <form action="" method="post" class="forms-sample" enctype="multipart/form-data">
                     <?php if(!isset($_GET['id_film'])){ ?>

                      <div class="form-group">
                        <label for="id_film">ID Film</label>
                        <select name="id_film" class="form-control" id="id_film">
                        <option value="">Sélectionnez un film</option>
                        <?php

                        foreach ($list as $film) {
                          echo "<option value=\"".$film['id_film']."\">".$film['titre']."</option>";                  
                          }
                        ?>
                        </select>
                      </div>
                      <?php } else { ?>
                        <div class="form-group">
                        <label for="id_film">ID Film</label>
                        <input type="text" name="id_film" class="form-control" id="id_film" value="<?php echo $_GET['id_film'];?>" readonly>
                      </div>
                      <?php } ?>
                      <div class="form-group">
                        <label>Video</label>
                                                
                        <div id="inputtype">
                        <input type="file" name="vid" class="file-upload-default">
    <div class="input-group col-xs-12">
      <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Video">
      <span class="input-group-append">
        <button class="file-upload-browse btn btn-primary" type="button" spellcheck="false">Upload</button>
      </span>
    </div>
                      </div>

                      </div>
                      <div class="form-group">
                      <a href="#0" onclick="changevideo()" spellcheck="false">
                      <i class="mdi mdi-video-plus"></i>
                      </a>
                      <a href="#0" onclick="changelink()" spellcheck="false">
                      <i class="mdi mdi-link"></i>
                      </a>
                      </div>
                      <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>

                      <button class="btn btn-dark">Cancel</button>
                    </form>
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
  function changevideo()
  {
    document.getElementById("inputtype").innerHTML = `
    <input type="file" name="vid" class="file-upload-default">
    <div class="input-group col-xs-12">
      <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Video">
      <span class="input-group-append">
        <button class="file-upload-browse btn btn-primary" type="button" spellcheck="false">Upload</button>
      </span>
    </div>
`;
  }
  function changelink()
  {
    document.getElementById("inputtype").innerHTML = `<input type="text" name="vid" class="form-control" id="vid">`;
  }
 </script>
 <script src="../Controller/validation.js"></script>    
     <!-- Custom js for this page -->
     <script src="../assets/js/file-upload.js"></script>
    <script src="../assets/js/typeahead.js"></script>
    <script src="../assets/js/select2.js"></script>
    <!-- End custom js for this page -->
    </body>

</html>