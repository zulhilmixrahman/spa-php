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

/**
 * Validate input data
 * @param mixed $input Value to validate
 * @param mixed $name Attribute name
 * @param mixed $type Type of value to validate
 * @return string|null
 */
function validate_input($input, $name = 'Medan ini', $type = 'string')
{
    if ($input === null || empty($input)) {
        return $name . ' adalah wajib';
    }

    if ($type == 'int' && filter_var($input, FILTER_VALIDATE_INT) == false) {
        return $name . ' mesti nombor bulat';
    }

    if ($type == 'email' && filter_var($input, FILTER_VALIDATE_EMAIL) == false) {
        return $name . ' mesti alamat emel yang sah';
    }

    return null;
}

/**
 * Sanitize input data
 * @param mixed $data Value to sanitize
 * @return string
 */
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}