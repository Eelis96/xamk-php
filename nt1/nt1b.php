<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>QueryString</h2>
    <h3>Kirjoita osoitekentän perään "?merkki=(autonmerkki)&vuosimalli=(vuosimalli)"</h3>
    <?php
        //hakee muuttujat url:ista
        $vuosimalli = $_GET['vuosimalli'];
        $merkki = $_GET['merkki'];

        if(empty($vuosimalli)||empty($merkki)){
            die();
        }else{
            echo "Auton merkki on: " .$merkki. " ja vuosimalli on: " ,$vuosimalli; 
        }
    ?>
</body>
</html>