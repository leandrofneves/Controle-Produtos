<?php
    $server = 'localhost';
    $user = 'root';
    $password = 'tt333'; 
    $bd = 'produtos';
    $connection = mysqli_connect($server,$user,$password,$bd)or die('Não foi possivel conectar');
    mysqli_set_charset($connection, 'utf8');
?>