<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ./index.php");
}

include 'config.php';

if (isset($_POST["submit"])) {
    $full_name = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));

    if ($password === $cpassword) {
        // $photo_name = mysqli_real_escape_string($conn, $_FILES["photo"]["name"]);
        // $photo_tmp_name = $_FILES["photo"]["tmp_name"];
        // $photo_size = $_FILES["photo"]["size"];
        // $photo_new_name = rand() . $photo_name;

        // if ($photo_size > 5242880) {
        //     echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";    , photo='$photo_new_name'
        // } else {
            $sql = "UPDATE users SET full_name='$full_name', password='$password' WHERE id='{$_SESSION["user_id"]}'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Profile Updated successfully.');</script>";
       //         move_uploaded_file($photo_tmp_name, "uploads/" . $photo_new_name);
            } else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $conn->error;
            }
        //}
    } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Profile</title>
</head>

<body class="profile-page">
    <div class="wrapper ">
        <!-- <p>Wanna logout? -->
            <a class="text-primary" href="./memegenerator/imagegallery.php">Go Back</a>
        <!-- </p> -->
        
        <h2 class="title2 text-center ">Profile</h2>
        <form action="" method="post" enctype="multipart/form-data">

            <?php
            $sql = "SELECT * FROM users WHERE id='{$_SESSION["user_id"]}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="inputBox ">
                        <input type="text" class="input-group-text" id="full_name" name="full_name" placeholder="Full Name" value="<?php echo $row['full_name']; ?>" required>
                    </div>
                    <div class="inputBox">
                        <input type="email" class="input-group-text" id="email" name="email" placeholder="Email Address" value="<?php echo $row['email']; ?>" disabled required>
                    </div>
                    <div class="inputBox">
                        <input type="password" class="input-group-text" id="password" name="password" placeholder="Password"  required>
                    </div>
                    <div class="inputBox">
                        <input type="password" class="input-group-text" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                    </div>
                    <!-- <div class="inputBox">
                        <label for="photo">Photo</label>
                        <input type="file" accept="image/*" id="photo" name="photo" required>
                    </div>
                    <img src="uploads/" width="150px" height="auto" alt=""> -->  
            <?php
                }
            }

            ?>
            <div>
                <button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
    </div>
</body>

</html>