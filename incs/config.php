<?php

$versao = "0.2";
$autor = "Ana Margarida";

$username = "root";
$password = "";
try{
    $db = new PDO("mysql:host-localhost;dbname=todo", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Falha na ligação à base de dados: " . $e->getMessage();
}

?>