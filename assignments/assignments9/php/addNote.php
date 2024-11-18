<?php
require_once '../classes/Db_conn.php';

$message = '';

// Checking the submission form 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noteText = $_POST['note'] ?? null;
    $dateTime = $_POST['dateTime'] ?? null;

    if ($noteText && $dateTime) {
        try {
            $db = new Db_conn();
            $pdo = $db->dbOpen();

            // Convert Timestamp
            $formattedDateTime = date('Y-m-d H:i:s', strtotime($dateTime));

            // Insert Database
            $sql = "INSERT INTO note (date_time, note) VALUES (:date_time, :note)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['date_time' => $formattedDateTime, 'note' => $noteText]);

            $message = "Note added successfully!";
        } catch (PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    } else {
        $message = "Please enter both a date/time and a note.";
    }
}
