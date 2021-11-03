<?php 
require_once 'DataBase.class.php'; 
  
  
class ProductTools {
	
	public function quantity_rest($id){
		$db = new DataBase();
		$db->connect();

		$result = $db->selectm('SUM(`quantity_rest`) as `quantity_rest`', 'product_stock as ps INNER JOIN provides_bl as bl on ps.bl_provider=bl.provides_bl_id', "bl.status_payment > 0 and ps.product = $id");
		return intval($result[0] -> quantity_rest);
	}

	public function TotalProductIn(){  
		   $db = new DataBase();
		   $db->connect();
			$result = $db->selectm('SUM(quantity_rest) as quantity_rest', 'product_stock as ps INNER JOIN provides_bl as bl on ps.bl_provider=bl.provides_bl_id', "bl.status_payment > 0");  
			return $result[0] -> quantity_rest;  
		}

	public function ProductLast(){  
		$db = new DataBase();
		$db->connect();
		 $result = $db->selectm('*', 'product_stock as ps INNER JOIN provides_bl as bl on ps.bl_provider=bl.provides_bl_id', "ps.product > 0 and bl.status_payment > 0 GROUP BY ps.product HAVING SUM(ps.quantity_rest) <= 1");  
		 return count($result);  
	 }
	 public function ProductEnded(){  
		 $db = new DataBase();
		 $db->connect();
		 $result = $db->selectm('*', 'product_stock as ps INNER JOIN provides_bl as bl on ps.bl_provider=bl.provides_bl_id', "ps.product > 0 and bl.status_payment > 0 GROUP BY ps.product HAVING SUM(ps.quantity_rest) = 0");  
		 return count($result);  
	 }
	public function ProductInStock($id_prd){  
		$db = new DataBase();
		$db->connect();
		$result = $db->selectm('*', 'product_stock as ps INNER JOIN provides_bl as bl on ps.bl_provider=bl.provides_bl_id', "ps.product = ".$id_prd." and bl.status_payment > 0");  
		return count($result);  
	}
	public function ProductPassedStock($id){  
		$db = new DataBase();
		$db->connect();
			$result = $db->selectm('*', 'product_stock', "product=".$id);
			return ($result)? 1 : 0;
		}
}
	