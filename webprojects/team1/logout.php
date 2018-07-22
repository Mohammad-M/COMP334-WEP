<?php
session_start();
   $main='main.php';
    session_destroy();
    header('Location: '.$main);
    ?>