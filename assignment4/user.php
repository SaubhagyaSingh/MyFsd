<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `student` (`name`, `email`, `mobile`, `password`) VALUES ('$name', '$email', '$mobile', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $id = mysqli_insert_id($conn); // Get the last inserted id
        echo "Data inserted successfully. ID: " . $id;
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
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>