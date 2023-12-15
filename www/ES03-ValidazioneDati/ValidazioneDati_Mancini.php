<!DOCTYPE html>
<html>
<head>
    <title>Form per richiesta dei dati generici di un utente (Mancini)</title>
</head>
<body>
<?php
// Definizione delle variabili
$erroreNome = $erroreCognome = $erroreDataNascita = $erroreCodiceFiscale = $erroreEmail = $erroreNumTelefono = $erroreVia = $erroreCAP = $erroreComune = $erroreProvincia = $erroreNikname = $errorePassword = "";
$nome = $cognome = $dataNascita = $codiceFiscale = $email = $numTelefono = $via = $cap = $comune= $provincia = $nikname = $password = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Funzione di validazione
    function test_input($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validazione del nome
    if(empty($_POST["nome"])) 
    {
        $nome = test_input($_POST["nome"]);
        // Verifica se il nome contiene solo lettere e spazi
        if (!preg_match("/^[a-zA-Z ]*$/",$nome))
        {
            $erroreNome = "Il nome può contenere solo lettere e spazi";
        }
    }

    // Validazione del cognome
    if(empty($_POST["cognome"])) 
    {
        $cognome = test_input($_POST["cognome"]);
        // Verifica se il cognome contiene solo lettere, spazi e/o apostrofi
        if(!preg_match("/^[a-zA-Z' ]*$/",$cognome))
        {
            $erroreCognome = "Il cognome può contenere solo lettere, spazi e/o apostrofi";
        }
    }

    // Validazione della data di nascita
    if(empty($_POST["dataNascita"])) 
    {
        $dataNascita = test_input($_POST["dataNascita"]);
    }

    //Validazione codice fiscale
    if(empty($_POST["codiceFiscale"])) 
    {
        $codiceFiscale = test_input($_POST["codiceFiscale"]);
    }

    // Validazione dell'email
    if(empty($_POST["email"])) 
    {
        $email = test_input($_POST["email"]);
        // Verifica se l'indirizzo email è valido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $erroreEmail = "Inserisci un formato email valido";
        }
    }

    //Validazione numero di telefono
    if(empty($_POST["numTelefono"])) 
    {
        $numTelefono = test_input($_POST["numTelefono"]);
    }


    // Validazione della via
    if (empty($_POST["via"]))
    {
        $via = test_input($_POST["via"]);
    }

    // Validazione CAP
    if (empty($_POST["cap"]))
    {
        $cap = test_input($_POST["cap"]);
    }

    // Validazione comune
    if (empty($_POST["comune"]))
    {
        $comune = test_input($_POST["comune"]);
    }

    // Validazione provincia 
    if (empty($_POST["provincia"]))
    {
        $provincia = test_input($_POST["provincia"]);
    }

    //Validazione Nickname
    if(empty($_POST["nickname"])) 
    {
        if($nikname === $nome || $nikname === $cognome)
        {
            $erroreNikname = "Il nikname deve essere diverso dal nome e dal cognome!";
        }
        else
        {
            $nikname = test_input($_POST["nickname"]);
        }
    }

    //Validazione Password
    if(empty($_POST["password"])) 
    {
        if(!preg_match("/^(?=.*[A-Z])(?=.*[0-9](?=.*[^a-zA-Z0-9]).{8,}$/", $password))
        {
            $password = test_input($_POST["password"]);

        }
        else
        {
            $errorePassword = "La password deve contenere: -Minmo 8 caratteri <br> -Almeno una lettera maiuscola <br> -Almeno un numero <br> -Almeno un carattere speciale";
        }
    }

    // Mostra i dati inseriti o gli errori
    if ($erroreNome == "" || $erroreCognome == "" || $erroreDataNascita == "" || $erroreCodiceFiscale == "" || $erroreEmail == "" || $erroreNumTelefono == "" || $erroreVia == "" || $erroreCAP == "" || $erroreComune == "" || $erroreProvincia == "" || $erroreNikname == "" || $errorePassword == "")
    {
        echo "<h2>Riepilogo dei dati inseriti:</h2>";
        echo "Nome: " . $nome . "<br>";
        echo "Cognome: " . $cognome . "<br>";
        echo "Data di nascita: " . $dataNascita . "<br>";
        echo "Codie fiscale: " .$codiceFiscale . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Celulare: " . $numTelefono . "<br>";
        echo "Via: " . $via . "<br>";
        echo "CAP: " . $cap . "<br>";
        echo "Comune: " . $comune . "<br>";
        echo "Provincia: " . $provincia . "<br>";
        echo "Nikname: " . $nikname . "<br>";
        echo "Password: " . $password . "<br>";
    }
    else
    {
        // Mostra gli errori
        echo '<span class="error">Si prega di correggere gli errori seguenti:</span><br>';
        echo '<span class="error">' . $erroreNome . '</span><br>';
        echo '<span class="error">' . $erroreCognome . '</span><br>';
        echo '<span class="error">' . $erroreDataNascita . '</span><br>';
        echo '<span class="error">' . $erroreCodiceFiscale . '</span><br>';
        echo '<span class="error">' . $erroreEmail . '</span><br>';
        echo '<span class="error">' . $erroreNumTelefono . '</span><br>';
        echo '<span class="error">' . $erroreVia . '</span><br>';
        echo '<span class="error">' . $erroreCAP . '</span><br>';
        echo '<span class="error">' . $erroreComune . '</span><br>';
        echo '<span class="error">' . $erroreProvincia . '</span><br>';
        echo '<span class="error">' . $erroreNikname . '</span><br>';
        echo '<span class="error">' . $errorePassword . '</span><br>';
    }
}
?>

<h2>Form Anagrafica Utenti</h2>
<form method="post" action="<?=$_SERVER["PHP_SELF"];?>">
    Nome: <input type="text" name="nome" required><br><br>
    Cognome: <input type="text" name="cognome" required><br><br>
    Data di nascita: <input type="date" name="dataNascita" required><br><br>
    Codice Fiscale: <input type="text" name="codiceFiscale" ><br><br>
    Email: <input type="email" name="email" required><br><br>
    Numero di telefono: <input type="text" name="numTelefono" required><br><br>
    Via: <input type="text" name="via" required><br><br>
    CAP: <input type="text" name="cap" required><br><br>
    Comune: <input type="text" name="comune" required><br><br>
    Provincia: <input type="text" name="provincia" required><br><br>
    Nikname: <input type="text" name="nikname"><br><br>
    Password: <input type="text" name="password"><br><br>

    <input type="submit" name="submit" value="Invia">
</form>

</body>
</html>