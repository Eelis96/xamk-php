<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h2>Mehuasema</h2>

        <form method="post" action="nt1.php">
            <h2>Litrahinta</h2><input type="number" step="0.01" min="0" name="hinta" placeholder="Litrahinta"><br>
            <h2>Litramäärä</h2><input type="number" step="0.01" min="0" name="maara" placeholder="Litramäärä"><br>
            <input type="submit" value="Laske">
        </form>

        <?php

            $hinta = $_POST['hinta'];
            $maara = $_POST['maara'];

            if(empty($hinta)||empty($maara)){
                // jos jompikumpi kentistä tyhjä ei tee mitään
                echo "Täytä kumpikin kenttä!";
            }else{
               $maksettava = $maara * $hinta;

               echo "Litrahinta: " .$hinta. " euroa<br>";
               echo "Litramäärä: " .$maara. " litraa<br>";
               echo "<strong>Maksettava: " .$maksettava. " euroa";
            }
        ?>
      
    </body>
</html>