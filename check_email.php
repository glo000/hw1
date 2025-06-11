<?php
    require_once 'configurazioneDB.php';
    
    if (!isset($_GET["q"])) {
    echo json_encode(['error' => 'Missing parameter']);
    exit;
}

    header('Content-Type: application/json');
    
    $conn = mysqli_connect($configDB['host'], $configDB['user'], $configDB['password'], $configDB['name']);

    $email = mysqli_real_escape_string($conn, $_GET["q"]);

    $query = "SELECT email FROM users WHERE email = '$email'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (!$res) {
    echo json_encode(['error' => 'Errore nella query']);
    exit;
}

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>