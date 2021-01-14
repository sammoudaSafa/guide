<?php
function connect(){
    $servername = 'localhost';
    $dbname='garon';
    $username = 'root';
    $password = 'root';
    $options=[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try{
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,$options);       
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        echo "Connected";
        return $pdo;
        
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }


}   
?>
