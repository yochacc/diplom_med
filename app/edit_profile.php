<?
require_once 'Database.php';
require_once __DIR__.'/../config.php';
if(!empty($_POST['login_f']) && !empty($_POST['login']) && !empty($_POST['name'])&& !empty($_POST['img'])&& !empty($_POST['id_analyz'])){
	$DB = new Database;
	$tmp['login_f'] = $_POST['login_f'];
	$tmp['login'] = $_POST['login'];
	if(!empty($_POST['password'])){
		$tmp['password'] = md5($_POST['password'].'/*526-=-2');
	}
	$tmp['name'] = $_POST['name'];
	$tmp['img'] = $_POST['img'];
	$tmp['id_analyz'] = $_POST['id_analyz'];

	$DB->Users('UpdateUser', $tmp);

	ini_set('session.gc_maxlifetime', 1209600);
	ini_set('session.cookie_lifetime', 1209600);

	session_start();


	$_SESSION['name'] = $tmp['name'];
	$_SESSION['login'] = $tmp['login'];
	$_SESSION['img'] = $tmp['img'];
	$_SESSION['id_analyz'] = $tmp['id_analyz'];

	global $login_admin;

	if($_SESSION['login'] == $login_admin){
		$_SESSION['admin'] = true;
	}else{
		$_SESSION['admin'] = false;
	}

	header('Location: /profile.php');
}