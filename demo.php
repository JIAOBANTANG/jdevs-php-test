<?php
include './Libs/Functions.php';

//1 removeExifInfo
removeExif('./img/IMG_7396.JPG', './img/IMG_7396_Not_Exif.jpg');

//2.quickSort
var_dump(quickSort([3, 0, 2, 5, -1, 4, 1]));

//3.josephRing
var_dump(josephRing(30, 4));

