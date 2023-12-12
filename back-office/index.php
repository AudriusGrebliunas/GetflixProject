<!DOCTYPE html>
<html lang="en">

<?php
include 'navbar.php';
?>

<div class="container mt-3">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search...">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Search</button>
        </div>
    </div>
</div>

<button id="myBtn" style="display: none;">Open Modal</button>
<div id="myModal" class="modal" style="  display: none;
  /* Hidden by default */
  position: fixed;
  /* Stay in place */
  z-index: 999;
  /* Sit on top */
  padding-top: 100px;
  /* Location of the box */
  left: 0;
  top: 0;
  width: 100%;
  /* Full width */
  height: 100%;
  /* Full height */
  overflow: auto;
  /* Enable scroll if needed */
  background-color: rgb(0, 0, 0);
  /* Fallback color */
  background-color: rgba(0, 0, 0, 0.4);
  /* Black w/ opacity */">

    <div class="modal-content" style="font-family: Arial, sans-serif; max-width: 400px; margin: 0 auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <span class="close" style="float: right; font-size: 28px; font-weight: bold;">&times;</span>
        <form onsubmit="submitForm(event)" style="display: grid; gap: 10px;">
            <input type="text" required id="id" disabled style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <input type="text" required id="name" placeholder="First Name" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <input type="text" required id="author" placeholder="Last Name" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <input type="text" required id="resume" placeholder="Address" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <input type="text" required id="year" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <input type="text" required id="link_yt" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <input type="text" required id="image" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <button type="submit" style="padding: 10px; border-radius: 5px; border: none; background-color: #3498db; color: white; cursor: pointer;">Submit
                data</button>
        </form>
    </div>


</div>

<div class="container-fluid">
    <h2>Back Office Table</h2>
    <table id="dataTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Author</th>
                <th>Resume</th>
                <th>Year</th>
                <th>Lien Youtube</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="dataTableBody">
        </tbody>
    </table>
</div>







<footer class="fixed-bottom text-center py-2" style="background-color: #007bff; color: #fff;">
    <p>&copy; 2023 Salty. All rights reserved.</p>
</footer>

<script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    let data;
    document.addEventListener("DOMContentLoaded", function() {

        axios.get('http://localhost/movies/getAllMovies.php', {})
            .then(function(response) {
                console.log(response.data.data);
                data = response.data.data;

                var tbody = document.getElementById('dataTableBody');
                data.forEach(function(row) {
                    console.log("test")
                    var tr = document.createElement('tr');
                    tr.id = 'row-' + row['id'];
                    tr.innerHTML = '<td>' + row['id'] + '</td>' +
                        '<td>' + row['name'] + '</td>' +
                        '<td>' + row['author'] + '</td>' +
                        '<td>' + row['resume'] + '</td>' +
                        '<td>' + row['year'] + '</td>' +
                        '<td><a href="' + row['link_yt'] + '" target="_blank">' + row['link_yt'] + '</a></td>' +
                        '<td><a href="' + row['image'] + '" target="_blank">' + row['image'] + '</a></td>' +
                        '<td class="action-buttons" style="width: 200px"><button class="btn btn-primary btn-sm" onclick="populateModal(\'' + row['id'] + '\')"><i class="fas fa-edit"></i> Edit</button>' +
                        '<button class="btn btn-danger btn-sm" onclick="deleteMovie(\'' + row['id'] + '\')"><i class="fas fa-trash-alt"></i> Delete</button></td>';
                    tbody.appendChild(tr);
                });
            })
            .catch(function(error) {
                console.log(error.response.status);
                console.log(error.response.data);
            });

    });

    function editRow(id) {
        console.log('Editing row with ID ' + id);
    }

    function deleteRow(id) {
        console.log('Deleting row with ID ' + id);
        axios.delete('http://localhost/movies/movie.php', {
                params: {
                    id: id
                }
            })
            .then(response => {
                console.log(`Deleted post with ID ${id}`);
                console.log(response.data);
                document.getElementById('row-' + id).remove();

            })
            .catch(error => {
                console.error(error);
            });
    }

    function search() {
        console.log('Searching...');
    }
    let movieObject;

    function populateModal(id) {
        modal.style.display = "block";
        //     let email = "audrius.grebliunas@gmail.com"
        console.log(id);
        movieObject = data.find(item => item.id === id);
        document.getElementById("id").value = movieObject["id"]
        document.getElementById("name").value = movieObject["name"]
        document.getElementById("author").value = movieObject["author"]
        document.getElementById("image").value = movieObject["image"]
        document.getElementById("resume").value = movieObject["resume"]
        document.getElementById("year").value = movieObject["year"]
        document.getElementById("link_yt").value = movieObject["link_yt"]
        document.getElementById("year").value = movieObject["year"]
    }

    function submitForm(event) {
            event.preventDefault();
            var id = document.getElementById("id").value;
            var name = document.getElementById("name").value;
            var author = document.getElementById("author").value;
            var resume = document.getElementById("resume").value
            var year = document.getElementById("year").value;
            var link_yt = document.getElementById("link_yt").value;
            var image = document.getElementById("image").value;

            axios.put('http://localhost/movies/movie.php', {
                id: id,
                name: name,
                author: author,
                resume : resume,
                year : year,
                link_yt: link_yt,
                image: image,
            })
                .then(function (response) {
                    console.log(response.data);
                    alert("Update successful!");
                })
                .catch(function (error) {
                    console.error("Register failed:", error);
                }
                );
        }

</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>