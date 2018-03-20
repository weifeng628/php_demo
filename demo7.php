<?php

/**
 * 使用serialize序列化一个对象，并使用__sleep和__wakeup方法。
 */
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
    
    /**
     * 序列化的时候调用的方法
     * @return array
     */
	public function __sleep()
	{
		return ['name','age','sex'];
	}
    
    /**
     * 反序列化时调用的方法
     */
	public function __wakeup()
	{
		$this->name = '微风';
	}
}

$obj	= new Test('张天',20,'男');
$res	= serialize($obj); //序列化
$res2	= unserialize($res); //反序列化

print_r($res);
print_r($res2);