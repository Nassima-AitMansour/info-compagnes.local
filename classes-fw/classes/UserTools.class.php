<?php  
require_once 'DataBase.class.php';
require_once 'ParamTools.class.php';

class UserTools {
  
public function login($email, $password){
	$email = addslashes(trim($email));
	$password = $password;

	$listem=new ParamTools("user_a");
	$resm = $listem->getliste("login = '$email' AND pw = '$password'");
	if($resm){
		$id = $resm[0] -> user_a_id;
		$name = $resm[0] -> name;
		$picture = $resm[0] -> picture;
		$type = $resm[0] -> type;
		$pub = $resm[0] -> pub;
		if($pub == 0){
			return '<p class="alert-danger"><strong>Connexion refusée.</strong> votre compte a été désactivé,<br>merci de contacter l\'administrateur</p>';
		}
		elseif($pub == 1){
			$_SESSION['superadmin']['user_id']=$id;
			$_SESSION['superadmin']["name"] = $name;
			$_SESSION['superadmin']["picture"] = $picture;
			$_SESSION['superadmin']["type"] = $type;
			return $id;
		}
		else{
			return '<p class="alert-danger">desole il y a un probleme merci de réessayer autre fois</p>';
		}
	}
	else{
		return '<p class="alert-danger"><strong>Connexion incorrect.</strong> Email de compte ou mot de passe incorrect</p>';
	}
}
	
	public function logout(){
		unset($_SESSION['superadmin']['user_id']);
		unset($_SESSION['superadmin']['name']);
		unset($_SESSION["superadmin"]);
        session_destroy();
		header("location: ../");
    }
}
?>