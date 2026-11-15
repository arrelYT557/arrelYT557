<?php
header('Content-Type: application/json; charset=utf-8');
$inputData = file_get_contents('php://input');

if ($inputData) {
    $decoded = json_decode($inputData, true);
    if ($decoded !== null) {
        $result = file_put_contents('dane.json', json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        if ($result !== false) {
            echo json_encode(["status" => "success", "message" => "Zapisano pomyślnie!"]);
            exit;
        }
    }
}
echo json_encode(["status" => "error", "message" => "Błąd zapisu."]);
?>
