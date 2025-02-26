<!DOCTYPE html>
<html lang="en">
<?php 
  $title="Home";
  ?>
<?php
        // include header partial
        require_once '../partials/_includehead.php';
        ?>

<body>

    <!-- notification for small viewports and landscape oriented smartphones -->
    <div class="device-notification">
        <a class="device-notification--logo" href="#0">
            <img src="../assets/img/logo.png" alt="Global" width="150" height="150">
        </a>
    </div>

    <div class="perspective effect-rotate-left">
        <div class="container">
            <div class="outer-nav--return"></div>
            <div id="viewport" class="l-viewport">
                <div class="l-wrapper">
                    <?php
        // include header partial
        require_once '../partials/_navbar.php';
        ?>
                    <?php
        // include header partial
        require_once '../partials/_sidebar.php';
        ?>
                    <ul class="l-main-content main-content">
                        <?php
        // include header partial
        require_once '../partials/_page1.php';
        ?>
                        <?php
        // include header partial
        require_once '../partials/_page2.php';
        ?>
                                <?php
        // include header partial
        require_once '../partials/_page3.php';
        ?>
                        <?php
        // include header partial
        require_once '../partials/_page4.php';
        ?>


                    </ul>
                </div>
            </div>
        </div>
        <?php
          require_once '../partials/_outernav.php';
          ?>
    </div>
    <?php
          require_once '../partials/_includeend.html';
          ?>

</body>
<script>

        $(".slider--prev").click(function() {
            var left = document.querySelectorAll(".slider--item-left");
            var right = document.querySelectorAll(".slider--item-right");
            var center = document.querySelectorAll(".slider--item-center");

            left.forEach(lf => {
                lf.classList.remove("slider--item-left");
                lf.classList.add("slider--item-center");
            });
            right.forEach(rg => {
                rg.classList.remove("slider--item-right");
                rg.classList.add("slider--item-left");
            });
            center.forEach(cn => {
                cn.classList.remove("slider--item-center");
                cn.classList.add("slider--item-right");
            });
            $(".slider").animate({
                opacity: 1
            }, 400);
        })
        $(".slider--next").click(function() {
            console.log("I'm here");
            var left = document.querySelectorAll(".slider--item-left");
            var right = document.querySelectorAll(".slider--item-right");
            var center = document.querySelectorAll(".slider--item-center");

            left.forEach(lf => {
                lf.classList.remove("slider--item-left");
                lf.classList.add("slider--item-right");
            });
            right.forEach(rg => {
                rg.classList.remove("slider--item-right");
                rg.classList.add("slider--item-center");
            });
            center.forEach(cn => {
                cn.classList.remove("slider--item-center");
                cn.classList.add("slider--item-left");
            });
            $(".slider").animate({
                opacity: 1
            }, 400);
        })
    
</script>
</html>