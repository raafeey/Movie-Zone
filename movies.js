// Search Functionality
function searchMovie() {
    const query = document.getElementById('search-input').value.toLowerCase();
    const movies = document.querySelectorAll('.movie-card');
    movies.forEach(movie => {
        const title = movie.querySelector('.movie-title').textContent.toLowerCase();
        if (title.includes(query)) {
            movie.style.display = 'block';
        } else {
            movie.style.display = 'none';
        }
    });
}