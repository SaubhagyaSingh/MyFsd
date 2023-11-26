<?php
include 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wIDth=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Crud Operation</title>
</head>

<body>

    <div class="container">
        <button class="btn btn-primary my-5" class=""> <a href="user.php" class="text-light"> Add User</a>
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `student`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $ID = $row['ID'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        $password = $row['password'];
                        echo '<tr>
                            <th scope="row">' . $ID . '</th>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $mobile . '</td>
                            <td>' . $password . '</td>
                            <td>  <button class="btn btn-primary"> <a href="update.php?ID=' . $ID . '" class="text-light"> Update</a></button>
                            <button class="btn btn-danger"> <a href="delete.php?ID=' . $ID . '" class="text-light"> Delete</a></button>
                            </td> 
                            </tr>';
                    }

                }


                ?>
            </tbody>
        </table>
    </div>
</body>

</html>