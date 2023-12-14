<!DOCTYPE html>
<html lang="en">

<?php
include 'navbar.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <h2>Add Movie</h2>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <input id="searchInput" type="text" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="search()">Search</button>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addManuallyModal">Add Manually</button>
        </div>
            <div class="modal fade" id="addManuallyModal" tabindex="-1" aria-labelledby="addManuallyModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addManuallyModalLabel">Add Movie Manually</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="movieSubmitForm" onsubmit="submitForm(event)">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name of the movie:</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="author" class="form-label">Author:</label>
                                    <input type="text" class="form-control" id="author" required>
                                </div>

                                <div class="mb-3">
                                    <label for="resume" class="form-label">Resume:</label>
                                    <textarea class="form-control" id="resume" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="year" class="form-label">Year:</label>
                                    <input type="text" class="form-control" id="year" name="year" required>
                                </div>

                                <div class="mb-3">
                                    <label for="link_yt" class="form-label">Youtube link:</label>
                                    <input type="text" class="form-control" id="link_yt" required>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image Link:</label>
                                    <input type="text" class="form-control" id="image" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Genre:</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_28" value="28"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_28">Action</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_12" value="12"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_12">Adventure</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_16" value="16"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_16">Animation</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_35" value="35"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_35">Comedy</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_80" value="80"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_80">Crime</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_99" value="99"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_99">Documentary</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_18" value="18"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_18">Drama</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_10751"
                                                    value="10751" name="genre[]">
                                                <label class="form-check-label" for="genre_10751">Family</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_14" value="14"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_14">Fantasy</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_36" value="36"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_36">History</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_27" value="27"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_27">Horror</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_10402"
                                                    value="10402" name="genre[]">
                                                <label class="form-check-label" for="genre_10402">Music</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_9648"
                                                    value="9648" name="genre[]">
                                                <label class="form-check-label" for="genre_9648">Mystery</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_10749"
                                                    value="10749" name="genre[]">
                                                <label class="form-check-label" for="genre_10749">Romance</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_878"
                                                    value="878" name="genre[]">
                                                <label class="form-check-label" for="genre_878">Science Fiction</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_10770"
                                                    value="10770" name="genre[]">
                                                <label class="form-check-label" for="genre_10770">TV Movie</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_53" value="53"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_53">Thriller</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_10752"
                                                    value="10752" name="genre[]">
                                                <label class="form-check-label" for="genre_10752">War</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="genre_37" value="37"
                                                    name="genre[]">
                                                <label class="form-check-label" for="genre_37">Western</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Add Movie</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

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
                                <div class="mb-3">
                                    <strong>Genre:</strong> <span id="movieGenre"></span>
                                </div>
                                <div>
                                    <button class="btn btn-success" type="submit" onclick="addDb()">Add movie</button>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <img id="modalImage" class="img-fluid rounded p-3"
                                    style="max-height: 80vh; max-width: 100%;" alt="Movie Image">
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
        function submitForm(event) {
            event.preventDefault();

            var name = document.getElementById("name").value;
            var author = document.getElementById("author").value;
            var resume = document.getElementById("resume").value
            var year = document.getElementById("year").value;
            var link_yt = document.getElementById("link_yt").value;
            var image = document.getElementById("image").value;

            // Get selected genres as an array
            var genreCheckboxes = document.querySelectorAll('input[name="genre[]"]:checked');
            var genre = Array.from(genreCheckboxes).map(checkbox => checkbox.value);

            axios.post('http://localhost/movies/add.php', {
                name: name,
                author: author,
                resume: resume,
                year: year,
                link_yt: link_yt,
                image: image,
                genre: genre
            })
                .then(function (response) {
                    console.log(response.data);
                    alert("Register successful!");
                })
                .catch(function (error) {
                    console.error("Register failed:", error);
                });
        }


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
                movieCard.classList.add('col-md-3', 'd-flex', 'align-items-center', 'justify-content-center');

                const imageElement = document.createElement('img');
                imageElement.src = movie.image;
                imageElement.alt = movie.name;
                imageElement.classList.add('cursor-pointer', 'img-fluid', 'rounded', 'mx-auto', 'd-block', 'p-3');
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
            const movieGenre = document.getElementById('movieGenre');

            movieName.innerText = selectedMovie.name;
            movieAuthor.innerText = selectedMovie.author;
            movieYear.innerText = selectedMovie.year;
            movieLinkYT.innerHTML = `<a href="${selectedMovie.link_yt}" target="_blank">${selectedMovie.link_yt}</a>`;
            movieResume.innerText = selectedMovie.resume;
            if (selectedMovie.genre && selectedMovie.genre.length > 0) {
                movieGenre.innerText = selectedMovie.genre.join(', ')
            }
            else {
                movieGenre.innerText = [];
            }

            modalImage.src = selectedMovie.image;
            modalImage.alt = selectedMovie.name;

            const movieModal = new bootstrap.Modal(document.getElementById('movieModal'));
            movieModal.show();
        }

        function closeMovieModal() {
            const movieModal = new bootstrap.Modal(document.getElementById('movieModal'));
            movieModal.hide();
        }
        let arrayGenre;
        function addDb() {
            let uniqueGenre = document.getElementById('movieGenre').innerText
            if (uniqueGenre) {
                arrayGenre = uniqueGenre.split(',').map(genre => genre.trim());
            } else {
                arrayGenre = [];
            }
            axios.post('http://localhost/movies/add.php', {

                name: document.querySelector('#movieName').innerText,
                author: document.querySelector('#movieAuthor').innerText,
                year: document.querySelector('#movieYear').innerText,
                link_yt: document.querySelector('#movieLinkYT').innerText,
                resume: document.querySelector('#movieResume').innerText,
                image: document.querySelector("#modalImage").src,
                genre: arrayGenre


            })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error.response.status);
                    console.log(error.response.data);
                });
        }

    </script>

    </body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

</html>