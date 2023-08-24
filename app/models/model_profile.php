<?
require_once __DIR__.'/../Database.php';
require_once __DIR__.'/../../config.php';

function model_profile(){

	$DB = new Database;

	$tmp['limit'] = 0;
	$result['analyz'] = $DB->Analyzes('SelectAnalyzLimit', $tmp);

	$tmp['limit'] = 0;
	$result['doctors'] = $DB->Doctors('SelectDoctorLimit', $tmp);

	$tmp['limit'] = 0;
    $result['special'] = $DB->Specializations('SelectSpecializationLimit', $tmp);
	
	$tmp['limit'] = 0;
	$result['clients'] = $DB->Users('SelectUsersLimit', $tmp);


	return $result;
}