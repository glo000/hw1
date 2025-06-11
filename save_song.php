<?php
    require_once 'auth.php';
    if (!$userid = checkAuth()) exit;

    spotify();

    function spotify() {
        global $configDB, $userid;

        $conn = mysqli_connect($configDB['host'], $configDB['user'], $configDB['password'], $configDB['name']);
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $artist = mysqli_real_escape_string($conn, $_POST['artist']);
        $image = mysqli_real_escape_string($conn, $_POST['image']);

        $query = "SELECT * FROM favorites WHERE user_id = '$userid' AND song_id = '$id'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            echo json_encode(array('ok' => true));
            exit;
        }

        $query = "INSERT INTO favorites (user_id, song_id, title, artist, image) VALUES ('$userid', '$id', '$title', '$artist', '$image')";
        
        error_log($query);
        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => true));
            exit;
        }

        mysqli_close($conn);
        echo json_encode(array('ok' => false));
    }