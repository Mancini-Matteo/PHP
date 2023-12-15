<!DOCTYPE html>
<html>
<head>
    <title>Accesso area riservata Mancini</title>
</head>
<body>
    <?php
    // Controllo invio modulo
    if(isset($_POST['submit'])) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Verifica delle credenziali 
        if($username === 'Mancio' && $password === 'Admin') 
        {
            $message="Benvenuto, $username!";
        } 
        else
        {
            $message="Credenziali errate, accesso negato!";
        }
    }
    ?>

    <?php
    // Mostra il modulo di login solo se non ci sono messaggi di errore o se il modulo non è stato inviato correttamente. 
    if(empty($message) || !isset($_POST['submit']))
    {
    ?>
        <h4>Inserisci le tue credenziali per l'accesso all'area riservata</h4><br>
        <form name="frmLogin" method="POST">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" name="submit" value="Accedi">
        </form>
    <?php
    } 
    else 
    {
        // Messaggio di benvenutoi/errore
        echo "<p>$message</p>";

        // Ripropone il modulo di login in caso di errore
        if ($message === "Accesso negato. Credenziali errate.")
        {
    ?>
            <h4>Inserisci le tue credenziali per l'accesso all'area riservata</h4><br>
            <form name="frmLogin" method="POST">
                Username: <input type="text" name="username"><br>
                Password: <input type="password" name="password"><br>
                <input type="submit" name="submit" value="Accedi">
            </form>
    <?php
        }
    }
    ?>
</body>
</html>
