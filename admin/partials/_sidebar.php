




<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="http://localhost/netninjaclass/admin/index.php"><img src="http://localhost/netninjaclass/assets/img/logo.png" style="height: 100px;width: 50%;" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="http://localhost/netninjaclass/admin/index.php"><img src="http://localhost/netninjaclass/assets/img/logo.png" style="height: 100px;width: 50%;" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="http://localhost/netninjaclass/assets/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION["firstname"]." ".$_SESSION["lastname"]?></h5>
            <span><?php echo $_SESSION["rolelabel"]?></span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="http://localhost/netninjaclass/admin/index.php">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#abon" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Abonnements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="abon">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/View/afficherAbon.php">Abonnement</a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/View/afficherTypeAbon.php">Type Abonnement</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#film" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-movie-roll"></i>
        </span>
        <span class="menu-title">Films</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="film">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/View/listcat.php">Categorie</a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/View/list_film.php">Film</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-account-group"></i>
        </span>
        <span class="menu-title">Compte</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="user">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/View/afficherCompte.php">Compte</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#salle" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-sofa"></i>
        </span>
        <span class="menu-title">Salles</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="salle">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/View/displaysalle.php">Salle</a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/View/affproj.php">Projection</a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/View/displaymap.php">Cinemap</a></li>
        </ul>
      </div>
</li>
<li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#reservation" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-bookmark-check"></i>
        </span>
        <span class="menu-title">Reservation</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="reservation">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/View/Listreservations.php">Reservation</a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/View/Listtickets.php">Ticket</a></li>
        </ul>
      </div>
    </li>
    <?php /*
    
    
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Basic UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/forms/basic_elements.html">
        <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span>
        <span class="menu-title">Form Elements</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/tables/basic-table.html">
        <span class="menu-icon">
          <i class="mdi mdi-table-large"></i>
        </span>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/charts/chartjs.html">
        <span class="menu-icon">
          <i class="mdi mdi-chart-bar"></i>
        </span>
        <span class="menu-title">Charts</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/icons/mdi.html">
        <span class="menu-icon">
          <i class="mdi mdi-contacts"></i>
        </span>
        <span class="menu-title">Icons</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="menu-icon">
          <i class="mdi mdi-security"></i>
        </span>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/samples/blank-page.html"> Blank Page </a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/samples/error-500.html"> 500 </a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="http://localhost/netninjaclass/admin/pages/samples/register.html"> Register </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="documentation">
        <span class="menu-icon">
          <i class="mdi mdi-file-document-box"></i>
        </span>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
    */
    ?>
  </ul>
</nav>