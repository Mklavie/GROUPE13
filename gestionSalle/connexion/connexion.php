<?php
define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPASS","");
    define("DBNAME","gestionSalle");
    $dsn="mysql:dbname=".DBNAME.";dbhost=".DBHOST;
    try{
        $db=new PDO($dsn,DBUSER,DBPASS);
    }catch(PDOException $e){
        die($e ->getmessage());
    }
    ?>