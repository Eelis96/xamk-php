<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Kirjautuminen</h2>
    <!-- jos on kirjautunut näyttää tunnuksen -->
    <?php if(isset($_SESSION['tunnus'])): ?>
        <p>Olet kirjautunut käyttäjällä: <?php echo $_SESSION['tunnus']; ?></p>
    <?php endif; ?>
    <a href="register.php">Rekisteröityminen</a><br><br>

    <form action="index.php" method="post">
        Tunnus:<input type="text" name="tunnus"><br>
        Salasana:<input type="password" name="salasana"><br>
        <!-- jos on kirjautunut kirjaudu napin sijaan on kirjaudu ulos nappi -->
        <?php if(isset($_SESSION['logged_in'])): ?>
            <input type="submit" value="Kirjaudu Ulos" name="kirjaudu-ulos">
        <?php endif; ?>
        <!-- jos ei ole kirjautunut on kirjaudu nappi -->
        <?php if(!isset($_SESSION['logged_in'])): ?>
            <input type="submit" value="Kirjaudu" name="kirjaudu">
        <?php endif; ?>
    </form>

    <?php if(isset($_SESSION['logged_in'])): ?>
        <a href="sarjataulukko.php">Sarjataulukko</a>
    <?php endif; ?>

    <?php
    
            //kun painaa kirjaudu nappia kutsuu funktiota 
        if(isset($_POST['kirjaudu'])){
            kirjauduSisaan();
        }

        //kun painaa kirjaudu ulos nappia menee logout.php sivulle ja kirjautuu ulos
        if(isset($_POST['kirjaudu-ulos'])){
            header('location: logout.php');
        }

        function kirjauduSisaan(){

            //jos salasana tai tunnus tyhjä funktio ei tee mitään
            if(empty($_POST['salasana']) || empty($_POST['tunnus'])){
                return;
            }
            
            //tietokanta yhteys
            include_once("pdo_connect.php");

            //poistaa muuttujista turhan välilyönnit
            $tunnus = rtrim(htmlspecialchars($_POST['tunnus']));
            $salasana = trim(htmlspecialchars($_POST['salasana']));

            //hakee tiedot tietokannasta
            $stmt = $conn->prepare("SELECT tunnus, salasana FROM tunnukset WHERE tunnus=:tunnus");
            $stmt->bindParam(':tunnus', $tunnus);
            if($stmt->execute() == false){
                echo'virhe';
            }else{
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result == false){
                    echo 'Käyttäjätunnus ei löytynyt';
                }else{
                    //tarkistaa, että salasana täsmää
                    if(password_verify($salasana, $result['salasana']) == false){
                        echo 'salasana ei täsmää';
                    }else{
                        //asettaa session muuttujat ja lataa sivun uudelleen, jotta kirjaudu ulos nappi toimii
                        $_SESSION['logged_in'] = true;
                        $_SESSION['tunnus'] = $result['tunnus'];
                        echo 'Kirjautuminen onnistui';
                        header("refresh:0");
                    }
                }
            }
        }
    ?>
</body>
</html>