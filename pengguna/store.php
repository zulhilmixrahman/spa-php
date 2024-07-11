<?php
include dirname(__FILE__) . '/../db.php';
$moduleURL = $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__);

// Validation
if (!isset($_POST['name']) || empty($_POST['name'])) {
    header("Location: //{$moduleURL}/create.php");
    exit;
}
if (!isset($_POST['email']) || empty($_POST['email'])) {
    header("Location: //{$moduleURL}/create.php");
    exit;
}

$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$department = (int) $_POST['department'];

$password = $_POST['password'] ?? '12345678';
$hashed = password_hash($password, PASSWORD_DEFAULT);

$stmt = $dbCon->prepare(
    "INSERT INTO users (`name`, `email`, `password`, `department_id`) 
    VALUES (:name, :email, :pswd, :dept)"
);

$stmt->bindparam(":name", $name);
$stmt->bindparam(":email", $email);
$stmt->bindparam(":pswd", $hashed);
$stmt->bindparam(":dept", $department);

$stmt->execute();

header("Location: //{$moduleURL}/index.php");