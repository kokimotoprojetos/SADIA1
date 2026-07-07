<?php
$itemName = 'hyiplab';
error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : '';
function appUrl()
{
	$current = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$exp = explode('?action', $current);
	$url = str_replace('index.php', '', $exp[0]);
	$url = substr($url, 0, -8);
	return  $url;
}
if ($action == 'requirements') {
	$passed = [];
	$failed = [];
	$requiredPHP = 8.1;
	$currentPHP = explode('.', PHP_VERSION)[0] . '.' . explode('.', PHP_VERSION)[1];
	if ($requiredPHP ==  $currentPHP) {
		$passed[] = 'Versão PHP 8.1 é necessária';
	} else {
		$failed[] = 'Versão PHP 8.1 é necessária. Sua versão atual do PHP é ' . $currentPHP;
	}
	$extensions = ['BCMath', 'Ctype', 'cURL', 'DOM', 'Fileinfo', 'GD', 'JSON', 'Mbstring', 'OpenSSL', 'PCRE', 'PDO', 'pdo_mysql', 'Tokenizer', 'XML'];
	foreach ($extensions as $extension) {
		if (extension_loaded($extension)) {
			$passed[] = 'Extensão PHP ' . strtoupper($extension) . ' é necessária';
		} else {
			$failed[] = 'Extensão PHP ' . strtoupper($extension) . ' é necessária';
		}
	}
	if (function_exists('curl_version')) {
		$passed[] = 'Curl via PHP é necessário';
	} else {
		$failed[] = 'Curl via PHP é necessário';
	}
	if (file_get_contents(__FILE__)) {
		$passed[] = 'file_get_contents() é necessário';
	} else {
		$failed[] = 'file_get_contents() é necessário';
	}
	if (ini_get('allow_url_fopen')) {
		$passed[] = 'allow_url_fopen() é necessário';
	} else {
		$failed[] = 'allow_url_fopen() é necessário';
	}
	$dirs = ['../core/bootstrap/cache/', '../core/storage/', '../core/storage/app/', '../core/storage/framework/', '../core/storage/logs/'];
	foreach ($dirs as $dir) {
		$perm = substr(sprintf('%o', fileperms($dir)), -4);
		if ($perm >= '0775') {
			$passed[] = str_replace("../", "", $dir) . ' requer permissão 0775';
		} else {
			$failed[] = str_replace("../", "", $dir) . ' requer permissão 0775. Permissão atual é ' . $perm;
		}
	}
	if (file_exists('database.sql')) {
		$passed[] = 'database.sql deve estar disponível';
	} else {
		$failed[] = 'database.sql deve estar disponível';
	}
	if (file_exists('../.htaccess')) {
		$passed[] = '".htaccess" deve estar disponível no diretório raiz';
	} else {
		$failed[] = '".htaccess" deve estar disponível no diretório raiz';
	}
}
if ($action == 'result') {
	$url = 'https://license.viserlab.com/install';
	$params = $_POST;
	$params['product'] = $itemName;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$response = json_decode($result, true);

	if (@$response['error'] == 'ok') {
		try {
			$db = new PDO("mysql:host=$_POST[db_host];dbname=$_POST[db_name]", $_POST['db_user'], $_POST['db_pass']);
			$dbinfo = $db->query('SELECT VERSION()')->fetchColumn();

			$engine =  @explode('-', $dbinfo)[1];
			$version =  @explode('.', $dbinfo)[0] . '.' . @explode('.', $dbinfo)[1];

			if (strtolower($engine) == 'mariadb') {
				if ($version < 10.3) {
					$response['error'] = 'error';
					$response['message'] = 'MariaDB 10.3+ ou MySQL 5.7+ Necessário. <br> Sua versão atual é MariaDB ' . $version;
				}
			} else {
				if ($version < 5.7) {
					$response['error'] = 'error';
					$response['message'] = 'MariaDB 10.3+ ou MySQL 5.7+ Necessário. <br> Sua versão atual é MySQL ' . $version;
				}
			}
		} catch (Exception $e) {
			$response['error'] = 'error';
			$response['message'] = 'Credencial do Banco de Dados Inválida';
		}
	}

	if (@$response['error'] == 'ok') {
		try {
			$query = file_get_contents("database.sql");
			$stmt = $db->prepare($query);
			$stmt->execute();
			$stmt->closeCursor();
		} catch (Exception $e) {
			$response['error'] = 'error';
			$response['message'] = 'Ocorreu um Problema ao Importar o Banco de Dados!<br>Certifique-se de que o Banco de Dados está Vazio.';
		}
	}

	if (@$response['error'] == 'ok') {
		try {
			$file = fopen($response['location'], 'w');
			fwrite($file, $response['body']);
			fclose($file);
		} catch (Exception $e) {
			$response['error'] = 'error';
			$response['message'] = 'Ocorreu um Problema ao Escrever o Arquivo de Ambiente.';
		}
	}

	if (@$response['error'] == 'ok') {
		try {
			$db->query("UPDATE admins SET email='" . $_POST['email'] . "', username='" . $_POST['admin_user'] . "', password='" . password_hash($_POST['admin_pass'], PASSWORD_DEFAULT) . "' WHERE username='admin'");
		} catch (Exception $e) {
			$response['message'] = 'O EasyInstaller não conseguiu definir as credenciais do administrador.';
		}
	}
}
$sectionTitle =  empty($action) ? 'Termos de Uso' : $action;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Instalador Fácil por ViserLab</title>
	<link rel="stylesheet" href="../assets/global/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/global/css/all.min.css">
	<link rel="stylesheet" href="../assets/global/css/installer.css">
	<link rel="shortcut icon" href="https://license.viserlab.com/external/favicon.png" type="image/x-icon">
</head>

<body>
	<header class="py-3 border-bottom border-primary bg--dark">
		<div class="container">
			<div class="d-flex align-items-center justify-content-between header gap-3">
				<img class="logo" src="https://license.viserlab.com/external/logo.png" alt="ViserLab">
				<h3 class="title">Instalador Fácil</h3>
			</div>
		</div>
	</header>
	<div class="installation-section padding-bottom padding-top">
		<div class="container">
			<div class="installation-wrapper">
				<div class="install-content-area">
					<div class="install-item">
						<h3 class="title text-center"><?php echo $sectionTitle; ?></h3>
						<div class="box-item">
							<?php
								if ($action == 'result') {
								echo '<div class="success-area text-center">';
								if (@$response['error'] == 'ok') {
									echo '<h2 class="text-success text-uppercase mb-3">Seu sistema foi instalado com sucesso!</h2>';
									if (@$response['message']) {
										echo '<h5 class="text-warning mb-3">' . $response['message'] . '</h5>';
									}
									echo '<p class="text-danger lead my-5">Por favor, exclua a pasta "install" do servidor.</p>';
									echo '<div class="warning"><a href="' . appUrl() . '" class="theme-button choto">Ir para o site e Ativar</a></div>';
								} else {
									if (@$response['message']) {
										echo '<h3 class="text-danger mb-3">' . $response['message'] . '</h3>';
									} else {
										echo '<h3 class="text-danger mb-3">Seu servidor não é capaz de processar a solicitação.</h3>';
									}
									echo '<div class="warning mt-2"><h5 class="mb-4 fw-normal">Você pode solicitar suporte criando um ticket de suporte.</h5><a href="https://viserlab.com/support" target="_blank" class="theme-button choto">criar ticket</a></div>';
								}
								echo '</div>';
							} elseif ($action == 'information') {
							?>
								<form action="?action=result" method="post" class="information-form-area mb--20">
									<div class="info-item">
										<h5 class="font-weight-normal mb-2">URL do Site</h5>
										<div class="row">
											<div class="information-form-group col-12">
												<input name="url" value="<?php echo appUrl(); ?>" type="text" required>
											</div>
										</div>
									</div>
									<div class="info-item">
										<h5 class="font-weight-normal mb-2">Detalhes do Banco de Dados</h5>
										<div class="row">
											<div class="information-form-group col-sm-6">
												<input type="text" name="db_name" placeholder="Nome do Banco de Dados" required>
											</div>
											<div class="information-form-group col-sm-6">
												<input type="text" name="db_host" placeholder="Host do Banco de Dados" required>
											</div>
											<div class="information-form-group col-sm-6">
												<input type="text" name="db_user" placeholder="Usuário do Banco de Dados" required>
											</div>
											<div class="information-form-group col-sm-6">
												<input type="text" name="db_pass" placeholder="Senha do Banco de Dados">
											</div>
										</div>
									</div>
									<div class="info-item">
										<h5 class="font-weight-normal mb-3">Credencial do Administrador</h5>
										<div class="row">
											<div class="information-form-group col-lg-3 col-sm-6">
												<label>Nome de Usuário</label>
												<input name="admin_user" type="text" placeholder="Nome de Usuário do Admin" required>
											</div>
											<div class="information-form-group col-lg-3 col-sm-6">
												<label>Senha</label>
												<input name="admin_pass" type="text" placeholder="Senha do Admin" required>
											</div>
											<div class="information-form-group col-lg-6">
												<label>Endereço de E-mail</label>
												<input name="email" placeholder="Seu endereço de e-mail" type="email" required>
											</div>
										</div>
									</div>
									<div class="info-item">
										<div class="information-form-group text-end">
											<button type="submit" class="theme-button choto">Instalar Agora</button>
										</div>
									</div>
								</form>
							<?php
							} elseif ($action == 'requirements') {
								$btnText = 'Ver Resultado Detalhado da Verificação';
								if (count($failed)) {
									$btnText = 'Ver Verificações Aprovadas';
									echo '<div class="item table-area"><table class="requirment-table">';
									foreach ($failed as $fail) {
										echo "<tr><td>$fail</td><td><i class='fas fa-times'></i></td></tr>";
									}
									echo '</table></div>';
								}
								if (!count($failed)) {
									echo '<div class="text-center"><i class="far fa-check-circle success-icon text-success"></i><h5 class="my-3">Verificação de Requisitos Aprovada!</h5></div>';
								}
								if (count($passed)) {
									echo '<div class="text-center my-3"><button class="btn passed-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePassed" aria-expanded="false" aria-controls="collapsePassed">' . $btnText . '</button></div>';
									echo '<div class="collapse mb-4" id="collapsePassed"><div class="item table-area"><table class="requirment-table">';
									foreach ($passed as $pass) {
										echo "<tr><td>$pass</td><td><i class='fas fa-check'></i></td></tr>";
									}
									echo '</table></div></div>';
								}
								echo '<div class="item text-end mt-3">';
								if (count($failed)) {
									echo '<a class="theme-button btn-warning choto" href="?action=requirements">Revisar <i class="fa fa-sync-alt"></i></a>';
								} else {
									echo '<a class="theme-button choto" href="?action=information">Próximo Passo <i class="fa fa-angle-double-right"></i></a>';
								}
								echo '</div>';
							} else {
							?>
								<div class="item">
									<h4 class="subtitle">Licença para uso em apenas um(1) domínio (site)!</h4>
									<p> A licença Regular é para um site ou domínio apenas. Se você quiser usar em vários sites ou domínios, você precisa adquirir mais licenças (1 site = 1 licença). A Licença Regular concede a você uma licença contínua, não exclusiva e mundial para usar o produto.</p>
								</div>
								<div class="item">
									<h5 class="subtitle font-weight-bold">Você Pode:</h5>
									<ul class="check-list">
										<li> Usar em apenas um(1) domínio. </li>
										<li> Modificar ou editar como quiser. </li>
										<li> Traduzir para o(s) idioma(s) de sua escolha.</li>
									</ul>
									<span class="text-warning"><i class="fas fa-exclamation-triangle"></i> Se algum problema ou erro ocorrer devido à sua modificação em nosso código/banco de dados, não seremos responsáveis por isso. </span>
								</div>
								<div class="item">
									<h5 class="subtitle font-weight-bold">Você Não Pode: </h5>
									<ul class="check-list">
										<li class="no"> Revender, distribuir, doar ou trocar por qualquer meio a terceiros ou indivíduos. </li>
										<li class="no"> Incluir este produto em outros produtos vendidos em qualquer mercado ou sites afiliados. </li>
										<li class="no"> Usar em mais de um(1) domínio. </li>
									</ul>
								</div>
								<div class="item">
									<p class="info">Para mais informações, consulte <a href="https://codecanyon.net/licenses/faq" target="_blank">FAQ da Licença</a></p>
								</div>
								<div class="item text-end">
									<a href="?action=requirements" class="theme-button choto">Concordo, Próximo Passo</a>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="py-3 text-center bg--dark border-top border-primary">
		<div class="container">
			<p class="m-0 font-weight-bold">&copy;<?php echo Date('Y') ?> - Todos os Direitos Reservados por <a href="https://viserlab.com/">ViserLab</a></p>
		</div>
	</footer>
	<script src="../assets/global/js/bootstrap.bundle.min.js"></script>
</body>

</html>