<?php
include("luokat.php");

$tuote1 = new Tuoterivi();
$tuote2 = new Tuoterivi();
$tuote3 = new Tuoterivi();

$tuote1->asetaTuoteKoodi("maito");
$tuote2->asetaTuoteKoodi("mehu");
$tuote3->asetaTuoteKoodi("salaatti");

$tuote3->asetaMaara(2);
$tuote2->asetaMaara(1);
$tuote1->asetaMaara(10);

$tuote3->asetaHinta(4);
$tuote2->asetaHinta(27);
$tuote1->asetaHinta(13);

$ostoskori = array($tuote1, $tuote2, $tuote3);

foreach($ostoskori as $tuote){
    echo "Tuotekoodi: " . $tuote->haeTuotekoodi();
    echo "\n";
    echo "Hinta: " . $tuote->laskeHinta();
    echo "<br>";
}
?>