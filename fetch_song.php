<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) exit;

    header('Content-Type: application/json');

    $conn = mysqli_connect($configDB['host'], $configDB['user'], $configDB['password'], $configDB['name']);

    $userid = mysqli_real_escape_string($conn, $userid);
    
    $next = isset($_GET['from']) ? 'AND songs.id < '.mysqli_real_escape_string($conn, $_GET['from']).' ' : '';

    $query = "SELECT song_id, title, artist, image FROM favorites WHERE user_id = $userid ORDER BY id DESC LIMIT 10";



    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    $songArray = array();
    while($entry = mysqli_fetch_assoc($res)) {
        $songArray[] = array('songid' => $entry['song_id'], 
                            'artist' => $entry['artist'],
                            'title' => $entry['title'],
                            'image' => $entry['image']);
    }
    echo json_encode($songArray);
    
    exit;


?>