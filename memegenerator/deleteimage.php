<?php
                $imageID = $_POST['myKey'];
               //  $imageID = "<script> localStorage.getItem('deleteImageID')</script>";
        
                    $conn = mysqli_connect("localhost" , "root" , "" , "login_register");
            if($conn -> connect_error){
                die("my connection failed" . $conn -> connect_error);
            }
                $sql = "DELETE FROM photos WHERE imageid = $imageID";
                $result = $conn-> query($sql);
                
     //           $retval = mysql_query( $sql, $conn );
            
                if(! $result ) {
                   die('Could not delete data: ' . mysql_error());
                }
                
                echo "<script>alert('Image deleted successfully')</script>";

                        $conn -> close();
                ?>