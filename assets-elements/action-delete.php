<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes-fw/includes/globale.inc.php';

if(isset($_POST['table']) and $_POST['table'] != '' and isset($_POST['id']) and $_POST['id'] > 0){
	$table = addslashes($_POST['table']);
	$item = intval($_POST['id']);
	
	echo 'Table = '.$table.'<br>';
	echo 'Item = '.$item.'<br>';
	
    $list_main = new ParamTools($table);
	$list_main -> delete($table, $table.'_id = '.$item);
}
header('Location: ./');
?>