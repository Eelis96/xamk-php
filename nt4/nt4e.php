<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Joukkueen tietojen päivittäminen</h2>
    

    <?php
    
        include_once("pdo_connect.php");
        //hakee joukkueet kannasta
        try{
            $stmt = $conn->prepare("SELECT joukkue FROM sarjataulukko");
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
        // tulostaa joukkueet
        $i = 0;
        foreach($result as $joukkue){
            echo '<a href="update.php?joukkue=' .$result[$i]['joukkue']. '">' .$result[$i]['joukkue']. '</a><br>';
            $i++;
        }



    ?>


</body>
</html>