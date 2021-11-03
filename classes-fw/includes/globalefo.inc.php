<?PHP
ini_set('display_errors', 1);

session_start();
require_once 'creativetag-fw/classes/DataBase.class.php'; 
require_once 'creativetag-fw/classes/ParamTools.class.php';
require_once 'creativetag-fw/classes/FuncTools.class.php';
require_once 'creativetag-fw/classes/UserTools.class.php';
require_once 'creativetag-fw/classes/SimpleImage.php';

$titre_admin = 'Info Compagnes - Konexia';

$name_site = '';
$db = new DataBase();
$db->connect();
$func = new FuncTools();
$lang = 1;
?>