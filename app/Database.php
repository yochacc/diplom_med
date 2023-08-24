<?
require_once __DIR__.'/../config.php';

class DataBase{
    
    function __construct(){

        global $DB;

        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
        ];
    
        try{
            $this->db = new PDO("mysql:host=$DB[host];dbname=$DB[dbname]" . ';charset=utf8mb4', $DB['user'], $DB['pass'], $opt);
        }catch(PDOException $e){
            echo $e->getMessage();
		}
		
    }


	public function Analyzes($action, $other = null){

		$this->CreateTableAnalyzes();

        switch($action){

            case 'CreateTableAnalyzes':
                $this->CreateTableAnalyzes();
                break;

            case 'InsertAnalyz':
                $this->InsertAnalyz($other['name'],$other['desc'],$other['data'],$other['id_doctor']);             
                break;

            case 'UpdateAnalyz':
                $this->UpdateAnalyz($other['name_f'], $other['name'],$other['desc'],$other['data']);
                break;

            case 'SelectAnalyzLimit':
                return $this->SelectAnalyzLimit($other['limit'], $other['search']);
				break;

				case 'AddDoctorAnalyz':
					return $this->AddDoctorAnalyz($other['id_pr'], $other['id_doctor']);
				   break;
	   
				
		

			


			/* case 'DeleteProductCompany':
                return $this->DeleteProductCompany($other['id_product']);
				break; */

        }

    }
    
    private function CreateTableAnalyzes(){
        $this->db->query("CREATE TABLE IF NOT EXISTS `med_analyzes` (`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(100),`desc` VARCHAR(200),`data` DATE,  `id_doctor` int(10),  UNIQUE (`name`));");
	}

	

	private function SelectAnalyzLimit($limit = 0, $search = null){

		//*
		if(!empty($search)){
			$query = "SELECT * FROM `med_analyzes` WHERE `name` LIKE '%$search%';";
		}else{
			if(!empty($limit)){
				$query = "SELECT * FROM `med_analyzes` LIMIT $limit;";
			}else{
				$query = "SELECT * FROM `med_analyzes`;";
			}
		}

		$return = $this->db->query($query)->fetchAll();

		
		for($i = 0; $i < count($return); $i++){


			if(!empty($return[$i]['id_doctor'])){
	
				$doctor = explode(',', $return[$i]['id_doctor']);
	
				for($a = 0; $a < count($doctor); $a++){
					$return[$i]['doctor'][$a] = $this->db->query("SELECT * FROM `med_doctors` WHERE `id` = '$doctor[$a]'")->fetchAll()[0];
				}
	
			}
			
		}
	
		

        return $return;
	}





	
	private function InsertAnalyz($name, $desc,$data,$id_doctor){
		$this->db->query("INSERT INTO `med_analyzes` (`id`, `name`, `desc`,`data`,`id_doctor`) VALUES (NULL, '$name', '$desc','$data','$id_doctor')");
	}

	private function UpdateAnalyz($name_f, $name,$desc,$data){
		$this->db->query("UPDATE `med_analyzes` SET `name` = '$name', `desc` = '$desc', `data` = '$data' WHERE `name` = '$name_f'");
	}

	


	/***************************************************************************/
	private function AddDoctorAnalyz($id_pr, $id_doctor){

		$doctor = $this->db->query("SELECT `id_doctor` FROM `med_analyzes` WHERE `id` = '$id_pr'")->fetchAll()[0]['id_special'];
	
		if(!empty($doctor)){
			$doctor .= ",$id_doctor";
		}else{
			$doctor = $id_doctor;
		}
	
		$this->db->query("UPDATE `med_analyzes` SET `id_doctor` = '$doctor' WHERE `id` = '$id_pr'");
	}

 /*****************************************************************************/



 public function Specializations($action, $other = null){

	$this->CreateTableSpecializations();

	switch($action){

		case 'CreateTableSpecializations':
			$this->CreateTableSpecializations();
			break;

		case 'InsertSpecialization':
			$this->InsertSpecialization($other['name']);                
			break;

		case 'UpdateSpecialization':
			$this->UpdateSpecialization($other['name_f'], $other['name']);
			break;

	

		case 'SelectSpecializationLimit':
			return $this->SelectSpecializationLimit($other['limit'], $other['search']);
			break;

	}

}



private function CreateTableSpecializations(){
	$this->db->query("CREATE TABLE IF NOT EXISTS `specialization` (`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(70),  UNIQUE (`name`));");
}

private function SelectSpecializationLimit($limit = 0, $search = null){

	if(!empty($search)){
		$query = "SELECT * FROM `specialization` WHERE `name` LIKE '%$search%';";
	}else{
		if(!empty($limit)){
			$query = "SELECT * FROM `specialization` LIMIT $limit;";
		}else{
			$query = "SELECT * FROM `specialization`;";
		}
	}

	return $this->db->query($query)->fetchAll();
}

private function InsertSpecialization($name){
	$this->db->query("INSERT INTO `specialization` (`id`, `name`) VALUES (NULL, '$name')");
}

private function UpdateSpecialization($name_f, $name){
	$this->db->query("UPDATE `specialization` SET `name` = '$name' WHERE `name` = '$name_f'");
}









    /*****************************************************************************/

 /*****************************************************************************/



 public function Records($action, $other = null){

	$this->CreateTableRecords();

	switch($action){

		case 'CreateTableRecords':
			$this->CreateTableRecords();
			break;

		case 'InsertRecord':
			$this->InsertRecord($other['name'], $other['desc'], $other['data'], $other['time'], $other['doctor'], $other['phone']);                
			break;

		case 'UpdateRecord':
			$this->UpdateRecord($other['name_f'], $other['name'], $other['desc'], $other['data'], $other['time'], $other['phone'] , $other['doctor']);
			break;

		case 'SelectRecordLimit':
			return $this->SelectRecordLimit($other['limit'], $other['search']);
			break;

	}

}



private function CreateTableRecords(){
	$this->db->query("CREATE TABLE IF NOT EXISTS `record_pacient` (`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(100), `desc` VARCHAR(5000), `doctor` VARCHAR(500), `data` VARCHAR(200), `time` VARCHAR(50),`phone` VARCHAR(50), UNIQUE (`name`));");
}

private function SelectRecordLimit($limit = 0, $search = null){

	if(!empty($search)){
		$query = "SELECT * FROM `record_pacient` WHERE `name` LIKE '%$search%';";
	}else{
		if(!empty($limit)){
			$query = "SELECT * FROM `record_pacient` LIMIT $limit;";
		}else{
			$query = "SELECT * FROM `record_pacient`;";
		}
	}

	return $this->db->query($query)->fetchAll();
}

private function InsertRecord($name, $desc, $data, $time, $doctor,$phone){
	$this->db->query("INSERT INTO `record_pacient` (`id`, `name`, `desc`,`doctor`, `data`, `time`, `phone`) VALUES (NULL, '$name', '$desc', '$doctor','$data','$time',$phone)");
}

private function UpdateRecord($name_f, $name, $desc, $data, $time, $doctor,$phone){
	$this->db->query("UPDATE `record_pacient` SET `name` = '$name', `desc` = '$desc', `doctor` = '$doctor' , `data` = '$data', `time` = '$time', `phone` = '$phone' WHERE `name` = '$name_f'");
}









    /*****************************************************************************/

    public function Users($action, $other = null){

		$this->CreateTableUsers();

        switch($action){

            case 'CreateTableUsers':
                $this->CreateTableUsers(); 
                break;

            case 'InsertUser':
                $this->InsertUser($other['login'], $other['password'], $other['name'], $other['img']);                
                break;

            case 'UpdateUser':
                $this->UpdateUser($other['login_f'], $other['login'], $other['password'], $other['name'], $other['img'],$other['id_analyz']);
                break;

            case 'SelectUser':
                return $this->SelectUser($other['login'], $other['password']);
				break;
				
				case 'AddPacientAnalyz':
					return $this->AddPacientAnalyz($other['id_pac'], $other['id_analyz']);
					break;


			case 'SelectUsersLimit':
                return $this->SelectUsersLimit($other['limit']);
                break;

        }

    }
    
    private function CreateTableUsers(){
        $this->db->query("CREATE TABLE IF NOT EXISTS `med_pacient` (`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, `login` VARCHAR(100), `pass` INTEGER(200), `name` VARCHAR(200), `img` VARCHAR(100), `id_analyz` VARCHAR(50),  UNIQUE (`login`));");
	}

	

	private function SelectUser($login, $password){
        return $this->db->query("SELECT * FROM `med_pacient` WHERE `login` = '$login' AND `pass` = '$password';")->fetchAll()[0];
	}

	private function SelectUsersLimit($limit = 0, $search = null){

		//*
		if(!empty($limit)){
			$query = "SELECT * FROM `med_pacient` LIMIT $limit;";
		}else{
			$query = "SELECT * FROM `med_pacient`;";
		}

		$return = $this->db->query($query)->fetchAll();

		//Add Products and Workers
		for($i = 0; $i < count($return); $i++){


			if(!empty($return[$i]['id_analyz'])){

				$clients = explode(',', $return[$i]['id_analyz']);

				for($a = 0; $a < count($clients); $a++){
					$return[$i]['analyz'][$a] = $this->db->query("SELECT * FROM `med_analyzes` WHERE `id` = '$clients[$a]'")->fetchAll()[0];
				}

			}
			
		}
		

        return $return;
	}

	private function InsertUser($login, $password, $name, $img){
       	$this->db->query("INSERT INTO `med_pacient` VALUE ('', '$login', '$password', '$name', '$img', '')");
	}

	private function UpdateUser($login_f, $login, $password, $name, $img,$id_analyz){

		if(!empty($password)){
			$this->db->query("UPDATE `med_pacient` SET `login` = '$login', `pass` = '$password', `name` = '$name', `img` = '$img', `id_analyz` = '$id_analyz' WHERE `login` = '$login_f'");
		}else{
			$this->db->query("UPDATE `med_pacient` SET `login` = '$login', `name` = '$name', `img` = '$img', `id_analyz` = '$id_analyz'  WHERE `login` = '$login_f'");
		}
	}
	 
	private function AddPacientAnalyz($id_pac, $id_analyz){

		$users = $this->db->query("SELECT `id_analyz` FROM `med_pacient` WHERE `id` = '$id_pac'")->fetchAll()[0]['id_analyz'];

		if(!empty($users)){
			$users .= ",$id_analyz";
		}else{
			$users = $id_analyz;
		}

		$this->db->query("UPDATE `med_pacient` SET `id_analyz` = '$users' WHERE `id` = '$id_pac'");
	}



	/***************************************************************************/

	public function Products($action, $other = null){

		$this->CreateTableProducts();

        switch($action){

            case 'CreateTableProducts':
                $this->CreateTableProducts();
                break;

            case 'InsertProduct':
                $this->InsertProduct($other['name'], $other['desc'], $other['price'], $other['img']);                
                break;

            case 'UpdateProduct':
                $this->UpdateProduct($other['name_f'], $other['name'], $other['desc'], $other['price'], $other['img']);
                break;

            case 'SelectProductLimit':
                return $this->SelectProductLimit($other['limit'], $other['search']);
				break;

        }

    }
    
    private function CreateTableProducts(){
        $this->db->query("CREATE TABLE IF NOT EXISTS `med_uslugi` (`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(100), `desc` VARCHAR(5000), `price` INTEGER(200), `img` VARCHAR(50), UNIQUE (`name`));");
	}

	private function SelectProductLimit($limit = 0, $search = null){

		if(!empty($search)){
			$query = "SELECT * FROM `med_uslugi` WHERE `name` LIKE '%$search%';";
		}else{
			if(!empty($limit)){
				$query = "SELECT * FROM `med_uslugi` LIMIT $limit;";
			}else{
				$query = "SELECT * FROM `med_uslugi`;";
			}
		}

        return $this->db->query($query)->fetchAll();
	}

	private function InsertProduct($name, $desc, $price, $img){
		$this->db->query("INSERT INTO `med_uslugi` (`id`, `name`, `desc`, `price`,  `img`) VALUES (NULL, '$name', '$desc', '$price',  '$img')");
	}

	private function UpdateProduct($name_f, $name, $desc, $price, $img){
		$this->db->query("UPDATE `med_uslugi` SET `name` = '$name', `desc` = '$desc', `price` = '$price' , `img` = '$img' WHERE `name` = '$name_f'");
	}

	/***************************************************************************/

	public function Doctors($action, $other = null){

		$this->CreateTableDoctors();

        switch($action){

            case 'CreateTableDoctors':
                $this->CreateTableDoctors();
                break;

            case 'InsertDoctor':
                $this->InsertDoctor($other['name'],$other['desc'],$other['img']);                
                break;

            case 'UpdateDoctor':
                $this->UpdateDoctor($other['name_f'], $other['name'],$other['desc'],$other['img']);
                break;

            case 'SelectDoctorLimit':
                return $this->SelectDoctorLimit($other['limit'], $other['search']);
				break;

				case 'AddSpecializationDoctor':
					return $this->AddSpecializationDoctor($other['id_pr'], $other['id_special']);
				   break;
	   
				
			case 'AddProductDoctor':
                return $this->AddProductDoctor($other['id_cm'], $other['id_user']);
				break;

			


			/* case 'DeleteProductCompany':
                return $this->DeleteProductCompany($other['id_product']);
				break; */

        }

    }
    
    private function CreateTableDoctors(){
        $this->db->query("CREATE TABLE IF NOT EXISTS `med_doctors` (`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(100),`desc` VARCHAR(1000),`img` VARCHAR(200), `id_user` VARCHAR(500),  UNIQUE (`name`));");
	}

	

	private function SelectDoctorLimit($limit = 0, $search = null){

		//*
		if(!empty($search)){
			$query = "SELECT * FROM `med_doctors` WHERE `name` LIKE '%$search%';";
		}else{
			if(!empty($limit)){
				$query = "SELECT * FROM `med_doctors` LIMIT $limit;";
			}else{
				$query = "SELECT * FROM `med_doctors`;";
			}
		}

		$return = $this->db->query($query)->fetchAll();

		//Add Products and Workers
		for($i = 0; $i < count($return); $i++){


			if(!empty($return[$i]['id_user'])){

				$clients = explode(',', $return[$i]['id_user']);

				for($a = 0; $a < count($clients); $a++){
					$return[$i]['clients'][$a] = $this->db->query("SELECT * FROM `med_pacient` WHERE `id` = '$clients[$a]'")->fetchAll()[0];
				}

			}
			
		}
		for($i = 0; $i < count($return); $i++){


			if(!empty($return[$i]['id_special'])){
	
				$special = explode(',', $return[$i]['id_special']);
	
				for($a = 0; $a < count($special); $a++){
					$return[$i]['special'][$a] = $this->db->query("SELECT * FROM `specialization` WHERE `id` = '$special[$a]'")->fetchAll()[0];
				}
	
			}
			
		}
	
		

        return $return;
	}





	
	private function InsertDoctor($name, $desc, $img){
		$this->db->query("INSERT INTO `med_doctors` (`id`, `name`, `desc`, `img`) VALUES (NULL, '$name', '$desc', '$img')");
	}

	private function UpdateDoctor($name_f, $name,$desc, $img){
		$this->db->query("UPDATE `med_doctors` SET `name` = '$name', `desc` = '$desc', `img` = '$img' WHERE `name` = '$name_f'");
	}

	
	private function AddProductDoctor($id_cm, $id_user){

		$users = $this->db->query("SELECT `id_user` FROM `med_doctors` WHERE `id` = '$id_cm'")->fetchAll()[0]['id_user'];

		if(!empty($users)){
			$users .= ",$id_user";
		}else{
			$users = $id_user;
		}

		$this->db->query("UPDATE `med_doctors` SET `id_user` = '$users' WHERE `id` = '$id_cm'");
	}

	/***************************************************************************/
	private function AddSpecializationDoctor($id_pr, $id_duser){

		$dusers = $this->db->query("SELECT `id_special` FROM `med_doctors` WHERE `id` = '$id_pr'")->fetchAll()[0]['id_special'];
	
		if(!empty($users)){
			$dusers .= ",$id_duser";
		}else{
			$dusers = $id_duser;
		}
	
		$this->db->query("UPDATE `med_doctors` SET `id_special` = '$dusers' WHERE `id` = '$id_pr'");
	}



}


/***************************************************************************/

   