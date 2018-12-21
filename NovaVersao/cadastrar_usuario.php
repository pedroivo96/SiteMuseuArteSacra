<?php

    include './conexao_museu.php';

    if(!empty($_POST)){

		$email        = $_POST['email'];
        $nome_usuario = $_POST['nome_usuario'];
        $senha        = $_POST['senha'];

        $conn = getConnection();

        $sql = 'SELECT * FROM usuarios WHERE nome_usuario = :nome_usuario OR email = :email';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nome_usuario', $nome_usuario);
        $stmt->bindValue(':email'       , $email);
        $stmt->execute();
        $count = $stmt->rowCount();

        if($count > 0){
			
			//Nome de usuário ou Email já cadastrado.
			echo "ERRO1";
			
        }else{
			
			$sql1 = 'INSERT INTO usuarios (email, nome_usuario, senha) VALUES(:email, :nome_usuario, :senha)';
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bindParam(':email'       , $email);
            $stmt1->bindParam(':nome_usuario', $nome_usuario);
            $stmt1->bindParam(':senha'       , $senha);

            if($stmt1->execute()){
                
				//Usuário cadastrado
				session_start();
				$_SESSION['nome_usuario'] = $nome_usuario;
				
				echo "OK";
				
            }else{
				
				//Falha no Banco de Dados.
                echo "ERRO";
            }
            
        }
    }else{
        //header("Location: ");
    }
?>
