<?
require_once __DIR__.'/../Database.php';
require_once __DIR__.'/../../config.php';

function model_index(){

	$DB = new Database;

	$tmp['limit'] = 0;
	$result['products'] = $DB->Products('SelectProductLimit', $tmp);

	return $result;
}