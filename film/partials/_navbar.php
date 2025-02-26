<header>
        <div class="navbar">
          <button class="navbar-menu-btn">
            <span></span><span></span><span></span>
          </button>

          <a href="" class="navbar-brand">
            <img src="http://localhost/netninjaclass/film/assests//images/filmopia.png" alt="" />
          </a>
        <div class="center">
          <?php
        // include header partial
        require_once '_navbarlist.php';
        ?>
        </div>
          <div class="navbar-actions">

            <?php 
        if (isset($_SESSION['email']))
        {
          ?>
<div class="action" style="position:absolute;z-index:1000;display: flex;align-items: center;font-size: var(--fs-sm);">
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
          </div>
        </div>
      </header>