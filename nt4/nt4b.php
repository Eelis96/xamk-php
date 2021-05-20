<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Joukkueen tietojan hakeminen</h2>
    <form action="nt4b.php" method="post">
        Joukkueen Nimi:<input type="text" name="joukkue">
        <input type="submit" value="Etsi" name="etsi">
    </form>

<?php

    if(isset($_POST['etsi'])){
        etsiJoukkue();
    }

    function etsiJoukkue(){

        if(empty($_POST['joukkue'])){
            return;
        }else{

            include_once("pdo_connect.php");
            //poistaa kaiken tyhjän oikealta puolelta
            $joukkue = rtrim(htmlspecialchars($_POST['joukkue']));

            //hakee tiedot tietokannasta
            try{
                $stmt = $conn->prepare("SELECT * FROM sarjataulukko WHERE joukkue LIKE :joukkue");
                $stmt->bindParam(':joukkue', $joukkue);
                if($stmt->execute() == false){
                    echo 'Virhe';
                }else{
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    //jos joukkuetta ei löydy palaa takaisin
                    if(empty($result)){
                        header('location: nt4b.php');
                    }
                }
            }catch (PDOException $e)   {
                $data = array(
                    'error' => 'Error'
                );
            }

            //laskee ottelut ja pisteet
            $ottelut = $result['voitot'] + $result['tappiot'] + $result['tasapelit'];
            $pisteet = $result['voitot'] * 3 + $result['tasapelit'];
            //tulostaa joukkueen tiedot
            echo '<table style="width:100%">
                <tr>
                    <th>Joukkue</th>
                    <th>Ottelut</th>
                    <th>Voitot</th> 
                    <th>Tasapelit</th>
                    <th>Tappiot</th>
                    <th>Pisteet</th>
                </tr>
                <tr>
                    <td>' . $result['joukkue'] . '</td>
                    <td>' . $ottelut . '</td>
                    <td>' . $result['voitot'] . '</td>
                    <td>' . $result['tasapelit'] . '</td>
                    <td>' . $result['tappiot'] . '</td>
                    <td>' . $pisteet . '</td>
                </tr>
            </table>';
        }
    }
    ?>
</body>
</html>