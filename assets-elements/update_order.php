<?PHP
include('inc.php');
require_once('../../creativetag-fw/includes/globale.inc.php');

if(isset($_GET['table']) and $_GET['table'] != '' and isset($_GET["sort_order"]) and $_GET["sort_order"] != '') {
	$table = $_GET['table'];
	$listem = new ParamTools($table);
	$id_ary = explode(",",$_GET["sort_order"]);
	if(isset($_GET['array_reverse']) and $_GET['array_reverse'] == 1){
		$id_ary = array_reverse($id_ary);
	}
	for($i=0;$i < count($id_ary);$i++) {
		$data['ordre'] = intval($i+1);
		$data['id'] = $id_ary[$i];
		$listem -> update($data);
	}
}
?>