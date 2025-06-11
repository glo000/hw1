<?php
    include 'auth.php';
    if (checkAuth()) {
        header('Location: home-page.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        $conn = mysqli_connect($configDB['host'], $configDB['user'], $configDB['password'], $configDB['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query = "SELECT * FROM users WHERE username = '".$username."'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        if (mysqli_num_rows($res) > 0) {
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {

                $_SESSION["_agora_username"] = $entry['username'];
                $_SESSION["_agora_user_id"] = $entry['id'];
                header("Location: home-page.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='login.css'>
        <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100..900&display=swap" rel="stylesheet"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accedi - Spotify</title>
    </head>
    <body>
        <div id="logo">
            <img src="spotify.png" />
        </div>
        <main class="login">
        <section class="main">
            <h1>Accedi a Spotify</h1>
            <?php
+                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }
                
            ?>
            <form name='login' method='post'>
                <div class="username">
                    <label for='username'>Username</label>
                    <input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                </div>
                <div class="submit"> 
                    <input type='submit' value="Accedi" id="submit">
                </div>
            </form>
            <div class="signup">Non hai un account? <a href="registrazione.php">Iscriviti a Spotify</a></div>
        </section>
        </main>
    </body>
</html>