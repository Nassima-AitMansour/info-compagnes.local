<?php
require_once '../classes-fw/includes/globale.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$result_array['code_response'] = 0;
$result_array['text'] = '';

$list_urls = new ParamTools('urls');
$list_urls_ads = new ParamTools('urls_ads');
$list_ads_company = new ParamTools('ads_company');

if(isset($_REQUEST['ads']) and $_REQUEST['ads'] != ''){
	
    $array_data = explode('-', $_REQUEST['ads']);
	
    if(isset($array_data[0]) and $array_data[0] > 0 and isset($array_data[1]) and $array_data[1] > 0){
        $ursl_id = $array_data[0];
        $ads_id = $array_data[1];

        $resm_ads_url = $list_urls_ads -> getliste('url_id = '.$ursl_id.' and ads_company = '.$ads_id);

        if($resm_ads_url){
			if($resm_ads_url[0] -> pub == 1){
				$data_update['pub'] = 1;
				$data_update['url_id'] = $resm_ads_url[0] -> urls_ads_id;
				$data_update['ads_company'] = $resm_ads_url[0] -> urls_ads_id;
			}
		}
        else{
            $data_insert['url_id'] = $ursl_id;
            $data_insert['ads_company'] = $ads_id;
            $data_insert['date_open'] = date('Y-m-d');
            $data_insert['pub'] = 1;
            $list_urls_ads -> insert($data_insert);
            $result_array['code_response'] = 1;
        }
    }
}
echo json_encode($result_array);

?>