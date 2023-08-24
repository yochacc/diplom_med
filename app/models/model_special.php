<?

require_once __DIR__.'/../Database.php';
require_once __DIR__.'/../../config.php';

function model_special($search = null){

	$DB = new Database;

	$tmp['limit'] = 0;
	$tmp['search'] = $search;

    $result['special'] = $DB->Specializations('SelectSpecializationLimit', $tmp);

	return $result;
}