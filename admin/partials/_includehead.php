<head>
    <!-- Required meta tags -->
    <?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
    <?php
  // include header partial
  require_once '../Process/checkback.php';
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Filmopia - <?php echo $title;?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="http://localhost/netninjaclass/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="http://localhost/netninjaclass/assets/images/favicon.png" />
  </head>