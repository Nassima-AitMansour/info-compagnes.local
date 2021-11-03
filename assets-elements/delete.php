<?PHP
if(isset($_GET['id']) and $_GET['id']>0){
	$table = addslashes($_GET['table']);
	$id = intval($_GET['id']);
	require_once('../../creativetag-fw/includes/globale.inc.php');
	$db -> delete($table,$table."_id=".$id);
}
?>