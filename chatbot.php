<?php
header('Content-Type: application/json');
require_once "config.php"; // Your DB connection

// Get JSON input from frontend
$data = json_decode(file_get_contents("php://input"), true);
$userMessage = strtolower(trim($data["message"] ?? ""));

$reply = "Sorry, I didn't understand that.";

// 1. Check if user asks about medication availability
if (preg_match('/\b(do you have|is there|have|available)\b.*\b(\w+)\b/', $userMessage, $matches)) {
    $medName = $matches[2];
    $stmt = $con->prepare("SELECT medication_name, stock_quantity FROM medications WHERE LOWER(medication_name) = ?");
    $stmt->bind_param("s", $medName);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $reply = "Yes, we have {$row['medication_name']} in stock. Quantity: {$row['stock_quantity']}.";
    } else {
        $reply = "Sorry, we couldn't find that medication in our database.";
    }
    $stmt->close();
}
// 2. Check refill status by RX number
elseif (preg_match('/status of refill (\w+)/', $userMessage, $matches)) {
    $rxNumber = strtoupper($matches[1]);
    $stmt = $con->prepare("
        SELECT rr.status FROM refill_requests rr
        JOIN prescriptions p ON rr.prescription_id = p.prescription_id
        WHERE p.rx_number = ?");
    $stmt->bind_param("s", $rxNumber);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $reply = "The refill request status for {$rxNumber} is: {$row['status']}.";
    } else {
        $reply = "No refill request found for RX number {$rxNumber}.";
    }
    $stmt->close();
}
// 3. Submit a refill request by RX number
elseif (preg_match('/refill prescription (\w+)/', $userMessage, $matches)) {
    $rxNumber = strtoupper($matches[1]);
    // Find prescription ID
    $stmt = $con->prepare("SELECT prescription_id FROM prescriptions WHERE rx_number = ?");
    $stmt->bind_param("s", $rxNumber);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $prescriptionId = $row['prescription_id'];
        // Insert refill request
        $stmt2 = $con->prepare("INSERT INTO refill_requests (prescription_id, request_date, request_source, extracted_via_ai, status) VALUES (?, NOW(), 'webform', 1, 'pending')");
        $stmt2->bind_param("i", $prescriptionId);
        if ($stmt2->execute()) {
            $reply = "Your refill request for prescription {$rxNumber} has been submitted and is pending approval.";
        } else {
            $reply = "Sorry, we couldn't submit your refill request at this time.";
        }
        $stmt2->close();
    } else {
        $reply = "No prescription found with RX number {$rxNumber}.";
    }
    $stmt->close();
}
// 4. Get patient info by name
elseif (preg_match('/patient info for (.+)/', $userMessage, $matches)) {
    $patientName = trim($matches[1]);
    $stmt = $con->prepare("SELECT full_name, date_of_birth FROM patients WHERE LOWER(full_name) = LOWER(?)");
    $stmt->bind_param("s", $patientName);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $dob = $row['date_of_birth'] ?? 'unknown';
        $reply = "Patient: {$row['full_name']}, Date of Birth: {$dob}.";
    } else {
        $reply = "No patient found with the name {$patientName}.";
    }
    $stmt->close();
}
// 5. Get primary contact info for patient by name
elseif (preg_match('/contact info for (.+)/', $userMessage, $matches)) {
    $patientName = trim($matches[1]);
    $stmt = $con->prepare("
        SELECT cm.contact_type, cm.contact_value FROM contact_methods cm
        JOIN patients p ON cm.patient_id = p.patient_id
        WHERE LOWER(p.full_name) = LOWER(?) AND cm.is_primary = 1
        LIMIT 1");
    $stmt->bind_param("s", $patientName);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $reply = "Primary contact for {$patientName} is {$row['contact_type']}: {$row['contact_value']}.";
    } else {
        $reply = "No primary contact info found for {$patientName}.";
    }
    $stmt->close();
}

echo json_encode(["reply" => $reply]);
?>
