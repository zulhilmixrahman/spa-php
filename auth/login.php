<?php
session_start();
include dirname(__FILE__) . '/../db.php';

$errors = [];
if (validate_input($_POST['email'], null, 'email') !== null) {
    $errors['email'] = validate_input($_POST['email'], 'Alamat Emel', 'email');
}
if (validate_input($_POST['password']) !== null) {
    $errors['password'] = validate_input($_POST['password'], 'Kata Laluan');
}

if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header('Location: //' . $_SERVER['HTTP_HOST'] . '/login.php');
    exit;
}

$email = sanitize_input($_POST["email"]);
$password = sanitize_input($_POST["password"]);

$findUser = $dbCon->prepare("SELECT * FROM users WHERE email = :email");
$findUser->execute([':email' => $email]);

if ($findUser->rowCount() == 0) {
    $_SESSION['errors']['email'] = 'Alamat Emel atau Kata Laluan tidak sah';
    header('Location: //' . $_SERVER['HTTP_HOST'] . '/login.php');
    exit;
}

$user = $findUser->fetch(PDO::FETCH_ASSOC);
if (password_verify($password, $user['password']) === false) {
    $_SESSION['errors']['email'] = 'Alamat Emel atau Kata Laluan tidak sah';
    header('Location: /login.php');
    exit;
}

$_SESSION['loggedin'] = true;
$_SESSION['user'] = [
    'id' => $user['id'],
    'name' => $user['name'],
    'email' => $user['email'],
    'department_id' => $user['department_id'],
];

header('Location: //' . $_SERVER['HTTP_HOST'] . '/index.php');
exit;