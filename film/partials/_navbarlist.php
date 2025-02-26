<nav>
            <ul class="navbar-nav">
              <li class="linav"><a href="http://localhost/netninjaclass/" class="navbar-link">Accueil</a></li>
              <li class="linav"><a href="http://localhost/netninjaclass/View/film_front.php" class="navbar-link">Films</a></li>
              <?php 
              require_once '../Controller/abonnementC.php';
              if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION['email']))
            {
            $abonnementC = new abonnementC();
            $abon = $abonnementC->CheckAbonnementUser($_SESSION["id_user"]);
            }else{
              $abon = true;
            }
              if ($abon) 
              {
                ?>
              <li class="linav"><a href="http://localhost/netninjaclass/View/subscribe.php" class="navbar-link">S'abonner</a></li>
              <?php
              }
              ?>
              <li class="linav"><a href="http://localhost/netninjaclass/View/projection.php" class="navbar-link">Réserver</a></li>
            </ul>
          </nav>