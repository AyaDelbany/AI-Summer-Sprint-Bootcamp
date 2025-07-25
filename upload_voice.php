<?php
// upload_voice.php
header('Content-Type: text/plain');

// Folder where uploaded voice files will be stored
$uploadDir = 'uploads/voices/';

// Make sure the folder exists
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Check if a file was uploaded
if (!isset($_FILES['voice_message'])) {
    echo "No voice file uploaded.";
    exit;
}

$file = $_FILES['voice_message'];
$filename = basename($file['name']);
$targetPath = $uploadDir . time() . "_" . $filename;

// Move file to target path
if (move_uploaded_file($file['tmp_name'], $targetPath)) {
    echo "Voice message uploaded successfully!";
} else {
    echo "Failed to upload voice message.";
}
?>
