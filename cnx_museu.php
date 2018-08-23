<?php
    
    function getConnection(){
        $dsn = 'mysql:host=localhost;dbname=Museu';
        $user = 'root';
        $pass = 'zxcv';

        try{
            echo "antes";
            $pdo = new PDO($dsn, $user, $pass);
            echo "conectou";
            return $pdo;
        }catch(PDOException $ex){
            echo 'Erro: '.$ex->getMessage();
        }
    }
	
?>
