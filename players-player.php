<?php

// class，object，new，function的区别
// 类，对象，实例，方法；
// 类里可以放方法function，属性attributes
// 实例化后就变成了对象
// 类是对象模板（大概的一个结构），方法可以定义/描述一个类
// 例子：人


class Players {

	private $id;
	private $name;
	private $image_url;
	private $jerseyNumber;

	function __construct($name='',$image_url='',$jerseyNumber=''){
		$this->name=$name;
		$this->image_url=$image_url;
		$this->jerseyNumber=$jerseyNumber;
	}
	// 把dbdata传给对象（item object）
	public function arrayAdapter ($row){
		$this->id=$row['id'];
		$this->name=$row['name'];
		$this->image_url=$row['url'];
		$this->jerseyNumber=$row['jerseyNumber'];
		return $this;
	}

	public static function test(){
		return 3;
		//没有用到已经定义过的属性，就直接return，不用return $this,但用static时不依赖对象，直接用类名：：方法名调用
	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name=$name;
		return $this;
	}


	public function getImg_url(){
		return $this->image_url;
	}
	public function setImg_url($image_url){
		$this->image_url=$image_url;
		return $this;
	}

	public function getJerseyNumber(){
		return $this->jerseyNumber;
	}
	public function setJerseyNumber($jerseyNumber){
		$this->jerseyNumber=$jerseyNumber;
		return $this;
	}
}




?>