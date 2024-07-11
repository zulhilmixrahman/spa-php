<?php 
include dirname(__FILE__) . '/../db.php';
$moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__);

$id = (int) $_GET['id'];
$name = strip_tags($_POST['name']);
$code = strip_tags($_POST['code']);

$stmt = $dbCon->prepare("UPDATE departments SET `name` = :name, `code` = :code WHERE id = :pk");
$stmt->bindparam(":name", $name);
$stmt->bindparam(":code", $code);
$stmt->bindparam(":pk", $id);
$stmt->execute();

header("Location: //{$moduleURL}/index.php");