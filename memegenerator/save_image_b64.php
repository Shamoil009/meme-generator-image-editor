
   <!-- // $img = file_get_contents("php://input"); // $_POST didn't work
    // $img = str_replace('data:image/png;base64,', '', $img);
    // $img = str_replace(' ', '+', $img);
    // $data = base64_decode($img);
    
    // if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/img")) {
    //     mkdir($_SERVER['DOCUMENT_ROOT'] . "/img", 0777, true);
    // }
    
    // $file = $_SERVER['DOCUMENT_ROOT'] . "/img/".time().'.png';
    
    // $success = file_put_contents($file, $data);
    // print $success ? $file.' saved.' : 'Unable to save the file.';  -->



<?php

session_start();

// if (!isset($_SESSION["user_id"])) {
//     header("Location: ./memegenerator/imagegallery.html");
// }

include '../config.php';
//isset($_POST["submit"])
if (true) {
    $img = file_get_contents("php://input"); // $_POST didn't work
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    //$data = base64_encode($img);
    $data = $img;

   echo "<script>console.log($data);</script>";

        if (false) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } else {
          //  $sql = "INSERT photos SET userid='{$_SESSION["user_id"]}',image='$data'";
            $sql = "INSERT INTO photos (userid, images) VALUES ('{$_SESSION["user_id"]}','$data')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Image saved successfully.');</script>"; 
            } else {
                echo "<script>alert('Image cannot be saved.');</script>";
                echo  $conn->error;
            }
        }
}

?>