<?

require_once 'Database.php';
require_once __DIR__.'/../config.php';

session_start(); 

if($_SESSION['doctor'] == true){

	if(!empty($_POST['type']) && $_POST['type'] == 'add' && !empty($_POST['name']) && !empty($_POST['price']) && is_numeric($_POST['price'])  && !empty($_POST['img'])){

		$DB = new Database;
	
		$tmp['name'] = $_POST['name'];
		$tmp['desc'] = $_POST['desc'];
		$tmp['price'] = $_POST['price'];
		$tmp['img'] = $_POST['img'];
		$tmp['id_cm'] = $_POST['id_cm'];
	
		$DB->Products('InsertProduct', $tmp);

		return header('Location: /page/doctor.php');

	}else if(!empty($_POST['type']) && $_POST['type'] == 'add_an' && !empty($_POST['name'])&& !empty($_POST['desc']) && !empty($_POST['data'])&& !empty($_POST['id_doctor'])){

		$DB = new Database;
	
		$tmp['name'] = $_POST['name'];
		$tmp['desc'] = $_POST['desc'];
		$tmp['data'] = $_POST['data'];
		$tmp['id_doctor'] = $_POST['id_doctor'];

	
	
		$DB->Analyzes('InsertAnalyz', $tmp);

		return header('Location: /page/doctor.php');

	}
	
	
	
	else if(!empty($_POST['type']) && $_POST['type'] == 'add_cm' && !empty($_POST['name'])&& !empty($_POST['desc'])&& !empty($_POST['img'])){

		$DB = new Database;
	
		$tmp['name'] = $_POST['name'];
		$tmp['desc'] = $_POST['desc'];
		$tmp['img'] = $_POST['img'];


	
		$DB->Doctors('InsertDoctor', $tmp);

		return header('Location: /doctor.php');

	}else if(!empty($_POST['type']) && $_POST['type'] == 'add_pr' && !empty($_POST['name'])){

		$DB = new Database;
	
		$tmp['name'] = $_POST['name'];
	

	
		$DB->Specializations('InsertSpecialization', $tmp);

		return header('Location: /doctor.php');

	}else if(!empty($_POST['type']) && $_POST['type'] == 'add_dr' && !empty($_POST['id_pr']) && !empty($_POST['id_special'])){

		$DB = new Database;
	
		$tmp['id_pr'] = $_POST['id_pr'];
		$tmp['id_special'] = $_POST['id_special'];
	
		$DB->Specializations('AddSpecializationDoctor', $tmp);

		return header('Location: /page/doctor.php');

	}else if(!empty($_POST['type']) && $_POST['type'] == 'add_prod' && !empty($_POST['id_cm']) && !empty($_POST['id_user'])){

		$DB = new Database;
	
		$tmp['id_cm'] = $_POST['id_cm'];
		$tmp['id_user'] = $_POST['id_user'];
	
		$DB->Doctors('AddProductDoctor', $tmp);

		return header('Location: /doctor.php');

	}
	
	else if(!empty($_POST['type']) && $_POST['type'] == 'add_pac' && !empty($_POST['id_pac']) && !empty($_POST['id_analyz'])){

		$DB = new Database;
	
		$tmp['id_pac'] = $_POST['id_pac'];
		$tmp['id_analyz'] = $_POST['id_analyz'];
	
		$DB->Users('AddPacientAnalyz', $tmp);

		return header('Location: /page/doctor.php');


	}	else if(!empty($_POST['type']) && $_POST['type'] == 'add_docan' && !empty($_POST['id_pr']) && !empty($_POST['id_doctor'])){

		$DB = new Database;
	
		$tmp['id_pr'] = $_POST['id_pr'];
		$tmp['id_doctor'] = $_POST['id_doctor'];
	
		$DB->Analyzes('AddDoctorAnalyz', $tmp);

		return header('Location: /page/doctor.php');

	}

	else{

		if(!empty($_POST['login_f']) && !empty($_POST['login']) && !empty($_POST['img']) && !empty($_POST['name'])){

			$DB = new Database;
		
			$tmp['login_f'] = $_POST['login_f'];
			$tmp['login'] = $_POST['login'];
			if(!empty($_POST['password'])){
				$tmp['password'] = md5($_POST['password'].'/*526-=-2');
			}
			$tmp['name'] = $_POST['name'];
			$tmp['img'] = $_POST['img'];
	

			$DB->Users('UpdateUser', $tmp);

			return header('Location: /page/doctor.php');
		
		}else if(!empty($_POST['name_f']) && !empty($_POST['name']) && !empty($_POST['price']) && is_numeric($_POST['price'])  && !empty($_POST['img'])){
		
			$DB = new Database;
		
			$tmp['name_f'] = $_POST['name_f'];
			$tmp['name'] = $_POST['name'];
			$tmp['desc'] = $_POST['desc'];
			$tmp['price'] = $_POST['price'];
			$tmp['img'] = $_POST['img'];
			$tmp['id_cm'] = $_POST['id_cm'];
		
			$DB->Products('UpdateProduct', $tmp);

			return header('Location: /page/doctor.php');
		
		}

	}

	
}


header('Location: /');