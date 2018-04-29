<?php
require_once('shop-item.php');

class DBConnection {
	private $conn;

	private function getConnInstance(){
		if (!$this->conn) {
			$this->conn = new PDO('mysql:host=localhost;dbname=BarcaShop;charset=utf8mb4','root','root');
		}
		return $this->conn;
	}

	

	public function getAllItemsReturnObj(){
		$stmt=$this->getConnInstance()->query('SELECT * FROM Items');
		// 静态方法的使用：类名PDO ：：方法名
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$items=array();
		// 每一个返回的是一个object，返回一个index array of object
		foreach ($result as $row) {
			
			$item= new Item();
			// 第一种方法：
			// $item->setName($row['name']);+另外3个set
			// 第二种方法：
			// 用$items[]往$items=array()传值
			$items[]=$item->arrayAdapter($row);
		}
		return $items;
	}
}






?>