<?php
include dirname(__FILE__) . '/db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: /aduan.php');
    exit;
}

$name = validate_input($_POST["name"]);
$email = validate_input($_POST["email"]);
$department = (int) validate_input($_POST["department_id"]);
$category = (int) validate_input($_POST["category_id"]);
$title = validate_input($_POST["title"]);
$detail = validate_input($_POST["detail"]);
$location = validate_input($_POST["location"]);
$contact_no = validate_input($_POST["contact_no"]);
$attachment = null;

// Split file name with dot (.)
$temp_file = explode(".", $_FILES["attachment"]["name"]);
// Get extension file
$extension = end($temp_file);
// Create new random filename
$newfilename = round(microtime(true)) . '.' . $extension;
// Path to upload
$path = "uploads/" . $newfilename;
// Upload file to server
if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $path)) {
    $attachment = $path;
}

$ticket_no = 'ICT-' . time();

$new_complaint = $dbCon->prepare(
    "INSERT INTO complaints (`name`, `email`, `department_id`, `category_id`, `ticket_no`, `title`, `detail`, `location`, `contact_no`, `attachment`) 
    VALUES (:name, :email, :dept, :cat, :ticket, :title, :detail, :location, :contact, :file)"
);

$new_complaint->bindparam(":name", $name);
$new_complaint->bindparam(":email", $email);
$new_complaint->bindparam(":dept", $department);
$new_complaint->bindparam(":cat", $category);
$new_complaint->bindparam(":ticket", $ticket_no);
$new_complaint->bindparam(":title", $title);
$new_complaint->bindparam(":detail", $detail);
$new_complaint->bindparam(":location", $location);
$new_complaint->bindparam(":contact", $contact_no);
$new_complaint->bindparam(":file", $attachment);

$new_complaint->execute();

header("Location: /index.php");