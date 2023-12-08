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
    <table class="table table-bordered table-hover">
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
        <tbody>
            <script>
                window.onload = function() {
                    submitForm();
                };
            </script>
            <?php
            // Replace this with your actual data retrieval logic
            $data = [
                ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
                // Add more rows as needed
            ];

            foreach ($data as $row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td class="action-buttons">';
                echo '<button class="btn btn-primary btn-sm" onclick="editRow(' . $row['id'] . ')"><i class="fas fa-edit"></i> Edit</button>';
                echo '<button class="btn btn-danger btn-sm" onclick="deleteRow(' . $row['id'] . ')"><i class="fas fa-trash-alt"></i> Delete</button>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Add New Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add New Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form for adding new entries here -->
                <p>This is just a placeholder. Add your form here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<footer class="fixed-bottom text-center py-3" style="background-color: #007bff; color: #fff;">
    <p>&copy; 2023 Your Company. All rights reserved.</p>
</footer>

<script>
    function editRow(id) {
        // Add your edit logic here
        console.log('Editing row with ID ' + id);
    }

    function deleteRow(id) {
        // Add your delete logic here
        console.log('Deleting row with ID ' + id);
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>