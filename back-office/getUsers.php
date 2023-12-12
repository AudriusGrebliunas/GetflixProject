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
                <th>Actions</th>

            </tr>
        </thead>
        <tbody id="dataTableBody">
        </tbody>
    </table>
</div>
<button id="myBtn">Open Modal</button>
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

    <!-- Modal content -->
    <!-- <div class="modal-content">
        <span class="close" style="  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  width: 20px;
  ">&times;</span>
        <form onsubmit="submitForm(event)">
            <input type="email" required id="email" disabled>
            <input type="text" required id="first_name">
            <input type="text" required id="last_name">
            <input type="text" required id="address">
            <input type="date" required id="date-of-birth">
            <button type="submit">Submit data</button>
        </form>
    </div> -->
    <div class="modal-content" style="font-family: Arial, sans-serif; max-width: 400px; margin: 0 auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <span class="close" style="color: #aaaaaa; float: right; font-size: 28px; font-weight: bold;">&times;</span>
        <form onsubmit="submitForm(event)" style="display: grid; gap: 10px;">
            <input type="email" required id="email" disabled style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <input type="text" required id="first_name" placeholder="First Name" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <input type="text" required id="last_name" placeholder="Last Name" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <input type="text" required id="address" placeholder="Address" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <input type="date" required id="date-of-birth" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <button type="submit" style="padding: 10px; border-radius: 5px; border: none; background-color: #3498db; color: white; cursor: pointer;">Submit data</button>
        </form>
    </div>


</div>

<footer class="fixed-bottom text-center py-3" style="background-color: #007bff; color: #fff;">
    <p>&copy; 2023 Your Company. All rights reserved.</p>
</footer>
<script>
    let users;

            axios.get('http://localhost/user/userProfiles.php', {
            })
                .then(function (response) {
                    //console.log(response.status);
                    //console.log(response.message);
                    console.log(response.data.data);
                    users = response.data.data;
                })
                .catch(function (error) {
                    //console.log(response.status);
                    //console.log(response.message);
                    console.log(response.data.data);
                }

            );
    }
    getAllUsers();

    function populateUsers() {
        var tbody = document.getElementById('dataTableBody');
        users.forEach(function(row) {
            var tr = document.createElement('tr');
            tr.innerHTML = '<td>' + row['email'] + '</td>' +
                '<td>' + row['first_name'] + '</td>' +
                '<td>' + row['last_name'] + '</td>' +
                '<td>' + row['address'] + '</td>' +
                '<td>' + row['dob'] + '</td>' +

                '<td class="action-buttons"><button class="btn btn-primary btn-sm" onclick="populateModal(\'' + row['email'] + '\')"><i class="fas fa-edit"></i> Edit</button>' +
                '<button class="btn btn-danger btn-sm" onclick="deleteUser(\'' + row['email'] + '\')"><i class="fas fa-trash-alt"></i> Delete</button></td>';
            tbody.appendChild(tr);
        });
    }

    function deleteUser(email) {
        axios.delete('http://localhost:8080/user/userProfile.php', {
                params: {
                    email: email
                }
            })
            .then(function(response) {
                console.log(response.status);
                console.log(response.message);
                console.log(response.data);
                alert("Return successful!");
                var tbody = document.getElementById('dataTableBody');
                tbody.innerHTML = '';
                location.reload()
            })
            .catch(function(error) {
                console.error("Return failed:", error);
            });
    }

    var modal = document.getElementById("myModal");

    var btn = document.getElementById("myBtn");

    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {


    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    let userObject;

    function populateModal(email) {
        modal.style.display = "block";
        //     let email = "audrius.grebliunas@gmail.com"
        userObject = users.find(item => item.email === email);
        document.getElementById("first_name").value = userObject["first_name"]
        document.getElementById("last_name").value = userObject["last_name"]
        document.getElementById("address").value = userObject["address"]
        document.getElementById("date-of-birth").value = userObject["dob"]
        document.getElementById("email").value = userObject["email"]
    }

    function submitForm(event) {
        event.preventDefault();
        var email = document.getElementById("email").value;
        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var address = document.getElementById("address").value;
        var dob = document.getElementById("date-of-birth").value;

        if (first_name && last_name && address && dob && email) {
            axios.put('http://localhost:8080/user/userProfile.php', {
                    // data:
                    // {
                    email: email,
                    first_name: first_name,
                    last_name: last_name,
                    address: address,
                    dob: dob
                    // }
                })
                .then(function(response) {
                    console.log(response.data);
                    location.reload()

                })
                .catch(function(error) {
                    console.error("Return not succesful:", error);
                });
        }



    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>