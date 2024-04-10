<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Bild Galleri</title>
</head>
<body>
    <h1><span style="color: red;">Welcome</span> <span style="color: orange;">to</span> 
    <span style="color: yellow;">the</span> <span style="color: green;">Cool</span><span style="color: blue;">Awesome</span><span style="color: indigo;">Gallery</span><span style="color: purple;">&trade;</span></h1>
<a href="./upload.php">Upload your photos here!</a>
<div class="Gallery">
<?php
    $images = scandir("./img/");

    echo "<br>";
    for($i= 2; $i < count($images); $i++){
        echo "<img src=\"./img/".$images[$i]."\" class=\"gallery_item\" alt=\"".$images[$i]."\">" ;
    }
    ?>
</div>


</body>
</html>