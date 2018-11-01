<?php
	include './cnx_museu.php';

    if(!empty($_POST)){

        $idpeca   = $_POST['idpeca'];
		$ficha    = $_POST['ficha'];
        $conn     = getConnection();
        
        switch($operacao){
            case 'fichaTecnica':
                inserirFichaTecnica($conn);
                break;
            case 'fichaCatalografica':
                inserirFichaCatalografica($conn);
                break;
            case 'fichaConservacao':
                inserirFichaConservacao($conn);
                break;
            case 'fichaVisualizacao':
                inserirVisualizacao($conn);
                break;
            case 'fichaEnglish':
                inserirEnglishFields($conn);
                break;
        }

        $conn = null;
    }
	
	function buscarFichaTecnica($conn, $idpeca){
		
		$sql = 'SELECT * FROM ficha_tecnica WHERE id_peca = :id_peca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':id_peca', $idpeca);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				
			}
		}
	}
	
	function buscarFichaCatalografica($conn, $idpeca){
		
		$sql = 'SELECT * FROM ficha_catalografica WHERE id_peca = :id_peca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':id_peca', $idpeca);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				
			}
		}
	}
	
	function buscarFichaConservacao($conn, $idpeca){
		
		$sql = 'SELECT * FROM ficha_conservacao WHERE id_peca = :id_peca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':id_peca', $idpeca);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				
			}
		}
	}
	
	function buscarFichaVisualizacao($conn, $idpeca){
		
		$sql = 'SELECT * FROM visualizacao WHERE id_peca = :id_peca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':id_peca', $idpeca);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				
			}
		}
	}
	
	function buscarFichaEnglish($conn, $idpeca){
		
		$sql = 'SELECT * FROM english_fields WHERE id_peca = :id_peca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':id_peca', $idpeca);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				
			}
		}
	}
?>