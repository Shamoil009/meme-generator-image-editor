<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> My Gallery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // document.addEventListener("click", function(e) {
    //     console.log(e.target.src);

    //     if (e.target.src != null) {
    //         console.log(e.target.src);
    //         var a = document.createElement("a"); //Create <a>
    //         a.href = e.target.src; //Image Base64 Goes here
    //         a.download = "Meme.png"; //File name Here
    //         a.click();
    //     }
    // });


    // document.addEventListener("dblclick", function(e) {
    //     console.log(e.target.src);

    //     if (e.target.src != null) {
    //         console.log(e.target.id);
    //         localStorage.setItem("deleteImageID", e.target.id);
    //         jQuery.post("deleteimage.php", {
    //             myKey: e.target.id
    //         }, function(data) {
    //             alert("Do something with example.php response");
    //         }).fail(function() {
    //             alert("Damn, something broke");
    //         });
    //     }
    // });


    var pendingClick = 0;

    function xorClick(e) {
        // kill any pending single clicks
        if (pendingClick) {
            clearTimeout(pendingClick);
            pendingClick = 0;
        }

        switch (e.detail) {
            case 1:
                pendingClick = setTimeout(function() {
                    console.log(e.target.src);

                    if (e.target.src != null) {
                        console.log(e.target.src);
                        var a = document.createElement("a"); //Create <a>
                        a.href = e.target.src; //Image Base64 Goes here
                        a.download = "Meme.png"; //File name Here
                        a.click();
                    }
                    console.log('single click action here');
                }, 500); // should match OS multi-click speed
                break;
            case 2:
                if (e.target.src != null) {
                    console.log(e.target.id);
                    localStorage.setItem("deleteImageID", e.target.id);
                    jQuery.post("deleteimage.php", {
                        myKey: e.target.id
                    }, function(data) {
                        
                    }).fail(function() {
                        alert("Image not deleted");
                    });
                }
                alert('Image deleted successfully');

                console.log('double click action here');
                break;
            default:
                break;
        }
    }

    document.addEventListener('click', xorClick, false);
    </script>
    <style>
    .dropdownmenu {
        background-color: #FBF0F0;
    }

    .col-lg-2 {
        left: 0px;
        padding-bottom: 2%;
        background-color: #2C3333;
    }

    body {
        background-color: #E7F6F2;
    }

    .title {
        margin-bottom: 20px;
        padding-top: 20px;
    }
    p{
        margin-bottom: 5px;
    }

    img { 
        margin: 5px 10px 10px 10px;
    }
    </style>

</head>
<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
}
?>

<body>
    <div class="container-fluid">
        <div class="row" >
            <div class="col-lg-2" style="position:fixed; height:100%;">
                <div class=" d-flex flex-column flex-shrink-0 p-2 col2bg" style="height: 100%; ">
                    <a href="/" class="d-flex mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4">Meme Generator</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">

                        <li>
                            <a href="./editor.php" class="nav-link text-white">
                                Image Editor
                            </a>
                        </li>
                        <li>
                            <a href="./imagegallery.php" class="nav-link text-white">
                                Image Gallery
                            </a>
                        </li>
                        <li>
                            <a href="./mygallery.php" class="nav-link text-white">
                                My Gallery
                            </a>

                    </ul>
                    <hr>
                    <div class="dropdown ">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <!-- <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2"> -->
                            <strong>Profile</strong>
                        </a>

                        <ul class="dropdown-menu dropdownmenu text-small shadow">

                            <li><a class="dropdown-item" href="../updateprofile.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../logout.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-10 offset-lg-2">
                <h2 class="text-center title">My Gallery</h2>
                <p class="text-center"><i><b> Click on image one time to download it!</b></i></p>
                <p class="text-center"><i> <b>Click on image twice to delete it!</b></i></p>
<hr>
                <?php 
            //session_start();
            $conn = mysqli_connect("localhost" , "root" , "" , "login_register");
            if($conn -> connect_error){
                die("my connection failed" . $conn -> connect_error);
            }
                $sql = "SELECT images,imageid from photos WHERE userid={$_SESSION["user_id"]}";
                $result = $conn-> query($sql);
                if($result -> num_rows > 0){
                    while($row = $result->fetch_assoc()){

                //header("Content-type: image/png");
                        echo '<img id='.$row["imageid"].' class="col-2 img-thumbnail rounded" src="data:image/png;base64,'.$row["images"] .'"/>';      
                }
            }
                else{
                echo "No saved Image" . $conn->error;
                    }
                        $conn -> close();
            ?>
            </div>


        </div>
    </div>
</body>

</html>