<?php
require_once("app/imagemanager.php");


?>
<html ng-app="gallery">
<head>
<title></title>
<script src="angular.min.js"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
</head>
<body ng-controller="thumb_controller as gl">
    <header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="upload.php">Upload</a></li>
        </ul>
    </nav>
    </header>
    <div class="thumbnails">
    <h1>Thumbnails</h1>
        <span  ng-repeat= "item in gl.thumbs.data">
            <img class="thumbnail" ng-src={{item}} ng-click="gl.showModal($index)" />

        </span>      
    </div>

    <div id="modal" class="modal">
        <!-- Modal content -->
        <div class="modal-content" id="modalcontent">
            <span class="close" ng-click="gl.closeModal()">&times;</span></br>
            <div class="img-canvas">
                <table>
                    <tr>
                        <td><span ng-click="gl.previousImg()" class="arrow-left"><</span></td>
                        <td><img class="modelimg" ng-src="{{gl.currentimg}}"></td>
                        <td><span ng-click="gl.nextImg()" class="arrow-right">></span></td>
                    </tr>
                </table> 
                
            <div>
            <button class="toggleslideshow" ng-click = "gl.toggleSlideShow()">Toggle Slideshow</button>
        </div>
    </div>
</body>
</html>