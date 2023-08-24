<?

require_once 'Database.php';
require_once __DIR__.'/../config.php';


if(!empty($_POST['type']) && $_POST['type'] == 'add' && !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['desc']) && !empty($_POST['data']) && !empty($_POST['time']) && !empty($_POST['doctor'])){

    $DB = new Database;

    $tmp['name'] = $_POST['name'];
    $tmp['desc'] = $_POST['desc'];
    $tmp['doctor'] = $_POST['doctor'];
    $tmp['data'] = $_POST['data'];
    $tmp['time'] = $_POST['time'];
    $tmp['phone'] = $_POST['phone'];
  

    $DB->Records('InsertRecord', $tmp);

    return header('Location: /appoinment.php');

}