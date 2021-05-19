<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Tarkasta Ikä</h2>
    <form action="nt3b.php" method="post">
        <input type="number" name="ika">
        <input type="submit" value="tarkista" name="tarkista">
    </form>

    <?php
    
        //kutsuu funktiota kun painaa tarkista nappia
        if(isset($_POST['tarkista'])){
            tarkastaIka();
        }
    
        function tarkastaIka(){
            $ika = $_POST['ika'];
            if($ika >= 18){
                echo "Täysi-ikäinen";
            }else{
                echo "Alaikäinen";
            }
        }
        
    
    ?>
</body>
</html>