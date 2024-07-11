<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "password";
$dbName = "helpdesk";

try {
    $dbCon = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
    $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}