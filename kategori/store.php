<?php 
include dirname(__FILE__) . '/../auth/validator.php';
include dirname(__FILE__) . '/../db.php';
$moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__);

$name = strip_tags($_POST['category']);

$stmt = $dbCon->prepare("INSERT INTO categories (`name`) VALUES (:title)");
$stmt->bindparam(":title", $name);
$stmt->execute();

header("Location: //{$moduleURL}/index.php");