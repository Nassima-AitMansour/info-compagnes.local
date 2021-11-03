<?php

class DataBase {
    public function connect()
	{ 
        try{
			$this->pdo = new PDO('mysql:host=localhost;dbname=info_compagnes', 'root', '123456');
		}
		catch(Exception $e){
			echo 'Echec de la connexion à la base de donnees';
			$result= 'Erreur : '.$e->getMessage().'<br />';
			$result .= 'N° : '.$e->getCode();
			echo $result;
			exit();
		}
		$this->pdo->query("SET NAMES 'utf8'");
		return true;  
    }  
    
	public function selectm($sel, $table, $where)
	{
   	   $sql = "SELECT $sel FROM $table WHERE $where"; 
       try
		{	
		$this->pdo->beginTransaction();
	    $result = $this->pdo->query($sql); 
		$result->setFetchMode(PDO::FETCH_OBJ);
		if(!$result){mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);}
		$this->pdo->commit();
        }
		catch(Exception $e)
		{
			$this->pdo->rollback();
			mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);
			$result= 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
			$result.= 'Erreur : '.$e->getMessage().'<br />';
			$result .= 'N° : '.$e->getCode();
			echo $result;
		} 
		
  		$result0 = $result -> fetchAll();
		return $result0; 
		
    } 
	
	public function select($table, $where)
	{  
		$sql = "SELECT * FROM $table WHERE $where";  
        try
		{	
		$this->pdo->beginTransaction();
	    $result = $this->pdo->query($sql); 
		$result->setFetchMode(PDO::FETCH_OBJ);
		if(!$result){mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);}
		$this->pdo->commit();
        }
		catch(Exception $e)
		{
			$this->pdo->rollback();
			mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);
			$result= 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
			$result.= 'Erreur : '.$e->getMessage().'<br />';
			$result .= 'N° : '.$e->getCode();
			echo $result;
		} 
		$result0 = $result -> fetch();
		return $result0;   
    } 
	
	public function selectsql($sql)
	{ 
	   try
		{	
		$this->pdo->beginTransaction();
	    $result = $this->pdo->query($sql); 
		if(!$result){mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);}
		$result->setFetchMode(PDO::FETCH_OBJ);
		$this->pdo->commit();
        }
	catch(Exception $e)
	{
		$this->pdo->rollback();
		$result= 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
		$result.= 'Erreur : '.$e->getMessage().'<br />';
		$result .= 'N° : '.$e->getCode();
		mail('abdo.mortabit@gmail.com','test err',$result);
		echo $result;
		
		throw $e;
		
	} 
		return $result; 
		
    }
  
    public function insert($data, $table)
	{
        $columns = "";  
        $values = ""; 
        foreach ($data as $column => $value) {  
            $columns .= ($columns == "") ? "" : ", ";  
            $columns .= $column;
            $values .= ($values == "") ? "" : ", ";  
			if(substr($value,0,1)=="'"){
			$value="'".substr($value,1,-1)."'";
			}
			$values .= $value; 
        }  
  
       $sql = "insert into $table ($columns) values ($values)";  
       try
		{	
		$this->pdo->beginTransaction();
	    $result = $this->pdo->query($sql);
		$lastID = $this->pdo->lastInsertID();
		$sql2 = "UPDATE $table SET `ordre`=$lastID WHERE `".$table."_id`=$lastID";
	    $this->pdo->query($sql2);
		$result->setFetchMode(PDO::FETCH_OBJ);
		if(!$result){mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);}
		$this->pdo->commit();
        }
		catch(Exception $e)
		{
			$this->pdo->rollback();
			mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);
			$result= 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
			$result.= 'Erreur : '.$e->getMessage().'<br />';
			$result .= 'N° : '.$e->getCode();
			echo $result;
		} 
		return $lastID;
    } 

    public function update($data, $table, $where)
	{
		$o=0;
        foreach ($data as $column => $value) {
			$o++;
			if(substr($value,0,1)=="'"){
			$value="'".substr($value,1,-1)."'";
			}
			if($o==1){$colval="$column = $value";}
			else{$colval=$colval.", $column = $value";}
        }		
		$sql = "UPDATE $table SET $colval WHERE $where";		
		try
		{	
		$this->pdo->beginTransaction();
	    $result = $this->pdo->query($sql); 
		$result->setFetchMode(PDO::FETCH_OBJ);
		if(!$result){mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);}
		$this->pdo->commit();
        }
		catch(Exception $e)
		{
			$this->pdo->rollback();
			mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);
			$result= 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
			$result.= 'Erreur : '.$e->getMessage().'<br />';
			$result .= 'N° : '.$e->getCode();
			echo $result;
		}  
		return $result;
    }
	
	public function delete($table,$where)
	{  
        echo $sql = "delete from $table WHERE $where";
		try
		{	
		$this->pdo->beginTransaction();
	    $result = $this->pdo->query($sql); 
		$result->setFetchMode(PDO::FETCH_OBJ);
		if(!$result){mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);}
		$this->pdo->commit();
        }
		catch(Exception $e)
		{
			$this->pdo->rollback();
			mail('abdo.mortabit@gmail.com','test err: '.$_SERVER["REQUEST_URI"].'-'.$_SERVER['REMOTE_ADDR'],$sql);
			$result= 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
			$result.= 'Erreur : '.$e->getMessage().'<br />';
			$result .= 'N° : '.$e->getCode();
			echo $result;
		} 
        return true;  
    }
}
  ?>
