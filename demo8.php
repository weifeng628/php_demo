<?php
/**
 * 利用数组栈实现翻转字符串功能
 */

$str	= 'abcdef';

//字符串变为数组
$strArr = [];
for($i  = 0;$i < strlen($str);$i++){
    array_push($strArr,$str[$i]);
}

//循环$strArr ,并弹出数组中的最后一个元素给新数组
$newArr = [];
while(count($strArr)){
	$newArr[] = array_pop($strArr);
}

//把数组变为字符串
$newStr = implode('',$newArr);

print_r($newStr);
