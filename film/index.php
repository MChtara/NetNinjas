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
            <section class="banner">
                <div class="banner-card">
                    <img src="http://localhost/netninjaclass/film/assests//images/John-Wick-3.jpg" class="banner-img" alt="" />
                    <div class="card-content">
                        <div class="card-info">
                            <div class="genre">
                                <ion-icon name="film"></ion-icon>
                                <span>Action/Thriller</span>
                            </div>
                            <div class="year">
                                <ion-icon name="calendar"></ion-icon>
                                <span>2019</span>
                            </div>
                            <div class="duration">
                                <ion-icon name="time"></ion-icon>
                                <span>2h 11m</span>
                            </div>
                            <div class="quality">4K</div>
                        </div>
                        <h2 class="card-title">John Wick: Chapter 3 - Parabellum</h2>
                    </div>
                </div>
            </section>



            <section class="movies">
                <div class="filter-bar">
                    <div class="filter-dropdowns">
                        <select name="genre" class="genre">
                            <option value="all genres">All genres</option>
                            <option value="action">Action</option>
                            <option value="adventure">Adventure</option>
                            <option value="annimation">Annimation</option>
                            <option value="biography">Biography</option>
                        </select>

                        <select name="year" class="year">
                            <option value="all years">All the years</option>
                            <option value="2023">2023</option>
                            <option value="2021-2022">2021-2022</option>
                            <option value="2019-2020">2019-2020</option>
                            <option value="2017-2018">2017-2018</option>
                        </select>
                    </div>

                    <div class="filter-radios">
                        <input type="radio" name="grade" id="featured" checked />
                        <label for="featured">Featured</label>

                        <input type="radio" name="grade" id="popular" />
                        <label for="popular">Popular</label>

                        <input type="radio" name="grade" id="newest" />
                        <label for="newest">Newest</label>

                        <div class="checked-radio-bg"></div>
                    </div>
                </div>

                <div class="movies-grid">
                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/red-notice.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>6.4</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Red Notice</h3>
                            <div class="card-info">
                                <span class="genre">Action/Comedy</span>
                                <span class="year">2021</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/spider-men.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>7.4</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Spider-Man</h3>
                            <div class="card-info">
                                <span class="genre">Action/Adventure</span>
                                <span class="year">2017</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/matrix.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>N/A</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">The Matrix Resurrections</h3>
                            <div class="card-info">
                                <span class="genre">Sci-fi/Action</span>
                                <span class="year">2021</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/eternals.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>6.8</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Eternals</h3>
                            <div class="card-info">
                                <span class="genre">Adventure/Action</span>
                                <span class="year">2021</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/dune.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>8.2</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Dune</h3>
                            <div class="card-info">
                                <span class="genre">Sci-fi/Adventure</span>
                                <span class="year">2021</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/shang-chi.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>7.6</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Shang-Chi and The Legend of The Ten Rings</h3>
                            <div class="card-info">
                                <span class="genre">Action/Fantasy</span>
                                <span class="year">2021</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/casino-royale.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>8.0</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Casino Royale</h3>
                            <div class="card-info">
                                <span class="genre">Action/Adventure</span>
                                <span class="year">2006</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/dark-knight.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>9.0</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">The Dark Knight</h3>
                            <div class="card-info">
                                <span class="genre">Action/Adventure</span>
                                <span class="year">2008</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/panther.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>7.3</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Black Panther</h3>
                            <div class="card-info">
                                <span class="genre">Action/Adventure</span>
                                <span class="year">2018</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/venom.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>6.7</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Venom</h3>
                            <div class="card-info">
                                <span class="genre">Action/Adventure</span>
                                <span class="year">2018</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/LOTR.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>8.9</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Lord Of The Rings</h3>
                            <div class="card-info">
                                <span class="genre">Fantasy/Adventure</span>
                                <span class="year">2003</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/saving-private-ryan.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>8.6</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Saving Private Ryan</h3>
                            <div class="card-info">
                                <span class="genre">War/Action</span>
                                <span class="year">1998</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/interstaller.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>8.6</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Interstellar</h3>
                            <div class="card-info">
                                <span class="genre">Sci-fi/Adventure</span>
                                <span class="year">2014</span>
                            </div>
                        </div>

                    </div>

                    <div class="movie-card">

                        <div class="card-head">

                            <img src="http://localhost/netninjaclass/film/assests//images/movies/gladiator.jpg" alt="" class="card-img">

                            <div class="card-overlay">
                                <div class="bookmark">
                                    <ion-icon name="" bookmark-outline"></ion-icon>
                                </div>


                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>8.5</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h3 class="card-title">Gladiator</h3>
                            <div class="card-info">
                                <span class="genre">Action/Adventure</span>
                                <span class="year">2000</span>
                            </div>
                        </div>

                    </div>



                </div>

                <button class="load-more">LOAD MORE</button>



            </section>


            <section class="category" id="categoey">

                <h2 class="section-heading">Category</h2>

                <div class="category-grid">

                    <div class="category-card">

                        <img src="http://localhost/netninjaclass/film/assests//images/action.jpg" alt="" class="card-img">
                        <div class="name">Action</div>
                        <div class="total">100</div>

                    </div>

                    <div class="category-card">

                        <img src="http://localhost/netninjaclass/film/assests//images/comedy.jpg" alt="" class="card-img">
                        <div class="name">Comedy</div>
                        <div class="total">50</div>

                    </div>

                    <div class="category-card">

                        <img src="http://localhost/netninjaclass/film/assests//images/thriller.webp" alt="" class="card-img">
                        <div class="name">Thriller</div>
                        <div class="total">20</div>

                    </div>

                    <div class="category-card">

                        <img src="http://localhost/netninjaclass/film/assests//images/horror.jpg" alt="" class="card-img">
                        <div class="name">horror</div>
                        <div class="total">80</div>

                    </div>

                    <div class="category-card">

                        <img src="http://localhost/netninjaclass/film/assests//images/adventure.jpg" alt="" class="card-img">
                        <div class="name">Adventure</div>
                        <div class="total">100</div>

                    </div>

                    <div class="category-card">

                        <img src="http://localhost/netninjaclass/film/assests//images/animated.jpg" alt="" class="card-img">
                        <div class="name">Animated</div>
                        <div class="total">50</div>

                    </div>

                    <div class="category-card">

                        <img src="http://localhost/netninjaclass/film/assests//images/crime.jpg" alt="" class="card-img">
                        <div class="name">Action</div>
                        <div class="total">100</div>

                    </div>

                    <div class="category-card">

                        <img src="http://localhost/netninjaclass/film/assests//images/sci-fi.jpg" alt="" class="card-img">
                        <div class="name">SCI-FI</div>
                        <div class="total">80</div>

                    </div>

                </div>

            </section>

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