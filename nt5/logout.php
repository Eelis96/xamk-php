<?php
//lopettaa session ja poistaa session muuttujien arvot
session_start();
session_destroy();
unset($_SESSION);
header('location: index.php');