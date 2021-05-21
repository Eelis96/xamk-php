<?php
    session_start();
    //jos on jo kirjautunut menee takaisin etusivulle
    if(isset($_SESSION['logged_in'])){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Rekisteröityminen</h2>
    <a href="index.php">Kirjautuminen</a><br><br>

    <form action="register.php" method="post">
        Tunnus:<input type="text" name="tunnus"><br>
        Salasana:<input type="password" name="salasana"><br>
        <input type="submit" value="Rekisteröidy" name="rekisteroidy">
    </form>
    
    <?php
    
        //kun painaa nappia kutsuu funcktiota
        if(isset($_POST['rekisteroidy'])){
            rekisteroiKayttaja();
        }

        function rekisteroiKayttaja(){

            //jos kentät tyhjiä ei tee mitään
            if(empty($_POST['salasana']) || empty($_POST['tunnus'])){
                return;
            }

            include_once("pdo_connect.php");

            try{
                $salasana = password_hash(htmlspecialchars($_POST['salasana']), PASSWORD_DEFAULT);
                $tunnus = $_POST['tunnus'];

                //katsoo onko käyttäjänimi varattu
                $stmt = $conn->prepare("SELECT tunnus FROM tunnukset WHERE tunnus=:tunnus");
                $stmt->bindParam(':tunnus', $tunnus);
                if($stmt->execute() == false){
                    echo 'virhe';
                }else{
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($result['tunnus'] == $tunnus){
                        echo'Tuo käyttäjänimi on varattu';
                    }else{
                        //lisää käyttäjän tietokantaan
                        $stmt = $conn->prepare("INSERT INTO tunnukset (tunnus, salasana) VALUES (:tunnus, :salasana)");
                        $stmt->bindParam(':tunnus', $tunnus);
                        $stmt->bindParam(':salasana', $salasana);

                        if($stmt->execute() == false){
                            echo 'virhe';
                        }else{
                            //palaa etusivulle jos rekisteröityminen
                            header('location: index.php');
                        }
                    }
                }
            }catch (PDOException $e){
                $data = array(
                    'error' => 'error'
                );
            }
        }
       
    
    ?>
</body>
</html>