<?php
// upload_prescription.php
header('Content-Type: text/plain');

// Folder where uploaded images will be stored
$uploadDir = 'uploads/prescriptions/';

// Make sure the folder exists
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Check if file was uploaded
if (!isset($_FILES['prescription_image'])) {
    echo "No file uploaded.";
    exit;
}

$file = $_FILES['prescription_image'];
$filename = basename($file['name']);
$targetPath = $uploadDir . time() . "_" . $filename;

// Move file to target path
if (move_uploaded_file($file['tmp_name'], $targetPath)) {
    echo "Prescription image uploaded successfully!";
} else {
    echo "Failed to upload image.";
}
?>
