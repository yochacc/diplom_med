<?

require_once __DIR__.'/../Database.php';
require_once __DIR__.'/../../config.php';

function model_doctors($search = null){

	$DB = new Database;

	$tmp['limit'] = 0;
	$tmp['search'] = $search;

	$result['doctors'] = $DB->Doctors('SelectDoctorLimit', $tmp);

	return $result;
}