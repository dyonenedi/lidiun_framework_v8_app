<?php
	Class Treat_Data 
	{	
		private $validated = true;
		private $error = [];

		public $data = [];

		public function prepare($data, $extracts, $rules=[], $treatments=[]){
			if (!empty($data) && is_array($data) && !empty($extracts) && is_array($extracts)) {
				foreach ($extracts as $extract) {
					if (isset($data[$extract])) {
						$value = $data[$extract];
						foreach ($rules as $rule) {
							if (method_exists($this, $rule)) {
								$this->$rule($value);
							}
						}
						foreach ($treatments as $treatment) {
							$value = $treatment($value);
						}

						$this->data[$extract] = $value;
					} else {
						$this->validated = false;
						$this->error['The '.$extract.' is required'][] = '!';
					}
				}
			}
		}

		public function isValid(){
			return $this->validated;
		}

		public function getError(){
			$error = "Follow the errors: ";
			foreach ($this->error as $index => $data) {
				if (!empty($data)) {
					$data   = implode(', ', $data);
					$error .= $index . ': ' . $data .'. ';
				}
			}

			return $error;
		}

		/////////////////////////// VALIDATE METHODS ///////////////////////////

		private function required($data){
			if (!isset($data)) {
				$this->validated = false;
				$this->error['Required'][] = $data;
			}
		}

		private function email($data){
			if (!preg_match('/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+.([a-zA-Z]{2,4})$/', $data)) {
				$this->validated = false;
				$this->error['The Email is not valid'][] = $data;
			}
		}

		private function user($data){
			if (!preg_match('/^[a-zA-Z\._-]{4,28}$/i', $data)) {
				$this->validated = false;
				$this->error['The user is not valid'][] = $data;
			}
		}

		private function name($data){
			if (!preg_match('/^[a-zA-Z\d\s]{3,28}$/i', $data)) {
				$this->validated = false;
				$this->error['The name is not valid'][] = $data;
			}
		}

		private function password($data){
			if (!preg_match('/^([a-zA-Z0-9\d@#$%&]){4,28}$/i', $data)) {
				$this->validated = false;
				$this->error['The password is not valid'][] = '4 to 28 charsets including this: @#$%&';
			}
		}

		private function phone($data){
			if (!preg_match('/^[\(]?[0-9]{2}[\)]?[\s]?[0-9]{4}[\-]?[0-9]{4,5}$/', $data)) {
				$this->validated = false;
				$this->error['The phone is not valid'][] = $data;
			}
		}	

		private function data($data){
			if (!preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $data)) {
				$this->validated = false;
				$this->error['The date is not valid'][] = $data;
			}
		}

		private function boolean($data){
			$data = (boolean)$data;
			if ($data !== true && $data !== false) {
				$this->validated = false;
				$this->error['The boolean is not valid'][] = '!';
			}
		}

		private function string($data){
			if (!preg_match('/^[a-zA-Z]*$/', $data)) {
				$this->validated = false;
				$this->error['The string is not valid'][] = $data;
			}
		}

		private function number($data){
			if (!preg_match('/^[0-9]*$/', $data)) {
				$this->validated = false;
				$this->error['The number is not valid'][] = $data;
			}
		}
	}