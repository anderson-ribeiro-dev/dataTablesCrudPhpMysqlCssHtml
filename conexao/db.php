<?php 
    // Abre conexão
    $connection = new PDO('mysql:dbname=saudevip;host=127.0.0.1;charset=UTF8', 'root', '');
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
?>