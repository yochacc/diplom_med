<?
require_once __DIR__.'/../Database.php';
require_once __DIR__.'/../../config.php';

function model_doctor(){

	$DB = new Database;

	$tmp['limit'] = 0;
	$result['products'] = $DB->Products('SelectProductLimit', $tmp);

	$tmp['limit'] = 0;
	$result['clients'] = $DB->Users('SelectUsersLimit', $tmp);

	$tmp['limit'] = 0;
    $result['special'] = $DB->Specializations('SelectSpecializationLimit', $tmp);



	return $result;
}