<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <style>
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80vh;
            width: 100vw;
            position: absolute;
            top: 10%;
            left: 0;
        }
        body {
            text-align: left;
        }
        a > img {
            width: 5%;
        }

        input {
            width: fit-content;
            margin: 1em;
            background-color: orange;   
            padding: 0.3em;
            font-size: 2em;
        }

        @media only screen and (max-width: 800px) {
            a > img {
                width: 10%;
            }
            input {
            width: fit-content;
            margin: 1em;
            background-color: orange;
            padding: 0.3em;
            font-size: 1.2em;
        }
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