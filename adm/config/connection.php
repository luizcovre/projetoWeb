<?php
    if(!defined("A1B2C3")){
        die("Erro: Página não encontrada!<br>");
    }
    
    $dbhost = DBHOST;
    $dbuser = DBUSER;
    $dbpass = DBPASS;
    $dbname = DBNAME;
    $dbport = DBPORT;

    $conn = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpass, $dbname);

    if($conn){
        echo "conectou";
    }else{
        die("erro, tente novamente");
    }
?>