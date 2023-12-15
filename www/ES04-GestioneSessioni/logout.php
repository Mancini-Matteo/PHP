<?php
    //inizio sessione
    session_start();   

    //chiude la sessione 
    session_destroy(); 
    header('Location: login.php'); //riporta alla pagina Login
exit;
?>