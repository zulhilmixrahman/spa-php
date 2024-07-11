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
$attachment = $_POST['attachment'];

$ticket_no = 'ICT-' . time();

$new_complaint = $dbCon->prepare(
    "INSERT INTO complaints (`name`, `email`, `department_id`, `category_id`, `ticket_no`, `title`, `detail`, `location`, `contact_no`) 
    VALUES (:name, :email, :dept, :cat, :ticket, :title, :detail, :location, :contact)"
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

$new_complaint->execute();

header("Location: //{$moduleURL}/index.php");