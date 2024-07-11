<?php 
include dirname(__FILE__) . '/../db.php';
$moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__);

$id = (int) $_GET['id'];
$name = strip_tags($_POST['category']);

$stmt = $dbCon->prepare("UPDATE categories SET `name` = :title WHERE id = :pk");
$stmt->bindparam(":title", $name);
$stmt->bindparam(":pk", $id);
$stmt->execute();

header("Location: //{$moduleURL}/index.php");