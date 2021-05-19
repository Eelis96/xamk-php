<?php
    
        class Tuoterivi{

            private $tuotekoodi;
            private $hinta;
            private $maara;
            private $loppuhinta;
            
            function asetaTuoteKoodi($t){
                $this->tuotekoodi = $t;
            }

            function asetaHinta($h){
                $this->hinta = $h;
            }

            function asetaMaara($m){
                $this->maara = $m;
            }

            function laskeHinta(){
               $this->loppuhinta = $this->maara * $this->hinta;
               return $this->loppuhinta;
            }

            function haeTuotekoodi(){
                return $this->tuotekoodi;
            }
        }

    
    
?>