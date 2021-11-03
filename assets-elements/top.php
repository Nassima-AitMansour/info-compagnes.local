<?PHP
if(isset($_GET['table']) and $_GET['table']!='' and isset($_GET['id']) and $_GET['id']>0){
	$table = addslashes($_GET['table']);
	$id = intval($_GET['id']);
	require_once('../../creativetag-fw/includes/globale.inc.php');
	$listem = new ParamTools($table);
    $etat = $listem -> top($id);
    echo $etat;
}
?>