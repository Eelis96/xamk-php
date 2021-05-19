<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Laske Neliö</h2>

    <form action="nt3a.php" method="post">
        <input type="number" name="numero">
        <input type="submit" value="Laske" name="laske">
    </form>


    <?php

        function laskeNelio(){
            $numero = $_POST['numero'];
            $neliö = $numero * $numero;
            echo $neliö;  
        }

        //kun laske nappia painaa kutsuu funktiota
        if(isset($_POST['laske'])){
            laskeNelio();
        }
    ?>
</body>
</html>