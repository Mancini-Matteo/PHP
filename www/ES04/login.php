<?php

$form = <<<HTML
    <form action="login.php" method="POST" align="center">
        <h1> INSERISCI I TUOI DATI</h1>
        <input type="text" name="user" placeholder="Username"><br>
        <input type="password" name="pass" placeholder="Password"><br>
        <input type="submit" name="submit" value="LOGIN">
    </form>
HTML;

// Controllo invio modulo
if(isset($_POST['submit'])) 
{
    $username = $_POST['user'];
    $password = $_POST['pass'];
    
    $message="Prova";

    // Verifica delle credenziali 
    if($username == 'Mancio' && $password == 'Admin') 
    {
        $message="Benvenuto, $username!";
    } 
    else
    {
        $message="Credenziali errate, accesso negato!";
    }
}
?>
<!DOCTYPE html>
<head>
    <title> Login </title>
</head>
<body>
<?php
    echo "MESS " . $message;
    if(isset($_POST['submit'])) 
    {
        echo $message;
    } 
    else
    {
        echo $form;
    } 
?>
</body>
</html>