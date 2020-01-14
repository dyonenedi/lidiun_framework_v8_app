<?php
	use lidiun_framework_v7\App;
	use lidiun_framework_v7\Request;

	use lidiun_framework_v7_app\Model\User;
	use lidiun_framework_v7_app\Model\Recover;

	Class Recover_controller
	{
		public function index() {
			$view = [];

			// IF POST FORM
			if (!empty($_POST['email'])) {
				$email = addslashes(strtolower($_POST['email']));

				$User = new User();
				$id = $User->getByEmail($email);

				if ($id) {
					Recover::setEmail($email);
					if (Recover::generateToken()){
						$name = $User->getNameById($id);			
						if (Recover::sendEmail($name)) {
							$view['message']['type'] = 'success';
							$view['message']['text'] = 'Um link de recuperação de senha foi enviado para o E-mail da conta.';
						} else {
							$view['message']['type'] = 'danger';
							$view['message']['text'] = 'Erro ao enviar E-mail de recuperação de senha!';
						}
					} else {
						$view['message']['type'] = 'danger';
						$view['message']['text'] = 'Erro ao gerar Token!';
					}
				} else {
					$view['message']['type'] = 'danger';
					$view['message']['text'] = 'E-mail não cadastrado!';
				}
			}

			App::setView($view);
		}

		public function recovering() {
			$view = ['token', 'email'];

			// IF PARAMETER
			$param = Request::getParameter();
			if (!empty($param[0]) && !empty($param[1])) {
				$view['token'] = $param[0];
				$view['email'] = $param[1];
				$token = addslashes($param[0]);
				$email = addslashes($param[1]);

				Recover::setToken($token);
				Recover::setEmail($email);
				if (Recover::validateToken()) {				
					// IF POST FORM
					if (!empty($_POST['senha'])) {
						$senha = addslashes($_POST['senha']);
						$password = Encrypt::encodePassword($senha);

						$User = new User();
						if ($User->resetPassword($email, $password)) {
							Recover::removeToken();

							$id = $User->getByEmailSenha($email, $password);
							Auth::login($id, true);
							Request::redirectTo('home');
						} else {
							$view['message']['type'] = 'danger';
							$view['message']['text'] = 'Erro ao alterar senha!';
						}
					}
				} else {
					$view['message']['type'] = 'danger';
					$view['message']['text'] = 'Token inválido! Tente gerá-lo novamente!';
				}
			} else {
				$view['message']['type'] = 'danger';
				$view['message']['text'] = 'Token e E-mail são obrigatórios!';
			}

			App::setView($view);			
		}
	}