<?php
ob_start();
session_start();

include "../config.php";
include DBAPI;

$gerentes = null;
$gerente = null;
function formatadata($data, $formato)
{
	$dt = new DateTime($data, new DateTimeZone("America/Sao_Paulo"));
	return $dt->format($formato);
}

function telefone($tel)
{
	$tel = preg_replace('/\D/', '', (string) $tel);

	if (strlen($tel) === 11) {
		return "(" . substr($tel, 0, 2) . ") " . substr($tel, 2, 5) . "-" . substr($tel, 7, 4);
	}

	return "(" . substr($tel, 0, 2) . ") " . substr($tel, 2, 4) . "-" . substr($tel, 6, 4);
}

function upload_foto($campo = 'foto')
{
	if (empty($_FILES[$campo]) || $_FILES[$campo]['error'] === UPLOAD_ERR_NO_FILE) {
		return null; 
	}

	if ($_FILES[$campo]['error'] !== UPLOAD_ERR_OK) {
		$_SESSION['message'] = "Nao foi possivel enviar a foto.";
		$_SESSION['type'] = "danger";
		return null;
	}

	$extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
	$extensao = strtolower(pathinfo($_FILES[$campo]['name'], PATHINFO_EXTENSION));

	if (!in_array($extensao, $extensoes_permitidas)) {
		$_SESSION['message'] = "Formato de imagem invalido. Use JPG, PNG, GIF ou WEBP.";
		$_SESSION['type'] = "danger";
		return null;
	}

	if (!is_dir(UPLOAD_PATH)) {
		mkdir(UPLOAD_PATH, 0755, true);
	}

	$nome_arquivo = uniqid('foto_') . '.' . $extensao;

	if (move_uploaded_file($_FILES[$campo]['tmp_name'], UPLOAD_PATH . $nome_arquivo)) {
		return $nome_arquivo;
	}

	return null;
}

function remove_foto($nome_arquivo)
{
	if (!empty($nome_arquivo)) {
		$caminho = UPLOAD_PATH . $nome_arquivo;
		if (is_file($caminho)) {
			@unlink($caminho);
		}
	}
}
function index()
{
	global $gerentes;
	$gerentes = find_all('gerentes');
}

function view($id = null)
{
	global $gerente;
	$gerente = find('gerentes', $id);
}

function add()
{
	if (!empty($_POST['gerentes'])) {

		$today = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

		$gerente = $_POST['gerentes'];
		$gerente['modified'] = $gerente['created'] = $today->format("Y-m-d H:i:s");

		$foto = upload_foto();
		if ($foto) {
			$gerente['foto'] = $foto;
		}

		save("gerentes", $gerente);
		header("location: index.php");
		exit;
	}
}
function edit()
{
	$now = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

	if (isset($_GET["id"])) {

		$id = (int) $_GET["id"];

		if (isset($_POST["gerentes"])) {

			$gerente = $_POST["gerentes"];
			$gerente['modified'] = $now->format("Y-m-d H:i:s");

			$foto_nova = upload_foto();

			if ($foto_nova) {
				$atual = find('gerentes', $id);
				if (!empty($atual['foto'])) {
					remove_foto($atual['foto']);
				}
				$gerente['foto'] = $foto_nova;
			}

			update('gerentes', $id, $gerente);
			header('location: index.php');
			exit;
		} else {

			global $gerente;
			$gerente = find('gerentes', $id);
		}
	} else {
		header('location: index.php');
		exit;
	}
}

function delete($id = null)
{
	$gerente = find('gerentes', $id);

	$success = remove("gerentes", $id);

	if ($success && !empty($gerente['foto'])) {
		remove_foto($gerente['foto']);
	}

	if (!$success && empty($_SESSION['message'])) {
		$_SESSION['message'] = "Nao foi possivel excluir o registro.";
		$_SESSION['type'] = "danger";
	}

	header("location: index.php");
	exit;
}