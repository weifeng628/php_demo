<?php

/**
 * 实现一个对象的数组式访问接口
 */

class Test implements ArrayAccess
{
    protected $data;
    
    /**
     * 获取一个偏移位置的值
     * @param mixed $offset
     * @return mixed|string
     */
    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : '';
    }
    
    /**
     * 设置一个偏移位置的值
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if($offset){
            $this->data[$offset] = $value;
        }else{
            $this->data[] = $value;
        }
    }
    
    /**
     * 检查一个偏移位置是否存在
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }
    
    /**
     * 释放一个偏移位置的值
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        if($this->offsetExists($offset)){
            unset($this->data[$offset]);
        }
    }
    
}

$obj 		= new Test();
$obj[]		= 123;
$obj[] 		= 'aaa';
$obj['aa']	= 'bbb';

print_r($obj['aa']);