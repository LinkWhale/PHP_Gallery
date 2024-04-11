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

        //Image upload
        $target_dir = "img/";
        $target_file = $target_dir . $_FILES["file"]["name"];
        $uploadOk = 1;
        if(file_exists($target_file)) {
            $uploadOk = 0;
        }
    
        // Check if its an image
        try {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
        
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
                echo "error file is not an image";
                }

            // Check if file is small enough
            if($_FILES["file"]["size"] > 5000000) {
                $uploadOk = 0;
                echo "Error file too big";  
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