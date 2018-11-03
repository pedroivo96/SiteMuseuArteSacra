<?php

	include './cnx_museu.php';
	
	if(!empty($_POST)){
		$conn = getConnection();
		
		$idPeca = $_POST['idPeca'];
		
		echo $idPeca;

		salvarDesenhoTecnico($conn, $idPeca);
		
		salvarFotografia($conn, $idPeca);
		
		salvarFotosDetalhes($conn, $idPeca);
		
		$_SESSION['idPeca'] = $idPeca;
		header("Location: cadastroRoupa.php");
	}
	else{
		echo "POST VAZIO";
	}
	
	function salvarDesenhoTecnico($conn, $idPeca){
		
		// Count # of uploaded files in array
		$total = count($_FILES['desenhoTecnico']['name']);
		
		// Loop through each file
		for( $i=0 ; $i < $total ; $i++ ) {

			//Get the temp file path
			//$tmpFilePath = $_FILES['desenhoTecnico']['tmp_name'][$i];
			
			// File upload path
			$targetDir      = "img/";
			$fileName       = basename($_FILES['desenhoTecnico']["name"][$i]);
			$fileNameNew    = time();
			$targetFilePath = $targetDir . $fileName;
			$fileType       = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
			$newFilePath = $targetDir.$fileNameNew.".".$fileType;
		
			if(!empty($_FILES['desenhoTecnico']["name"][$i])){
				// Allow certain file formats
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				if(in_array($fileType, $allowTypes)){
					// Upload file to server
					if(move_uploaded_file($_FILES['desenhoTecnico']["tmp_name"][$i], $newFilePath)){
			
						$conn = getConnection();
					
					
						$sql = 'INSERT INTO desenhos_tecnicos (idPeca, 
			                                                   nomeImagem) VALUES(:idPeca, 
											                                      :nomeImagem)';
															
		
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':idPeca'    , $idPeca);
						$stmt->bindParam(':nomeImagem', $newFilePath);
			
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
	
	function salvarFotografia($conn, $idPeca){
		// Count # of uploaded files in array
		$total = count($_FILES['fotografia']['name']);
		
		// Loop through each file
		for( $i=0 ; $i < $total ; $i++ ) {

			//Get the temp file path
			//$tmpFilePath = $_FILES['desenhoTecnico']['tmp_name'][$i];
			
			// File upload path
			$targetDir      = "img/";
			$fileName       = basename($_FILES['fotografia']["name"][$i]);
			$fileNameNew    = time();
			$targetFilePath = $targetDir . $fileName;
			$fileType       = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
			$newFilePath = $targetDir.$fileNameNew.".".$fileType;
		
			if(!empty($_FILES['fotografia']["name"][$i])){
				// Allow certain file formats
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				if(in_array($fileType, $allowTypes)){
					// Upload file to server
					if(move_uploaded_file($_FILES['fotografia']["tmp_name"][$i], $newFilePath)){
			
						$conn = getConnection();
					
					
						$sql = 'INSERT INTO fotografia (idPeca, 
			                                            nomeImagem) VALUES(:idPeca, 
											                               :nomeImagem)';
															
		
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':idPeca'    , $idPeca);
						$stmt->bindParam(':nomeImagem', $newFilePath);
			
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
	
	function salvarFotosDetalhes($conn, $idPeca){
		// Count # of uploaded files in array
		$total = count($_FILES['fotosDetalhes']['name']);
		
		// Loop through each file
		for( $i=0 ; $i < $total ; $i++ ) {

			//Get the temp file path
			//$tmpFilePath = $_FILES['desenhoTecnico']['tmp_name'][$i];
			
			// File upload path
			$targetDir      = "img/";
			$fileName       = basename($_FILES['fotosDetalhes']["name"][$i]);
			$fileNameNew    = time();
			$targetFilePath = $targetDir . $fileName;
			$fileType       = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
			$newFilePath = $targetDir.$fileNameNew.".".$fileType;
		
			if(!empty($_FILES['fotosDetalhes']["name"][$i])){
				// Allow certain file formats
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				if(in_array($fileType, $allowTypes)){
					// Upload file to server
					if(move_uploaded_file($_FILES['fotosDetalhes']["tmp_name"][$i], $newFilePath)){
			
						$conn = getConnection();
					
					
						$sql = 'INSERT INTO fotos_detalhes (idPeca, 
			                                                nomeImagem) VALUES(:idPeca, 
											                                   :nomeImagem)';
															
		
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':idPeca'    , $idPeca);
						$stmt->bindParam(':nomeImagem', $newFilePath);
			
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