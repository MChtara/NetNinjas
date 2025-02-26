<header class="header">
          <div class="header--nav-toggle">
            <span></span>
            <a class="header--logo" href="#0">
            <img src="../assets/img/logo.png" alt="Global" width="150" height="150">
          </a>
          </div>

          <?php
        // include header partial
        require_once '../film/partials/_navbarlist.php';
        ?>
        <?php 
        if (isset($_SESSION['email']))
        {
          ?>
<div class="action">
      <div class="profile" onclick="menuToggle();">
        <img src="../assets/images/placeholder.jpg" />
      </div>
      <div class="menu">
        <h3><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?><br /><span><?php echo $_SESSION['rolelabel'];?></span></h3>
        <ul>
          <li>
            <a href="#">Edit profile</a>
          </li>
          <?php if($_SESSION["role"]==2){
            ?>
          <li>
            <a href="http://localhost/netninjaclass/admin">Backoffice</a>
          </li>
          <?php } ?>
          <li>
            <a href="http://localhost/netninjaclass/Process/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <script>
      function menuToggle() {
        const toggleMenu = document.querySelector(".menu");
        toggleMenu.classList.toggle("active");
      }
    </script>
            <?php } else { ?>
  <a href="http://localhost/netninjaclass/View/login.php" class="navbar-signin "style="color: #fff;">
              <span>Sign in</span>
              <ion-icon name="log-in-outline"></ion-icon>
            </a>
              <?php } ?>
        </header>