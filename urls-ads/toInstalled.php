<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes-fw/includes/globale.inc.php';
include('inc.php');

$list_main = new ParamTools('urls_ads');

// $list_ads_company = new ParamTools('ads_company');
// $resm_ads_urls = $list_ads_company -> getliste();

if(isset($_POST['id']) and $_POST['id'] != ''){
	$id = intval(4);
	
	$data['top'] = 1;
	
	$data['id'] = $id;
	$list_main -> update($data);
	
	header('Location: ./');
}

// if(isset($_GET['id']) and intval($_GET['id'])>0){
// 	$id = intval($_GET['id']);
// 	$resm_edit = $list_main -> get($id);
// 		if($resm_edit){
// 			$name = $resm_edit -> name;
// 		}
// }
?>