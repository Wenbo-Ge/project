<?php

// class，object，new，function的区别
// 类，对象，实例，方法；
// 类里可以放方法function，属性attributes
// 实例化后就变成了对象
// 类是对象模板（大概的一个结构），方法可以定义/描述一个类
// 例子：人


class Item {

	private $id;
	private $type;
	private $price;
	private $image_url;
	private $description;

	function __construct($type='',$price=0,$image_url='',$description=''){
		$this->type=$type;
		$this->price=$price;
		$this->image_url=$image_url;
		$this->description=$description;
	}
	// 把dbdata传给对象（item object）
	public function arrayAdapter ($row){
		$this->id=$row['id'];
		$this->type=$row['type'];
		$this->price=$row['price'];
		$this->image_url=$row['url'];
		$this->description=$row['description'];
		return $this;
	}

	public static function test(){
		return 3;
		//没有用到已经定义过的属性，就直接return，不用return $this,但用static时不依赖对象，直接用类名：：方法名调用
	}

	public function getId(){
		return $this->id;
	}

	public function getType(){
		return $this->type;
	}
	public function setType($type){
		$this->type=$type;
		return $this;
	}

	public function getPrice(){
		return $this->price;
	}
	public function setPrice($price){
		$this->price=$price;
		return $this;
	}

	public function getImg_url(){
		return $this->image_url;
	}
	public function setImg_url($image_url){
		$this->image_url=$image_url;
		return $this;
	}

	public function getDescription(){
		return $this->description;
	}
	public function setDescription($description){
		$this->description=$description;
		return $this;
	}
}




?>