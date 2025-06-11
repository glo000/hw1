<?php
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Artisti Popolari</title>
    <link rel="stylesheet" href="artisti.css">
    <script src="artist_tendenza.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <nav>
            <a href="home-page.php">Home</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <section id="sezione-artisti" class="grid-container">
            <!-- artisti verranno caricati qui dinamicamente -->
        </section>
    </main>
</body>
</html>
