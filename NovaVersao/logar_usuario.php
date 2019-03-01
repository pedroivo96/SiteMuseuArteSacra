<?php

    include './conexao_museu.php';

    if(!empty($_POST)){

        $nome_usuario = $_POST['nome_usuario'];
        $senha        = $_POST['senha'];

        $conn = getConnection();

        $sql = 'SELECT * FROM usuarios WHERE nome_usuario = :nome_usuario AND senha = :senha';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nome_usuario', $nome_usuario);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $count = $stmt->rowCount();

        if($count > 0){
			session_start();
            $_SESSION['nome_usuario'] = $nome_usuario;
            echo "OK";
        }else{
            echo "ERRO";
        }
    }else{
        //header("Location: ");
    }
?>
