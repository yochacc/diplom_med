<?

require_once 'Database.php';
require_once __DIR__.'/../config.php';

if(!empty($_POST['login']) && !empty($_POST['password'])  && empty($_SESSION['id'])){

	$DB = new Database;

	$tmp['login'] = $_POST['login'];
	$tmp['password'] = md5($_POST['password'].'/*526-=-2');

	$user = $DB->Users('SelectUser', $tmp);

	if(!empty($user['id'])){

		ini_set('session.gc_maxlifetime', 1209600);
		ini_set('session.cookie_lifetime', 1209600);

		session_start();
	
		$_SESSION['login'] = $user['login'];
		$_SESSION['name'] = $user['name'];

		$_SESSION['img'] = $user['img'];
		$_SESSION['id_analyz'] = $user['id_analyz']; 

		global $login_doctor;

		if($_SESSION['login'] == $login_doctor){
			$_SESSION['doctor'] = true;
		}

	}

	header('Location: /');
}