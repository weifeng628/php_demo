<?php

class Test
{
	protected $name;
	protected $age;
	protected $sex;
	
	public function __construct($name,$age,$sex)
	{
		$this->name	= $name;
		$this->age	= $age;
		$this->sex	= $sex;
	}
	
	public function __sleep()
	{
		return ['name','age','sex'];
	}
	
	public function __wakeup()
	{
		$this->name = '微风';
	}
}

$obj	= new Test('张天',20,'男');

$res	= serialize($obj); //序列化
print_r($res);
echo "<hr>";
$res2	= unserialize($res); //反序列化

print_r($res2);

