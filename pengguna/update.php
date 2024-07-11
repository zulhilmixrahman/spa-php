<?php 
include dirname(__FILE__) . '/../db.php';
$moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__);

$id = (int) $_GET['id'];
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$department = (int) $_POST['department'];

$stmt = $dbCon->prepare("UPDATE users 
    SET `name` = :name, `email` = :email, `department_id` = :dept 
    WHERE id = :pk
");

$stmt->bindparam(":pk", $id);
$stmt->bindparam(":name", $name);
$stmt->bindparam(":email", $email);
$stmt->bindparam(":dept", $department);

$stmt->execute();

header("Location: //{$moduleURL}/index.php");