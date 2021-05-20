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

        $joukkue = $_GET['joukkue'];

        //hakee joukkueen tiedot URl:in perusteella
        try{
            $stmt = $conn->prepare("SELECT * FROM sarjataulukko WHERE joukkue LIKE :joukkue");
            $stmt->bindParam(':joukkue', $joukkue);
            if($stmt->execute() == false){
                echo 'Virhe';
            }else{
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }catch (PDOException $e){
            $data = array(
                'error' => 'Error'
            );
        }
    ?>

        <!-- laittaa kannasta saadut tiedot lomakkeeseen -->
    <h2>Tietojen päivittäminen</h2>
    <form action="update.php" method="post">
        Joukkueen nimi:<input type="text" name="joukkue" value="<?php echo $_GET['joukkue']; ?>"><br>
        Voitot:<input type="number" min="0" name="voitot" value="<?php echo $result['voitot'];?>"><br>
        Tasapelit:<input type="number"  min="0"name="tasapelit" value="<?php echo $result['tasapelit'];?>"><br>
        Tappiot:<input type="number" min="0" name="tappiot" value="<?php echo $result['tappiot'];?>"><br>
        <input type="submit" value="Päivitä" name="paivita">
    </form>

    <a href="nt4e.php">Takaisin</a>

    <?php
    
        if(isset($_POST['paivita'])){
            paivitaTiedot($conn);
            //kun painaa päivätä nappia kutsuu funktiota
        }

        function paivitaTiedot($conn){

            include_once("pdo_connect.php");
            //saa muuttujat lomakkeelta
            $joukkue = $_POST['joukkue'];
            $voitot = $_POST['voitot'];
            $tasapelit = $_POST['tasapelit'];
            $tappiot = $_POST['tappiot'];

            //laitta  uudet tiedot kantaan
            try{
                $stmt = $conn->prepare("UPDATE sarjataulukko SET joukkue = :joukkue, voitot = :voitot, tasapelit = :tasapelit, tappiot = :tappiot WHERE joukkue LIKE :joukkue");
                $stmt->bindParam(':joukkue', $joukkue);
                $stmt->bindParam(':voitot', $voitot);
                $stmt->bindParam(':tasapelit', $tasapelit);
                $stmt->bindParam(':tappiot', $tappiot);

                if($stmt->execute() == false){
                    echo 'Virhe';
                }else{
                    // ohjaa takaisin, jos kanna päivittäminen onnistuu
                   header("location: nt4e.php");
                }
            }catch (PDOException $e)   {
                $data = array(
                    'error' => 'Error'
                );
            }
        }
    
    ?>
</body>
</html>