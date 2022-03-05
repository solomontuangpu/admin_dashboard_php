<?php

//db connect start

function con() { 

   return mysqli_connect("localhost", "root", "", "my_blog");

}

//db connect end


$info = array(
    "name" => "Solomon Tuangpu",
    "short" => "ST",
    "description" => "He is a smart hardworker and web develper from Myanmar"
);

$role = ["Admin", "Editor", "User"];

$url = "http://{$_SERVER['HTTP_HOST']}";

date_default_timezone_set('Asia/Yangon');