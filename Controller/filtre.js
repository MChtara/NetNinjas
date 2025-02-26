function filterResults() {
  // Récupère les valeurs sélectionnées pour chaque liste déroulante a patir des classe
  var selectedGenre = document.querySelector('select[name="genre_f"]').value;
  var selectedYear = document.querySelector('select[name="year_f"]').value;
  
  console.log(selectedGenre);
  console.log(selectedYear);

  // Parcours tous les éléments à filtrer
  var movies = document.querySelectorAll('.movie-card');
  console.log(movies);

  for (var i = 0; i < movies.length; i++) {
    var movie = movies[i];
    var genre = movie.getAttribute('data-genre');
    var year = movie.getAttribute('data-year');
    
    // Cache ou affiche l'élément en fonction des valeurs sélectionnées
    if ((selectedGenre === 'all genres' || selectedGenre === genre) && (selectedYear === 'all years' || selectedYear === year)) {
      movie.style.display = 'block';
    } else {
      movie.style.display = 'none';
    }
  }
}
