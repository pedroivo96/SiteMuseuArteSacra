<?php

    include './cnx_museu.php';

    if(!empty($_POST)){

        $username = $_POST['username'];
        $senha = $_POST['senha'];

        $conn = getConnection();

        $sql = 'SELECT * FROM Usuarios WHERE username = :username AND senha = :senha';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $count = $stmt->rowCount();

        if($count > 0){
            setcookie("username", $username);
            //header("Location:index.php");
            echo '<div class="alert alert-success">
                <strong>Successo!</strong> Usuário '.$_COOKIE["username"].' logado.
                </div>';
        }else{
            echo '<div class="alert alert-danger">
                <strong>Erro no login!</strong> Usuário não cadastrado.
                </div>';
        }
    }else{
        //header("Location: ");
    }
?>