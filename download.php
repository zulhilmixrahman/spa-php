<?php
include dirname(__FILE__) . '/db.php';

$ticket_no = $_GET['t'];

$stmt = $dbCon->prepare("SELECT * FROM complaints WHERE ticket_no = :ticket");
$stmt->bindParam(':ticket', $ticket_no);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    header('Location: /aduan.php');
}

$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (file_exists($data['attachment'])) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($data['attachment']) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($data['attachment']));
    readfile($filename);
    exit;
}