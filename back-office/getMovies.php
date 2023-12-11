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

<div class="container">
    <h2>Back Office Table</h2>
    <table id="dataTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Email</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Date of birth</th>
                <th>Secret question</th>
            </tr>
        </thead>
        <tbody id="dataTableBody">
        </tbody>
    </table>
</div>


<footer class="fixed-bottom text-center py-3" style="background-color: #007bff; color: #fff;">
    <p>&copy; 2023 Your Company. All rights reserved.</p>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var data = [
            { 'id': 1, 'name': 'John Doe', 'email': 'john@example.com', 'address': '123 Main St' },
            { 'id': 2, 'name': 'Jane Doe', 'email': 'jane@example.com', 'address': '456 Oak St' },

        ];

        var tbody = document.getElementById('dataTableBody');
        data.forEach(function (row) {
            var tr = document.createElement('tr');
            tr.innerHTML = '<td>' + row['email'] + '</td>' +
                '<td>' + row['name'] + '</td>' +
                '<td></td>' + 
                '<td>' + row['address'] + '</td>' +
                '<td></td>' + 
                '<td class="action-buttons"><button class="btn btn-primary btn-sm" onclick="editRow(' + row['id'] + ')"><i class="fas fa-edit"></i> Edit</button>' +
                '<button class="btn btn-danger btn-sm" onclick="deleteRow(' + row['id'] + ')"><i class="fas fa-trash-alt"></i> Delete</button></td>';
            tbody.appendChild(tr);
        });
    });

    function editRow(id) {
        console.log('Editing row with ID ' + id);
    }

    function deleteRow(id) {
        console.log('Deleting row with ID ' + id);
    }

    function search() {
        console.log('Searching...');
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
