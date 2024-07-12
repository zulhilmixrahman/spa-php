<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false){
    include dirname(__FILE__) . '/logout.php';
    header('Location: //' . $_SERVER['HTTP_HOST'] . '/login.php');
    exit;
}