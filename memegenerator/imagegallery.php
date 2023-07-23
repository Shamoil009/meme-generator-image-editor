<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./imagegallery.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Image Gallery</title>
</head>

<body>
    
    <!-- Gallery -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"  style="position:fixed; height:100%;">
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
                <h3 class=" text-center title">Image Gallery</h3>
                <p class="text-center"><i> Click on any image to edit it</i></p>
                <hr>
                <div class="row ">
                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/54hjww.jpg" 
                                class="img-thumbnail rounded float-start" />
                        </a>
                    </div>

                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Always-Has-Been.png" class="img-thumbnail rounded " />
                        </a>
                    </div>

                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Batman-Slapping-Robin.jpg" class="img-thumbnail rounded float-end" />
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Bernie-I-Am-Once-Again-Asking-For-Your-Support.jpg"
                                class="img-thumbnail rounded float-start" />
                        </a>
                    </div>

                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Boardroom-Meeting-Suggestion.jpg" class="img-thumbnail rounded " />
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Buff-Doge-vs-Cheems.png" class="img-thumbnail rounded float-end" />
                        </a>
                    </div>
                    <hr>

                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Change-My-Mind.jpg" class="img-thumbnail rounded float-start" />
                        </a>
                    </div>

                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Disaster-Girl.jpg" class="img-thumbnail rounded " />
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Drake-Hotline-Bling.jpg" class="img-thumbnail rounded float-end" />
                        </a>
                    </div>

                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Epic-Handshake.jpg" class="img-thumbnail rounded float-start" />
                        </a>
                    </div>

                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Expanding-Brain.jpg" class="img-thumbnail rounded " />
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Grus-Plan.jpg" class="img-thumbnail rounded float-end" />
                        </a>
                    </div>
                    <hr>
                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Guy-Holding-Cardboard-Sign.jpg"
                                class="img-thumbnail rounded float-start" />
                        </a>
                    </div>

                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Running-Away-Balloon.jpg" class="img-thumbnail rounded " />
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Tuxedo-Winnie-The-Pooh.png" class="img-thumbnail rounded float-end" />
                        </a>
                    </div>

                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Two-Buttons.jpg" class="img-thumbnail rounded float-start" />
                        </a>
                    </div>

                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/UNO-Draw-25-Cards.jpg" class="img-thumbnail rounded " />
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="./editor.php">
                            <img src="./memes/Woman-Yelling-At-Cat.jpg" class="img-thumbnail rounded float-end" />
                        </a>
                    </div>
                    <hr>
                </div>
                </div>
            </div>
        </div>
        <script>
            // localStorage["key"] = value;
            document.querySelectorAll("img").forEach(function (el) {
                el.addEventListener('click', function () {
                    var src = this.getAttribute('src');
                    console.log(src);
                    localStorage.setItem("imageurl", src);
                });
            });


// function imageload(e){
//     var src = this.getAttribute('src');
//     console.log(src);
//     localStorage.setItem("imageurl", src);

// };

        </script>

        <!-- <script>
        const links = ['./memes/54hjww.jpg', './memes/Always-Has-Been.png', './memes/Batman-Slapping-Robin.jpg', './memes/Bernie-I-Am-Once-Again-Asking-For-Your-Support.jpg', './memes/Boardroom-Meeting-Suggestion.jpg',
            './memes/Buff-Doge-vs-Cheems.png', './memes/Change-My-Mind.jpg', './memes/Disaster-Girl.jpg'];

        for (link of links) {
            document.getElementById('container').innerHTML += `<div class="col-2"> 
  <a href=${link}>
  <img src=${link} alt="jeffthecow"  class="img-thumbnail rounded "/>
  </a>
  </div>`;
        }
    </script> -->
        <!-- Gallery -->
</body>

</html>