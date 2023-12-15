<!DOCTYPE html>
<html>
<head>
    <title>Home page Mancini</title>
</head>
<body>
<p><a href="login.php">LOGIN</a></p>
<?php
    //start sessione
    session_start();

    //controllo username
    if(!isset($_SESSION['username']))
    {
      echo '<p><a href="login.php"> PAGINA RISERVATA </a></p>';
    } 
    else
    {
      echo '<p><a href="riservata.php"> PAGINA RISERVATA </a></p>';
    }
?>    
</body>
</html>
