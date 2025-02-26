<!DOCTYPE html>
<html lang="en">
<?php 
  $title="Error";
  ?>
<?php
      // include header partial
      require_once '../film/partials/_includehead.php';
      if(empty($_SESSION['errorcode']))
      {
      $_SESSION['errorcode']="404";
      $_SESSION['errormessage']="This is a test error message";
      }
    ?>
  <link rel="stylesheet" href="css/notfound.css">
<body>
    <div class="container">


        <main>
            <!--dust particel-->
<div>
  <div class="starsec"></div>
  <div class="starthird"></div>
  <div class="starfourth"></div>
  <div class="starfifth"></div>
</div>
<!--Dust particle end--->


<div class="lamp__wrap">
  <div class="lamp">
    <div class="cable"></div>
    <div class="cover"></div>
    <div class="in-cover">
      <div class="bulb"></div>
    </div>
    <div class="light"></div>
  </div>
</div>
<!-- END Lamp -->
<section class="error">
  <!-- Content -->
  <div class="error__content">
    <div class="error__message message">
      <h1 class="message__title"><?php echo $_SESSION['errorcode'];
                                        unset($_SESSION['errorcode']);?></h1>
      <p class="message__text"><?php echo $_SESSION['errormessage'];
                                     unset($_SESSION['errormessage']); ?></p>
    </div>
    <div class="error__nav e-nav">
      <a href="http://localhost/netninjaclass" target="_blanck" class="e-nav__link"></a>
    </div>
  </div>
  <!-- END Content -->
        </main>


    </div>

    <?php
  // include header partial
  require_once '../film/partials/_includeend.html';
?>
</body>

</html>