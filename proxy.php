<?php
header("Content-Type: text/plain");

// URL asli kamu
$device_id = $_GET['device_id'];
$url = "https://electromation-vibrate-monitoring.unaux.com/get_device_status.php?device_id=" . $device_id;

// Ambil data dari server asli
$context = stream_context_create([
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: Mozilla/5.0\r\n"
    ]
]);

$response = file_get_contents($url, false, $context);

// Hapus HTML & JS dari proteksi hosting
$clean = strip_tags($response);

// Filter hanya baris yang mengandung "="
$lines = explode("\n", $clean);
foreach ($lines as $line) {
    $line = trim($line);
    if (strpos($line, "=") !== false) {
        echo $line . "\n";
    }
}
?>
