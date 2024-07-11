<?php 
include dirname(__FILE__) . '/../db.php';
$moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__);

$name = strip_tags($_POST['name']);
$code = strip_tags($_POST['code']);

$stmt = $dbCon->prepare("INSERT INTO departments (`name`, `code`) VALUES (:name, :code)");
$stmt->bindparam(":name", $name);
$stmt->bindparam(":code", $code);
$stmt->execute();

header("Location: //{$moduleURL}/index.php");