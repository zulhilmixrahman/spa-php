<?php 
include dirname(__FILE__) . '/../db.php';
$moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__);

$id = (int) $_GET['id'];

$stmt = $dbCon->prepare("DELETE FROM departments WHERE id = :pk");
$stmt->bindparam(":pk", $id);
$stmt->execute();

header("Location: //{$moduleURL}/index.php");