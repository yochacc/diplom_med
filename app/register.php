<?

require_once 'Database.php';
require_once __DIR__.'/../config.php';

if(!empty($_POST['login']) && !empty($_POST['name'])  && !empty($_POST['password']) && !empty($_POST['img'])  && empty($_SESSION['id'])){

	$DB = new Database;

	

	$tmp['login'] = $_POST['login'];
	$tmp['password'] = md5($_POST['password'].'/*526-=-2');
	$tmp['name'] = $_POST['name'];
	$tmp['img'] = $_POST['img']; 
	

	$DB->Users('InsertUser', $tmp);

	ini_set('session.gc_maxlifetime', 1209600);
	ini_set('session.cookie_lifetime', 1209600);

	session_start();
	

	
	$_SESSION['login'] = $tmp['login'];
	$_SESSION['name'] = $tmp['name'];
	$_SESSION['img'] = $tmp['img'];


	global $login_doctor;
	if($_SESSION['login'] == $login_doctor){
		$_SESSION['doctor'] = true;
	}

	header('Location: /');
}