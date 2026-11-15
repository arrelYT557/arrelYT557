<?php
// Ustawienie nagłówka, aby zwracał JSON
header('Content-Type: application/json; charset=utf-8');

// Odbieranie danych wysłanych ze strony (JavaScript fetch)
$inputData = file_get_contents('php://input');

if ($inputData) {
    // Sprawdzenie czy dane są poprawnym JSON-em
    $decoded = json_decode($inputData, true);
    
    if ($decoded !== null) {
        // Zapisanie danych do pliku dane.json z ładnym wcięciem i polskimi znakami
        $result = file_put_contents('dane.json', json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        
        if ($result !== false) {
            echo json_encode(["status" => "success", "message" => "Plik dane.json został zaktualizowany!"]);
            exit;
        }
    }
}

// W razie błędu
echo json_encode(["status" => "error", "message" => "Nie udało się zapisać danych."]);
?>
