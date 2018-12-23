<?php

	include './conexao_museu.php';
	
	if(!empty($_POST)){
		$conn = getConnection();
		
		$id_peca = $_POST['id_peca'];
		
		echo $id_peca;

		salvarDesenhosTecnicos($conn, $id_peca);
		
		salvarFotografias($conn, $id_peca);
		
		salvarFotosDetalhes($conn, $id_peca);
		
		//session_start();
		//$_SESSION['id_peca'] = $id_peca;
		//header("Location: cadastroRoupa.php");
	}
	else{
		echo "POST VAZIO";
	}
	
	function salvarDesenhosTecnicos($conn, $id_peca){
		
		// Count # of uploaded files in array
		$total = count($_FILES['desenhos_tecnicos']['name']);
		
		// Loop through each file
		for( $i=0 ; $i < $total ; $i++ ) {

			//Get the temp file path
			//$tmpFilePath = $_FILES['desenhos_tecnicos']['tmp_name'][$i];
			
			// File upload path
			$targetDir      = "img/";
			$fileName       = basename($_FILES['desenhos_tecnicos']["name"][$i]);
			$fileNameNew    = time();
			$targetFilePath = $targetDir . $fileName;
			$fileType       = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
			$newFilePath = $targetDir.$fileNameNew.".".$fileType;
		
			if(!empty($_FILES['desenhos_tecnicos']["name"][$i])){
				// Allow certain file formats
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				if(in_array($fileType, $allowTypes)){
					// Upload file to server
					if(move_uploaded_file($_FILES['desenhos_tecnicos']["tmp_name"][$i], $newFilePath)){
			
						$conn = getConnection();
					
					
						$sql = 'INSERT INTO desenhos_tecnicos (id_peca, 
			                                                   nome_imagem) VALUES(:id_peca, 
											                                       :nome_imagem)';
															
		
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':id_peca'    , $id_peca);
						$stmt->bindParam(':nome_imagem', $newFilePath);
			
						if($stmt->execute()){
							$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
						}
						else{
							$statusMsg = "File upload failed, please try again.";
						}
					}else{
						$statusMsg = "Sorry, there was an error uploading your file.";
					}
				}else{
					$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
				}
			}else{
				$statusMsg = 'Please select a file to upload.';
			}

			// Display status message
			echo $statusMsg;
			
		}
	}
	
	function salvarFotografias($conn, $id_peca){
		// Count # of uploaded files in array
		$total = count($_FILES['fotografias']['name']);
		
		// Loop through each file
		for( $i=0 ; $i < $total ; $i++ ) {

			//Get the temp file path
			//$tmpFilePath = $_FILES['desenhos_tecnicos']['tmp_name'][$i];
			
			// File upload path
			$targetDir      = "img/";
			$fileName       = basename($_FILES['fotografias']["name"][$i]);
			$fileNameNew    = time();
			$targetFilePath = $targetDir . $fileName;
			$fileType       = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
			$newFilePath = $targetDir.$fileNameNew.".".$fileType;
		
			if(!empty($_FILES['fotografias']["name"][$i])){
				// Allow certain file formats
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				if(in_array($fileType, $allowTypes)){
					// Upload file to server
					if(move_uploaded_file($_FILES['fotografias']["tmp_name"][$i], $newFilePath)){
			
						$conn = getConnection();
					
					
						$sql = 'INSERT INTO fotografias (id_peca, 
			                                             nome_imagem) VALUES(:id_peca, 
											                                 :nome_imagem)';
															
		
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':id_peca'    , $id_peca);
						$stmt->bindParam(':nome_imagem', $newFilePath);
			
						if($stmt->execute()){
							$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
						}
						else{
							$statusMsg = "File upload failed, please try again.";
						}
					}else{
						$statusMsg = "Sorry, there was an error uploading your file.";
					}
				}else{
					$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
				}
			}else{
				$statusMsg = 'Please select a file to upload.';
			}

			// Display status message
			echo $statusMsg;
			
		}
	}
	
	function salvarFotosDetalhes($conn, $id_peca){
		// Count # of uploaded files in array
		$total = count($_FILES['fotos_detalhes']['name']);
		
		// Loop through each file
		for( $i=0 ; $i < $total ; $i++ ) {

			//Get the temp file path
			//$tmpFilePath = $_FILES['desenhos_tecnicos']['tmp_name'][$i];
			
			// File upload path
			$targetDir      = "img/";
			$fileName       = basename($_FILES['fotos_detalhes']["name"][$i]);
			$fileNameNew    = time();
			$targetFilePath = $targetDir . $fileName;
			$fileType       = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
			$newFilePath = $targetDir.$fileNameNew.".".$fileType;
		
			if(!empty($_FILES['fotos_detalhes']["name"][$i])){
				// Allow certain file formats
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				if(in_array($fileType, $allowTypes)){
					// Upload file to server
					if(move_uploaded_file($_FILES['fotos_detalhes']["tmp_name"][$i], $newFilePath)){
			
						$conn = getConnection();
					
					
						$sql = 'INSERT INTO fotos_detalhes (id_peca, 
			                                                nome_imagem) VALUES(:id_peca, 
											                                    :nome_imagem)';
															
		
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':id_peca'    , $id_peca);
						$stmt->bindParam(':nome_imagem', $newFilePath);
			
						if($stmt->execute()){
							$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
						}
						else{
							$statusMsg = "File upload failed, please try again.";
						}
					}else{
						$statusMsg = "Sorry, there was an error uploading your file.";
					}
				}else{
					$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
				}
			}else{
				$statusMsg = 'Please select a file to upload.';
			}

			// Display status message
			echo $statusMsg;
			
		}
	}
?>