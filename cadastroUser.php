<?php

    include './cnx_museu.php';

    if(!empty($_POST)){

        $email = $_POST['email'];
        $username = $_POST['username'];
        $senha = $_POST['senha'];

        $conn = getConnection();

        $sql = 'SELECT * FROM Usuarios WHERE email = :email';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $count = $stmt->rowCount();

        if($count > 0){
            echo '<div class="alert alert-danger">
                <strong>Erro no cadastro!</strong> Email de usuário já cadastrado.
                </div>';
        }else{
            $sql2 = 'INSERT INTO Usuarios (email, username, senha) VALUES(:email, :username, :senha)';
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bindParam(':email', $email);
            $stmt2->bindParam(':username', $username);
            $stmt2->bindParam(':senha', $senha);

            if($stmt2->execute()){
                echo '<div class="alert alert-success">
                    <strong>Castrado realizado!</strong> Usuário cadastrado com sucesso.
                    </div>';
            }else{
                echo '<div class="alert alert-danger">
                    <strong>Erro no cadastro!</strong> Falha no banco de dados.
                    </div>';
            }
        }
    }else{
        //header("Location:./");
    }

?>