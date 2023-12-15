<!DOCTYPE html>
<html>
<head>
    <title>Login Mancini</title>
</head>
<body>
<?php
    //start sessione
    session_start();

    //definizione stringa di testo
    $logIn=<<<"LOGIN"
    <h1>INSERISCI I DATI DI LOGIN</h1>
    <p>Dati: username = Mancio, password=20021</p> 

    <form method="POST" action="login.php">
        <label for="username" type="text">Username</label>
        <input type="text" name="username" placeholder="Inserire username" required/>
        <br/>
        <br/>
        <label for="password" type="password">Password</label>
        <input type="password" name="password" placeholder="Password" required/>
        <br/>
        <br/>
        <input type="submit" name="ACCEDI"/>
    </form>
    LOGIN;
    
    //controllo metodo post
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username = "Mancio"; 
        $password = "20021";
    
        //controllo validità password e username 
        if($_POST['username'] === $username && $_POST['password'] === $password) 
        {
            $_SESSION['username'] = $username;//salvataggio nome utente 
            header('Location: riservata.php');
            exit();
        } 
        else 
        {
            echo "<p>Le credenziali inserite sono errate! RIPROVA.</p> $logIn";
        }
    } 
    else
        echo $logIn;
    ?>
</body>
</html>