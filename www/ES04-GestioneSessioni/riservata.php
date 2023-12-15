<!DOCTYPE html>
<html>
<head>
    <title>Pagina riservata Mancini</title>
</head>
<body>
<h1>VERIFICA DEI DATI</h1>

<?php
    //inizio sessione
    session_start();

    //controllo username 
    if (!isset($_SESSION['username']))
    {
        header('Location: login.php');
        exit();
    }
    $nome = $_SESSION['username'];

    echo "<b>Benvenuto $nome nell'area riservata</b>";
?>
<br/>
<br/>
<a href="logout.php">logout</a>   
</body>
</html>