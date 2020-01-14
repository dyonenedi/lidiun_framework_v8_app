<?php
	use Lidiun_Framework_v7\App;
	use Lidiun_Framework_v7\Request;
	use Lidiun_Framework_v7\Conf;
	
	use lidiun_framework_v7_app\Model\User;
	use lidiun_framework_v7_app\Model\Recover;

	Class User_controller
	{
		public function index() {
			$view = [];

			App::setView($view);
		}

		public function login() {
			$view = [];

			// VALIDATE LOGGED
			Auth::requireLogout();

			if (isset($_POST['email'])) {
				if (!empty($_POST['email']) && !empty($_POST['senha'])) {
					$User = New User;
					
					$email = addslashes(strtolower($_POST['email']));
					$senha = addslashes($_POST['senha']);

					
					$password = Encrypt::encodePassword($senha);

					$id = $User->getByEmailSenha($email, $password);
					if ($id) {
						Auth::login($id, true);
					} else {
						$view['message']['type'] = 'danger';
						$view['message']['text'] = 'E-mail e Senha incorretos';
					}
				} else {
					$view['message']['type'] = 'danger';
					$view['message']['text'] = 'E-mail e Senha são obrigatórios';
				}
			}

			App::setView($view);
		}

		public function logout() {
			// VALIDATE LOGGED
			Auth::requireLogin();

			Auth::logout();
		}

		public function register() {
			$view = [];

			// VALIDATE LOGGED
			Auth::requireLogout();

			if (isset($_POST['email'])) {
				if (!empty($_POST['email']) && !empty($_POST['name'])) {
					$name = addslashes(ucwords(strtolower($_POST['name'])));
					$email = addslashes(strtolower($_POST['email']));
					$senha = addslashes($_POST['senha']);
					$password = Encrypt::encodePassword($senha);

					$User = New User;
					if ($User->emailValidation($email)) {
						if ($User->register($name, $email, $password)){
							$id = $User->getByEmailSenha($email, $password);
							if ($id) {
								Auth::login($id, true);
								Request::redirectTo(Conf::$_conf['preset']['default_controller']);
							} else {
								Request::redirectTo('user/login');
							}
						} else {
							$view['message']['type'] = 'danger';
							$view['message']['text'] = 'Erro ao cadastrar o usuário!';
						}
					} else {
						$view['message']['type'] = 'danger';
						$view['message']['text'] = 'E-mail já cadastrado.';
					}
				} else {
					$view['message']['type'] = 'danger';
					$view['message']['text'] = 'E-mail e nome são obrigatórios';
				}
			}

			App::setView($view);
		}

		public function account() {
			// VALIDATE LOGGED
			Auth::requireLogin();

			$view = [];

			if (!empty($_POST['senha_antiga']) && !empty($_POST['senha'])) {
				$senhaAntiga = addslashes($_POST['senha_antiga']);
				$senhaNova   = addslashes($_POST['senha']);
				$passwordA   = Encrypt::encodePassword($senhaAntiga);
				$passwordN   = Encrypt::encodePassword($senhaNova);

				$User = new User();
				$email = $User->getEmailById(USER_ID);
				if ($User->getByEmailSenha($email, $passwordA)) {
					if ($User->resetPassword($email, $passwordN)) {
						$view['message']['type'] = 'success';
						$view['message']['text'] = 'Senha redefinida com sucesso!';
					} else {
						$view['message']['type'] = 'danger';
						$view['message']['text'] = 'Erro ao alterar senha!';
					}
				} else {
					$view['message']['type'] = 'danger';
					$view['message']['text'] = 'Senha antiga incorreta!';
				}
			}

			App::setView($view);
		}
	}