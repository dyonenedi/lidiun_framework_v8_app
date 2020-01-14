<?php
	Class Upload_Image 
	{
		private $errorMessage;
		private $name;
		private $origin;
		private $destination;

		public function execute($file, $pathProfile, $fill=false){
			if (isset($file['name']) && $file["error"] == 0) {			 
			    $file_temp = $file['tmp_name'];
			    $file = $file['name'];
			     
			    // Validate extension
			    $extention = strrchr($file, '.');
			    $extention = (!empty($extention)) ? strtolower($extention) : '.jpg';
			    if (strstr('.jpg;.jpeg;.gif;.png', $extention)) {
			        // Create a unike name
			        $this->name = substr(md5(microtime()), 0 , 14);
			        $this->origin = $pathProfile . $this->name . $extention;
			        $this->destination = $pathProfile . $this->name . '.jpg';
			        
		        	// Make file upload 
			        if (move_uploaded_file($file_temp, $this->origin)) {
			        	// Resize image proportionally
			        	$this->resize($this->origin, $this->destination, 300, 300);
			        	
			        	// Delete temp file
			        	if ($this->origin !=  $this->destination) {
			        		unlink($this->origin);
			        	}

			        	// Torn the image square
			        	if ($fill) {		        		
				        	$imageFill = New Image_Fill($this->destination, $this->destination);
							$imageFill->execute();
			        	}

						// Set permission in image
			        	chmod($this->destination, 0777);

			        	// Reply
			        	$this->errorMessage = "<%T_10_TR%>";
			            return true;
			        } else {
			            $this->errorMessage = "<%T_7_TR%>";
			            return false;
			        }
			    } else {
			       $this->errorMessage = "<%T_8_TR%>";
			       return false;
			    }
			} else {
			    $this->errorMessage = "<%T_9_TR%>";
			    return false;
			}
		}

		public function rmdir($path){
		    if ($dd = opendir($path)) {
		        while (false !== ($file = readdir($dd))) {
		            if ($file != "." && $file != "..") {
		                $target = $path . $file;
		                if (is_dir($target)) {
		                    $this->rmdir($target);
		                } else if(is_file($target)) {
		                	chmod($target, 0777);
		                	unlink($target);
		                }
		            }
		        }
		        closedir($dd);
		    }
		    rmdir($path);
		}

		public function resize($pathSource, $pathDest, $width, $height){
			list($width_orig, $height_orig, $tipo, $atributo) = getimagesize($pathSource);
			
			if ($width_orig > $height_orig) {
				$height = ($height_orig * $width) / $width_orig;
			} else {
				$width = ($width_orig * $height) / $height_orig;
			}

			$novaimagem = imagecreatetruecolor($width, $height);

			switch($tipo){
				// Se o tipo da imagem for gif
				case 1:
				// Obtém a imagem gif original
				$origem = imagecreatefromgif($pathSource);
				break;

				// Se o tipo da imagem for jpg
				case 2:
				// Obtém a imagem jpg original
				$origem = imagecreatefromjpeg($pathSource);
				break;

				// Se o tipo da imagem for png
				case 3:
				// Obtém a imagem png original
				$origem = imagecreatefrompng($pathSource);
				break;
			}

			// Copia a imagem original para a imagem com novo tamanho
			imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			// Envia a nova imagem jpg para o lugar da antiga
			imagejpeg($novaimagem, $pathDest, 100);
		}

		public function getErrorMessage(){
			return $this->errorMessage;
		}

		public function getName(){
			return $this->name;
		}

		public function getOrigin(){
			return $this->origin;
		}

		public function getDestination(){
			return $this->destination;
		}
	}