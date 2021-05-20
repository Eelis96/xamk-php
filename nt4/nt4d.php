<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Joukkueen Poistaminen</h2>
    <form action="nt4d.php" method="post">
        Joukkueen Nimi:<input type="text" name="joukkue">
        <input type="submit" value="Poista" name="poista">
    </form>


    <?php
    
        if(isset($_POST['poista'])){
            poistaJoukkue();
        }

        function poistaJoukkue(){

            if(empty($_POST['joukkue'])){
                return;
            }else{

                include_once("pdo_connect.php");

                //poistaa kaiken tyhjän oikealta puolelta
                $joukkue = rtrim(htmlspecialchars($_POST['joukkue']));

                try{
                    //poistaa kannasta
                    $stmt = $conn->prepare("DELETE FROM sarjataulukko WHERE joukkue LIKE :joukkue");
                    $stmt->bindParam('joukkue', $joukkue);

                    if($stmt->execute() == false){
                        echo 'Virhe';
                    }else{
                        echo 'Poistettu';
                    }

                }catch (PDOException $e){
                    $data = array(
                        'error' => 'error'
                    );
                }
            }
        }
    ?>
</body>
</html>