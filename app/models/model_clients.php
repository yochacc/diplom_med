<?

require_once __DIR__.'/../Database.php';
require_once __DIR__.'/../../config.php';

function model_clients(){

	$DB = new Database;

	$tmp['limit'] = 0;
	$result['clients'] = $DB->Users('SelectUsersLimit', $tmp);

	return $result;
}