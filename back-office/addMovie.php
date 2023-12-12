<!DOCTYPE html>
<html lang="en">

<?php
include 'navbar.php';
?>

<div class="container mt-3">
    <div class="input-group">
        <input id="searchInput" type="text" class="form-control" placeholder="Search...">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" onclick="search()">Search</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <h2>Add Movie</h2>

    <div id="movieGallery" class="row">
    </div>


    <div class="modal fade" id="movieModal" tabindex="-1" aria-labelledby="movieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movieModalLabel">Movie Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>Name:</strong> <span id="movieName" class="fw-bold"></span>
                        </div>
                        <div class="mb-3">
                            <strong>Author:</strong> <span id="movieAuthor"></span>
                        </div>
                        <div class="mb-3">
                            <strong>Year:</strong> <span id="movieYear"></span>
                        </div>
                        <div class="mb-3">
                            <strong>Link YouTube:</strong> <span id="movieLinkYT"></span>
                        </div>
                        <div class="mb-3">
                            <strong>Resume:</strong> <span id="movieResume"></span>
                        </div>
                        <div>
                            <button class="btn btn-success" type="submit" onclick="AddDb()">Add movie</button>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <img id="modalImage" class="img-fluid rounded p-3" style="max-height: 80vh; max-width: 100%;" alt="Movie Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




</div>

<footer class="fixed-bottom text-center py-2" style="background-color: #007bff; color: #fff;">
    <p>&copy; 2023 Salty. All rights reserved.</p>
</footer>

<script>
    let data;

    function search() {
        var searchValue = document.getElementById('searchInput').value;
        console.log('Search value:', searchValue);

        axios.get('http://localhost/movies/getBO.php', {
            params: {
                q: searchValue
            }
        })
            .then(function (response) {
                console.log(response.data.data);
                data = response.data.data;
                displayMovies(data);
            })
            .catch(function (error) {
                console.log(error.response.status);
                console.log(error.response.data);
            });
    }

    function displayMovies(moviesData) {
        const movieGallery = document.getElementById('movieGallery');

        movieGallery.innerHTML = '';

        moviesData.forEach(function (movie) {
            const movieCard = document.createElement('div');
            movieCard.classList.add('col-md-3', 'm-2');

            const imageElement = document.createElement('img');
            imageElement.src = movie.image;
            imageElement.alt = movie.name;
            imageElement.classList.add('img-thumbnail', 'cursor-pointer');
            imageElement.addEventListener('click', function () {
                displayMovieModal(movie);
            });

            movieCard.appendChild(imageElement);
            movieGallery.appendChild(movieCard);
        });
    }

    function displayMovieModal(selectedMovie) {
    const modalBody = document.getElementById('modalBody');
    const movieName = document.getElementById('movieName');
    const movieAuthor = document.getElementById('movieAuthor');
    const movieYear = document.getElementById('movieYear');
    const movieLinkYT = document.getElementById('movieLinkYT');
    const movieResume = document.getElementById('movieResume');
    const modalImage = document.getElementById('modalImage');

    // Set Movie Info
    movieName.innerText = selectedMovie.name;
    movieAuthor.innerText = selectedMovie.author;
    movieYear.innerText = selectedMovie.year;
    movieLinkYT.innerHTML = `<a href="${selectedMovie.link_yt}" target="_blank">${selectedMovie.link_yt}</a>`;
    movieResume.innerText = selectedMovie.resume;

    // Set Movie Image
    modalImage.src = selectedMovie.image;
    modalImage.alt = selectedMovie.name;

    // Show Modal
    const movieModal = new bootstrap.Modal(document.getElementById('movieModal'));
    movieModal.show();
}
function closeMovieModal() {
    const movieModal = new bootstrap.Modal(document.getElementById('movieModal'));
    movieModal.hide();
}

</script>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>


</html>