<?php

class Test implements ArrayAccess
{
	protected $data;
	
	public function offsetGet($offset)
	{
		return isset($this->data[$offset]) ? $this->data[$offset] : '';
	}
	
	public function offsetSet($offset, $value)
	{
		if($offset){
			$this->data[$offset] = $value;
		}else{
			$this->data[] = $value;
		}
	}
	
	public function offsetExists($offset)
	{
		return isset($this->data[$offset]);
	}
	
	public function offsetUnset($offset)
	{
		if($this->offsetExists()){
			unset($this->data[$offset]);
		}
	}
	
	
}

$obj 		= new Test();
$obj[]		= 123;
$obj[] 		= 'aaa';
$obj['aa']	= 'bbb';

unset($obj['aa']);
print_r($obj['aa']);

