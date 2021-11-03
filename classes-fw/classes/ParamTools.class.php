<?php 
require_once 'DataBase.class.php'; 
  
  
class ParamTools {  
   
function __construct($table)
	{  
		$this->table = $table; 
	}  

public function listeann($where="", $table="annonce", $select_ch='*', $ordre="an.ordre asc")  
	{  
	   $db = new DataBase();
	   $db->connect();
		  
		$where = ($where=="")? "": $where;
		$ordre = ($ordre=="")? "" : "order by ".$ordre;
		$result = $db->selectm($select_ch, $table, $where." ".$ordre);  
		return $result;  
	}
	
public function getliste($where="",$ordre="ordre asc")  
	{  
	   $db = new DataBase();
	   $db->connect();
		  
		$where = ($where=="")? "": " and ".$where;
		$ordre = ($ordre=="")? "" : "order by ".$ordre;
		$result = $db->selectm('*',$this->table, $this->table."_id > 0 $where ".$ordre);  
		return $result;  
	} 

public function get($id)  
	{
		$db = new DataBase();
		$db->connect();
			
		$result = $db->select($this->table, $this->table."_id = $id");
		return $result;  
	}

public function deletewhe($where)
	{
		$db = new DataBase();
		$db->connect();
	
		$db->delete($this->table,$where);
		return true;
	
	}  

public function insert($data)
	{
		 foreach($data as $k=>$v){
			$data[$k]="'$v'";
			}
		 $db = new DataBase();
		 $db->connect();
		 $id = $db->insert($data, $this->table); 
		 return $id;
	}

public function update($data)
	{
		foreach($data as $k=>$v){
			if($k=="id"){$id=$v;}
			else{$k2=$k; $data2[$k2]="'$v'";}
			}
		$db = new DataBase();
		$db->connect();
		$rep=$db->update($data2, $this->table, $this->table.'_id = '.$id); 
		return $rep;
	}  
	
public function updatewhe($data,$where)
	{
		$db = new DataBase();
		$rep=$db->update($data, $this->table, $where);
		return $rep;
	}  
	
public function pub($id)
	{
		$db = new DataBase();
		$db->connect();
		 
		$result = $db->select($this->table, $this->table."_id = $id  limit 1");
		if($result){$pubact= $result->pub;}
		($pubact==0) ? $pubact=1 : $pubact=0;
		$data["pub"]=$pubact;	
		$db->update($data, $this->table, $this->table."_id = $id  limit 1");
		return $pubact;
	} 
	
public function top($id)
	{
		$db = new DataBase();
		$db->connect();
		 
		$result = $db->select($this->table, $this->table."_id = $id  limit 1");
		if($result){$topact= $result->top;}
		($topact==0) ? $topact=1 : $topact=0;
		$data["top"]=$topact;	
		$db->update($data, $this->table, $this->table."_id = $id  limit 1");
		return $topact;
	}  
	
public function sale($id)
	{
		$db = new DataBase();
		$db->connect();
		 
		$result = $db->select($this->table, $this->table."_id = $id  limit 1");
		if($result){$saleact= $result->sale;}
		($saleact==0) ? $saleact=1 : $saleact=0;
		$data["sale"]=$saleact;	
		$db->update($data, $this->table, $this->table."_id = $id  limit 1");
		return $saleact;
	}  
	
public function slid($id)
	{
		$db = new DataBase();
		$db->connect();
		 
		$result = $db->select($this->table, $this->table."_id = $id  limit 1");
		if($result){$slidact= $result->slid;}
		($slidact==0) ? $slidact=1 : $slidact=0;
		$data["slid"]=$slidact;	
		$db->update($data, $this->table, $this->table."_id = $id  limit 1");
	} 
	
public function archive($id)
	{
		$db = new DataBase();
		$db->connect();
		$data["arch"]=1;	
		$data["pub"]=0;	
		$db->update($data, $this->table, $this->table."_id = $id  limit 1");
	} 
	
public function delete($id)
	{
		$db = new DataBase();
		$db->connect();
		
		$db->delete($this->table,$this->table."_id=$id");
		return true;
	} 
		
public function pubone($id,$where="")
	{
		$db = new DataBase(); 
		$db->connect(); 
		$where = ($where=="")? "": " and ".$where;
		$data["pub"]=0;
		$db->update($data, $this->table, $this->table."_id > 0 $where ");
		$data["pub"]=1;
		$db->update($data, $this->table, $this->table."_id = $id  limit 1");
	} 

public function up($id,$where="")
	{
		$db = new DataBase();
		$db->connect();  
		$where = ($where=="")? "": " and ".$where;
		$result = $db->select($this->table, "ordre < $id $where order by ordre desc limit 1");
		if($result){
			$pubact=$result -> ordre;
			$data["ordre"]=0;		
			$db->update($data, $this->table, "ordre = $id  limit 1");
			
			$data["ordre"]=$id;		
			$db->update($data, $this->table, "ordre = $pubact  limit 1");
			
			$data["ordre"]=$pubact;		
			$db->update($data, $this->table, "ordre = 0  limit 1");
		}
	}  
	
public function down($id,$where="")
	{
		$db = new DataBase();
		$db->connect();  
		$where = ($where=="")? "": " and ".$where;
		$result = $db->select($this->table, "ordre > $id $where order by ordre asc limit 1");
		if($result){
			$pubact=$result -> ordre;}
			
			$data["ordre"]=0;		
			$db->update($data, $this->table, "ordre = $id  limit 1");
			
			$data["ordre"]=$id;		
			$db->update($data, $this->table, "ordre = $pubact  limit 1");
			
			$data["ordre"]=$pubact;		
			$db->update($data, $this->table, "ordre = 0  limit 1");
		}
	}
