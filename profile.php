<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>
    <?php 
        $conn = mysqli_connect($configDB['host'], $configDB['user'], $configDB['password'], $configDB['name']);
        $userid = mysqli_real_escape_string($conn, $userid);
        $query = "SELECT * FROM users WHERE id = $userid";
        $res_1 = mysqli_query($conn, $query);
        $userinfo = mysqli_fetch_assoc($res_1);   
    ?>

    <head>
        <link rel='stylesheet' href='profile.css'>
        <script src='profile.js' defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100..900&display=swap" rel="stylesheet"> 

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <title> - <?php echo $userinfo['name']." ".$userinfo['surname'] ?></title>
    </head>

    <body>
    <div id="overlay">
    </div>
        <header>
      <nav>
        <div class="nav-left">
          <div class="flex-item" id="logo"> 
            <img src="spotify.png" />
          </div>
        </div>

        
        <h1><?php echo $userinfo['name']." ".$userinfo['surname'] ?></h1>
               

        <div id="nav-right">
          <div id="link-left-sep">
            <strong class="item-link"> Premium</strong>
            <strong class="item-link"> Assistenza</strong>
            <strong class="item-link"> Scarica</strong>
          </div>
        
          <div class="separatore"></div>
        
          <div id="link-right-sep">
            <a href='home-page.php'>Home</a>
            <a href="logout.php">Logout</a>
      
          </div>

          <div id="menu">
            <img src="icons8-menu-50.png">
          </div>

        </div>

      </nav>
    </header>
     
        <section class="container">
            <h2>Brani che ti piacciono (<span id="count">0</span>)</h2>
            <div id="results">
                
            </div>
    </section>

    </body>
</html>

<?php mysqli_close($conn); ?>