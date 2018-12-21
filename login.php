<?php

    include './cnx_museu.php';

    if(!empty($_POST)){

        $username = $_POST['username'];
        $senha    = $_POST['senha'];

        $conn = getConnection();

        $sql = 'SELECT * FROM usuarios WHERE username = :username AND senha = :senha';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $count = $stmt->rowCount();

        if($count > 0){
            setcookie("username", $username);
            echo "OK";
        }else{
            echo "Erro1";
        }
    }else{
        //header("Location: ");
    }
?>
