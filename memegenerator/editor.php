<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editor.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Canvas</title>
</head>
<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
}
?>

<body>

    <div class="container-fluid " style="padding-top: 0px; position : fixed" scroll="no">
        <div class="row">
            <div class="col-2" style="position: fixed; height:100%; overflow-y:auto;">
                <div class="d-flex flex-column flex-shrink-0 p-2 col2bg" style="width:auto; height: 100%;">
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
                        </li>


                    </ul>
                    <hr>
                    <div class="dropdown">
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



            <div class="col-7 offset-2" style="position:fixed; height: 100%;">

                <div id="imageDIV" style="position: relative;">

                    <canvas id="static" style="position: absolute;  z-index:0 ;"></canvas>
                    <canvas id="dynamic" style="position: absolute; z-index: 1; "></canvas>
                    <canvas id="preview" style="visibility:hidden ;"></canvas>
                </div>


            </div>
            <div class="col-3 offset-9" style="position:fixed; height: 100%;">
                <textarea id="theText" cols="20" rows="3" style="resize:none ;"></textarea>
                <br>
                <button id="submit" class="btnmain rounded-2">Add text</button>
                <button id="delete" class="btnsec rounded-2" onclick=deleteText()>Delete</button><br>

                <h3 class="dropdown-header textformat"> Text Font:

                    <select id="textFont" class="dropdown">
                        <option value="serif">serif</option>
                        <option value="sans-serif">sans-serif</option>
                        <option value="cursive">cursive</option>
                        <option value="fantasy">fantasy</option>
                        <option value="monospace">monospace</option>
                        <option value="Arial">Arial</option>
                        <option value="Verdana">Verdana</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Courier New">Courier New</option>
                    </select>
                </h3>

                <h3 class="dropdown-header textformat"> Font Weight:
                    <select id="fontWeight" class="dropdown">
                        <option value="normal">normal</option>
                        <option value="bold">bold</option>
                        <option value="bolder">bolder</option>
                        <option value="lighter">lighter</option>
                    </select>
                </h3>

                <h3 class="dropdown-header textformat"> Font Style:
                    <select id="fontStyle" class="dropdown">
                        <option value="normal">normal</option>
                        <option value="italic">italic</option>
                        <option value="oblique">oblique</option>
                    </select>
                </h3>

                <h3 class="dropdown-header textformat"> Text Size:

                    <select id="textSize" class="dropdown">
                        <option value="16">16</option>
                        <option value="18">18</option>
                        <option value="20">20</option>
                        <option value="24">24</option>
                        <option value="26">26</option>
                        <option value="28">28</option>
                        <option value="30">30</option>
                        <option value="32">32</option>
                        <option value="34">34</option>
                        <option value="36">36</option>
                        <option value="38">38</option>
                        <option value="40">40</option>
                        <option value="42">42</option>
                        <option value="44">44</option>
                        <option value="46">46</option>

                    </select>
                </h3>

                <h3 class="dropdown-header textformat"> Add Shadow:
                    <select id="shadowOrNot" class="dropdown">
                        <option value="shadow">Shadow</option>
                        <option value="noShadow">No shadow</option>
                    </select>
                </h3>

                <h3 class="dropdown-header textformat"> Text Shadow Color :
                    <input type="color" class="colorInput" id="textShadowColor" value="color">
                </h3>

                <h3 class="dropdown-header textformat"> Fill Or Stroke:
                    <select id="fillOrStroke" class="dropdown">
                        <option value="fill">fill</option>
                        <option value="stroke">stroke</option>
                    </select>
                </h3>


                <h3 class="dropdown-header textformat"> Text Color :
                    <input type="color" class="colorInput" id="textFillColor" value="color">
                </h3>


                <h3 class="dropdown-header textformat"> Stroke Text Color :
                    <input type="color" class="colorInput" id="strokeTextColor" value="color">
                </h3>

                <h4 class=" rotate">Rotate Text
                    <button id="counterclockwise" class="text-bg-secondary rounded-2 ">left</button>
                    <button id="clockwise" class="text-bg-secondary rounded-2 ">right</button>
                </h4>

                <input type="button" id="download" class="btnmain rounded-2 textformat" onclick="saveImage()"
                    value="Save" />
                <!-- <input type="button" id="download" class="btnmain rounded-2 textformat" onclick="downloadWebpImage()"
                    value="webp" /> -->
                <input type="button" class="btnsec rounded-2 textformat" onclick="previewImage()" value="Preview" />
               
                <!-- <div class="dropdown"> -->
                        <a href="#" class="align-items-center text-white text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" >
                            <strong>Download</strong>
                        </a>
                        <ul class="dropdown-menu dropdownmenu text-small shadow" style="cursor: pointer;">
                            <li>
                            <a class="dropdown-item" onclick="downloadWebpImage()">webp</a>
                            </li>
                            <li><a class="dropdown-item" onclick="downloadPNGImage()">PNG</a></li>
                        </ul>
                    <!-- </div> -->
                <br><br>
                <input type="file" class=" text-bg-secondary " id="imageLoader" onchange="uploadfile()"
                    accept="image/png, image/jpeg, image/jpg" />


            </div>
        </div>
    </div>

    <!-- <canvas id="static" width="1350" height="540" style="position: absolute; left: 0; top: 0; z-index: 1; background-color: transparent;" ></canvas>
   <canvas id="dynamic" width="1350" height="540" style="position: absolute; left: 0; top: 0; z-index: 0; background-color: transparent;"></canvas> -->
    <script src="./editor.js"></script>

</body>

</html>