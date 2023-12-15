<!DOCTYPE html>

    <head>
        <title> Pagina login </title>
    </head>

    <body>
        <?php 
            $user=$_POST["user"];
            $pass=$_POST["pass"];

            if($user!="Mancio" || $pass!="Admin")
            {
                echo "<h2> Nome utente o password errati. </h2>";
            } 
            else 
            {
                echo "<h2> Benvenuto nell'area personale! </h2>";
            }
        ?>
    </body>
</html>
