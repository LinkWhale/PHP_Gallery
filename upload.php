<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <style>
        
        body {
            text-align: left;
        }
      
    </style>
</head>
<body>
    <!-- Bad png image used on purpose -->
    <a href="./"><img src="./back-arrow.png"></a>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submit" value="Submit">
    
<?php
if(isset($_POST["submit"])) {
    try {
        //Image upload
            $target_dir = "img/";
            $target_file = $target_dir . $_FILES["file"]["name"];
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if(file_exists($target_file)) {
                $uploadOk = 0;
                echo "File already exists. ";
            }

            // Check if file is small enough
            if($_FILES["file"]["size"] > 5000000) {
                $uploadOk = 0;
                echo "Error file too big. ";  
            }
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
                $uploadOk = 0;
                }

            if($uploadOk == 1) {
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                echo $target_file;
                echo "<img src=".$target_file." width=300>";
            }

            
    }
    catch(ValueError $e) {
        echo "No file uploaded";
    }
    }?>
    </form>
</body>
</html>