<?php
require_once("app/imagemanager.php");
require_once("app/config.php");
if(isset($_POST["uploaded"])){
    if(isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name']!== ""){
        $imagemanager = new ImageManager();
        $imagemanager->saveimage($_FILES['image']);
    }else{
    }
}
?>
<html><head>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="upload.php">Upload</a></li>
        </ul>
    </nav>
    </header>
    <br><br><br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <p>Please Upload an Image</p>
        <input type="file" name="image" id="image" />
        <input type="submit" value="Upload" name = "uploaded"/>
    </form>
</body>
</html>