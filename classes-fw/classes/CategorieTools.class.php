<?php  
require_once 'DB.class.php';
  
  
class CategorieTools {  

    function __construct($table) {  
        $this->table = $table; 
    }  
   
    public function getliste($pere="",$where="",$order="ordre asc")  
    {  
        $db = new DB();
		$order = ($order=="")? "": " order by ".$order;
		$where = ($where=="")? "": " and ".$where;
		$pere = ($pere==="")? " pere > 0 ": " pere = $pere ";
        $result = $db->selectn($this->table, "$pere $where  ".$order);  
  
        return $result;  
    } 
   
   public function get($id)  
    {  
        $db = new DB();  
        $result = $db->select($this->table, $this->table."_id = $id");  
  
        return $result;  
    } 
	
	
	public function getlab($id,$lang=1)
    {  
        $db = new DB();
		$db->connect();
		$select='tab1.'.$this->table.'_id as id1, tab2.'.$this->table.'_id as id2, tab1.lib'.$lang.' as lib1,  tab2.lib'.$lang.' as lib2';
		$table=$this->table.' as tab1 inner join '.$this->table.' as tab2 on tab1.pere=tab2.'.$this->table.'_id';
		
        $result = $db->selectm($select,$table,'tab1.'.$this->table."_id = $id");  
  
        return $result;  
    } 
	public function delete($id)
	{
		$db = new DB();
		
			$db->delete($this->table,$this->table."_id=$id");
			$db->delete($this->table,"pere=$id");
			return true;
  }  
  
   public function insert($data)
	{
		 $db = new DB();
		 foreach($data as $k=>$v){
			$data[$k]="'$v'";
			}
		 $id = $db->insert($data, $this->table); 
		 $data = array(
				"ordre" => "$id"
            ); 
			 $db->update($data, $this->table, $this->table.'_id = '.$id); 
  }  
  
    public function update($data)
	{
		foreach($data as $k=>$v){
			if($k=="id"){$id=$v;}
			else{$k2=$k; $data2[$k2]="'$v'";}
			
			}
		$db = new DB();
		$db->update($data2, $this->table, $this->table.'_id = '.$id); 
		}  
		
	public function pub($id)
	{
		 $db = new DB();  
        $result = $db->select($this->table, $this->table."_id = $id  limit 1");
		if($result){$pubact=$result["pub"];}
		($pubact==0) ? $pubact=1 : $pubact=0;
		$data["pub"]=$pubact;
				
		$db->update($data, $this->table, $this->table."_id = $id  limit 1");
		
		}  

	public function top($id)
	{
		 $db = new DB();  
        $result = $db->select($this->table, $this->table."_id = $id  limit 1");
		if($result){$pubact=$result["top"];}
		($pubact==0) ? $pubact=1 : $pubact=0;
		$data["top"]=$pubact;
				
		$db->update($data, $this->table, $this->table."_id = $id  limit 1");
		
		}  
	public function up($id,$pere)
	{
		 $db = new DB();  
        $result = $db->select($this->table, "ordre < $id and pere=$pere  order by ordre desc limit 1");
		if($result){$pubact=$result["ordre"];}
		
		$data["ordre"]=0;		
		$db->update($data, $this->table, "ordre = $id  limit 1");
		
		$data["ordre"]=$id;		
		$db->update($data, $this->table, "ordre = $pubact  limit 1");
		
		$data["ordre"]=$pubact;		
		$db->update($data, $this->table, "ordre = 0  limit 1");
		
		}  
		public function down($id,$pere)
	{
		 $db = new DB();  
        $result = $db->select($this->table, "ordre > $id and pere=$pere  order by ordre asc limit 1");
		if($result){$pubact=$result["ordre"];}
		
		$data["ordre"]=0;		
		$db->update($data, $this->table, "ordre = $id  limit 1");
		
		$data["ordre"]=$id;		
		$db->update($data, $this->table, "ordre = $pubact  limit 1");
		
		$data["ordre"]=$pubact;		
		$db->update($data, $this->table, "ordre = 0  limit 1");
		
		}  
}
