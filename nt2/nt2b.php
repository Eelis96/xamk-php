<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Taulukko</h2>

    <?php
    
        $taulukko[0] = 26;
        $taulukko[1] = 3;
        $taulukko[2] = 23;
        $taulukko[3] = 8;
        $taulukko[4] = 9;

        foreach($taulukko as $alkio){
            echo "$alkio<br>";
        }
        echo min($taulukko) . " Pienin<br><br>";
        echo max($taulukko) . " Suurin<br><br>";
        $keskiarvo = array_sum($taulukko) / sizeof($taulukko);
        echo $keskiarvo . " Keskiarvo";
    ?>
</body>
</html>