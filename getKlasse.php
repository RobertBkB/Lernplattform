<?php
header("Content-Type: application/json");

// Sicherheitsmaßnahme: Nur GET mit Parameter "id" erlaubt
if (!isset($_GET['id'])) {
    echo json_encode(["error" => "Keine ID übergeben"]);
    exit;
}

$id = $_GET['id'];
$rezepte = json_decode(file_get_contents("Lernplattform---backend/rezepte.json"), true);

foreach ($rezepte as $klasse => $ids) {
    if (in_array($id, $ids)) {
        echo json_encode(["klasse" => $klasse]);
        exit;
    }
}

echo json_encode(["error" => "ID nicht gefunden"]);
?>

