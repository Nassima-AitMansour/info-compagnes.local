<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes-fw/includes/globale.inc.php';
include('inc.php');

$list_main = new ParamTools($table);

if(isset($_POST['company-name']) and $_POST['company-name']!=''){
    $data['name'] = addslashes($_POST['company-name']);
	$id = $list_main -> insert($data);
}
header('Location: ./');
?>