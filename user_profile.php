<?php
include("connection/connect.php");
error_reporting(0);
session_start();

// Redirect to login if user is not logged in
if (empty($_SESSION["user_id"])) {
    header("location: login.php");
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION["user_id"];
$query = mysqli_query($db, "SELECT * FROM users WHERE u_id = '$user_id'");
$user = mysqli_fetch_assoc($query);

if (!$user) {
    echo "User not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php include "include/header.php"; ?>

    <section class="user-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">User Profile</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="images/user0-icn.png" alt="User" class="img-fluid rounded-circle" width="150">
                            </div>
                            <table class="table table-bordered mt-4">
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo $user['username']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $user['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?php echo $user['phone']; ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?php echo $user['address']; ?></td>
                                </tr>
                            </table>
                            <div class="text-center">
                                <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "include/footer.php"; ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>