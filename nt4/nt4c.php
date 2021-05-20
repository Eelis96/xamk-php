<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Joukkueen Lisäys</h2>
    <form action="nt4c.php" method="post">
        Joukkueen Nimi:<input type="text" name="joukkue">
        <input type="submit" value="Lisää" name="lisaa">
    </form>


    <?php
    
        if(isset($_POST['lisaa'])){
            lisaaJoukkue();
        }
    
        function lisaaJoukkue(){
            if(empty($_POST['joukkue'])){
                return;
            }else{
                include_once("pdo_connect.php");

                //poistaa kaiken tyhjän oikealta puolelta
                $joukkue = rtrim(htmlspecialchars($_POST['joukkue']));

                //lisä tiedot kantaan
                try{
                    $stmt = $conn->prepare("INSERT INTO sarjataulukko (joukkue) VALUES (:joukkue)");
                    $stmt->bindParam(':joukkue', $joukkue);

                    if($stmt->execute() == false){
                        echo 'Virhe';
                    }else{
                        echo"Lisätty";
                    }
                }catch (PDOException $e)   {
                    $data = array(
                        'error' => 'Error'
                    );
                }

            }
        }
    ?>




</body>
</html>