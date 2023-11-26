<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $sql = "UPDATE `student` SET `name`='$name', `email`='$email', `mobile`='$mobile', `password`='$password' WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data updated successfully.";
    } else {
        die(mysqli_error($conn));
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group py-3">
                <label>ID</label>
                <input type="text" class="form-control" placeholder="Enter ID" name="id">
            </div>
            <div class="form-group py-3">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name">
            </div>
            <div class="form-group py-3">
                <label>Email</label>
                <input type="Email" class="form-control" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group py-3">
                <label>Mobile</label>
                <input type="int" class="form-control" placeholder="Enter Contact" name="mobile">
            </div>
            <div class="form-group py-3">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>