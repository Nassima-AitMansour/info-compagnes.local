<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../classes-fw/includes/globale.inc.php';
include('inc.php');

$result_array['code_response'] = 0;
$result_array['date_install'] = '';

$list_main = new ParamTools($table);

if(isset($_GET['id']) and intval($_GET['id']) > 0){
	$id = intval($_GET['id']);
	$resm_urls = $list_main -> get($id);
	if($resm_urls and $resm_urls -> pub == 0){
		
		$domain_name = $resm_urls -> domain_name;
		
		if (filter_var('http://'.$domain_name, FILTER_VALIDATE_URL) === FALSE) {
			$result_array['code_response'] = 10;
		}
		elseif (filter_var('https://'.$domain_name, FILTER_VALIDATE_URL) === FALSE) {
			$result_array['code_response'] = 11;
		}
		else{
			$date_install = date('Y-m-d H:i:s');
		
			$data['date_install'] = $date_install;
			$data['pub'] = 1;

			$data['id'] = $id;
			$list_main -> update($data);

			$result_array['code_response'] = 1;
			$result_array['date_install'] = $date_install;
		}
	}
}
echo json_encode($result_array);
?>