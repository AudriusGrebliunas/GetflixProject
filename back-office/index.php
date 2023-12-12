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

    let data;
    document.addEventListener("DOMContentLoaded", function () {

        axios.get('http://localhost/movies/getAllMovies.php', {
        })
            .then(function (response) {
                console.log(response.data.data);
                data = response.data.data;

                var tbody = document.getElementById('dataTableBody');
                data.forEach(function (row) {
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
                        '<td class="action-buttons" style="width: 200px"><button class="btn btn-primary btn-sm" onclick="editRow(' + row['id'] + ')"><i class="fas fa-edit"></i> Edit</button>' +
                        '<button class="btn btn-danger btn-sm" onclick="deleteRow(' + row['id'] + ')"><i class="fas fa-trash-alt"></i> Delete</button></td>';
                    tbody.appendChild(tr);
                });
            })
            .catch(function (error) {
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
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>