<?PHP
ini_set('display_errors', 1);
date_default_timezone_set('Africa/Casablanca');
session_start();
//if(!isset($_SESSION["superadmin"]["name"])){header('Location: ../'); exit();}
require_once '../classes-fw/classes/DataBase.class.php'; 
require_once '../classes-fw/classes/ParamTools.class.php';
require_once '../classes-fw/classes/ProductTools.class.php';
require_once '../classes-fw/classes/FuncTools.class.php';
require_once '../classes-fw/classes/UserTools.class.php';
require_once '../classes-fw/classes/SimpleImage.php';

$titre_admin = 'Info Compagnes - Konexia';

$db = new DataBase();
$db->connect();
$func = new FuncTools();
$sim = new SimpleImage();
?>