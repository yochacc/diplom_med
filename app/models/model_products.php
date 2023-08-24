<?

require_once __DIR__.'/../Database.php';
require_once __DIR__.'/../../config.php';

function model_products($search = null){

	$DB = new Database;

	$tmp['limit'] = 0;
	$tmp['search'] = $search;

	$result['products'] = $DB->Products('SelectProductLimit', $tmp);

	return $result;
}