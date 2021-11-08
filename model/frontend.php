<?php

function dbConnect(){
    $db = new PDO('mysql:host=localhost;dbname=web-icc;charset=utf8', 'root', '');
}