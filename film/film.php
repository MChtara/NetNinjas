<!DOCTYPE html>
<html lang="en">
<?php
      // include header partial
      require_once 'partials/_includehead.php';
    ?>

<body>
    <div class="container">
        <?php
      // include header partial
      require_once 'partials/_navbar.php';
    ?>

        <main>
            <div class="main-panel">
                <div class="content-wrapper">
                  <br>
                  <br>
                    <div class="card_film">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <div class="movie-card">

                                    <div class="card-head">
                                        <img src="http://localhost/netninjaclass/film/assests//images/movies/red-notice.jpg" alt="" class="card-img">
                                        <div class="card-overlay">
                                            <div class="rating">
                                                <ion-icon name="star-outline" role="img" class="md hydrated"
                                                    aria-label="star outline"></ion-icon>
                                                <span>6.4</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                            <h2 class="card-title">John Wick: Chapter 3 - Parabellum</h2>
                            <br>
                            <br>
                                <p class="font-18 max-width-600">The film follows John Wick (Keanu Reeves), a legendary hitman who is forced out of retirement to seek revenge against the men who killed his puppy, a final gift from his recently deceased wife. John Wick also stars Michael Nyqvist, Alfie Allen, Adrianne Palicki, Bridget Moynahan, Dean Winters, Ian McShane, John Leguizamo, and Willem Dafoe.
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="card_film">
                    <iframe frameborder="0" scrolling="no" height="720px" width="100%" type="text/html" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=0&fs=1&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=1&start=0&end=0&vq=hd720&origin=https://youtubeembedcode.com"></iframe>                        
                    </div>
                </div>
            </div>
        </main>


        <?php
      // include header partial
      require_once 'partials/_footer.html';
    ?>

    </div>

    <?php
  // include header partial
  require_once 'partials/_includeend.html';
?>
</body>

</html>