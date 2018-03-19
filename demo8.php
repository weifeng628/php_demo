<?php

/**
 * 利用数组栈实现翻转字符串功能
 */

$str	= 'abcdef';
//字符串变为数组
$strArr = str_split($str);

$newArr = [];

while(count($strArr)){
	//弹出数组中的最后一个元素 给新数组
	$newArr[] = array_pop($strArr);
}

//数组变为字符串
$newStr = implode('',$newArr);

print_r($newStr);
