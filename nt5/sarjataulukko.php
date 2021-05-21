<?php
    session_start();
    //jos ei ole kirjautunut menee takaisin etusivulle
    if(!isset($_SESSION['logged_in'])){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        include_once("pdo_connect.php");
        
        try{
            $stmt = $conn->prepare("SELECT * FROM sarjataulukko");
            //hakee tiedot tietokannasta
            if($stmt->execute() == false){
                echo 'Virhe';
            }else{
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch (PDOException $e)   {
            $data = array(
                'error' => 'Error'
            );
        }
        //otteluiden määrä
        $ottelut = $result[0]['voitot'] + $result[0]['tasapelit'] + $result[0]['tappiot'];
        //joukkueiden pisteet
        $pisteet_hjk = $result[0]['voitot'] * 3 + $result[0]['tasapelit'];
        $pisteet_kups = $result[1]['voitot'] * 3 + $result[1]['tasapelit'];
        $pisteet_ilves = $result[2]['voitot'] * 3 + $result[2]['tasapelit'];
        $pisteet_lahti = $result[3]['voitot'] * 3 + $result[3]['tasapelit'];
        
    ?>
    <table style="width:100%">
        <tr>
            <th>Joukkue</th>
            <th>Ottelut</th>
            <th>Voitot</th> 
            <th>Tasapelit</th>
            <th>Tappiot</th>
            <th>Pisteet</th>
        </tr>
        <tr>
            <td><?php echo $result[0]['joukkue'] ?></td>
            <td><?php echo $ottelut?></td>
            <td><?php echo $result[0]['voitot'] ?></td>
            <td><?php echo $result[0]['tasapelit'] ?></td>
            <td><?php echo $result[0]['tappiot'] ?></td>
            <td><?php echo $pisteet_hjk ?></td>
        </tr>
        <tr>
            <td><?php echo $result[1]['joukkue'] ?></td>
            <td><?php echo $ottelut?></td>
            <td><?php echo $result[1]['voitot'] ?></td>
            <td><?php echo $result[1]['tasapelit'] ?></td>
            <td><?php echo $result[1]['tappiot'] ?></td>
            <td><?php echo $pisteet_kups ?></td>
        </tr>
        <tr>
            <td><?php echo $result[2]['joukkue'] ?></td>
            <td><?php echo $ottelut?></td>
            <td><?php echo $result[2]['voitot'] ?></td>
            <td><?php echo $result[2]['tasapelit'] ?></td>
            <td><?php echo $result[2]['tappiot'] ?></td>
            <td><?php echo $pisteet_ilves ?></td>
        </tr>
        <tr>
            <td><?php echo $result[3]['joukkue'] ?></td>
            <td><?php echo $ottelut?></td>
            <td><?php echo $result[3]['voitot'] ?></td>
            <td><?php echo $result[3]['tasapelit'] ?></td>
            <td><?php echo $result[3]['tappiot'] ?></td>
            <td><?php echo $pisteet_lahti ?></td>
        </tr>
    </table>
    <a href="index.php">Etusivu</a>
</body>
</html>