<?php
    $configDB = [
        'host'     => '127.0.0.1',
        'name'     => 'hw1',
        'user'     => 'root',
        'password' => ''
    ];

    $conn = mysqli_connect($configDB['host'], $configDB['user'], $configDB['password'], $configDB['name']);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
?>