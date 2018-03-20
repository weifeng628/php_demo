<?php
/**
 * 多维数组排序相同的key整合，并相加
 */

//原数组
$items = array(
    array('http://www.abc.com/a/', 100, 120),
    array('http://www.abc.com/b/index.php', 50, 80),
    array('http://www.abc.com/a/index.html', 90, 100),
    array('http://www.abc.com/a/?id=12345', 200, 33),
    array('http://www.abc.com/c/index.html', 10, 20),
    array('http://www.abc.com/abc/', 10, 30)
);

$newArr = [];

foreach($items as $val){
    //截取最后一个/ 前边的值 当做key
    $key = substr($val[0],0,strripos ($val[0],'/'));
    //存在相同的key 则 计算$val1和$val2的和, 否则直接赋值
    if(isset($newArr[$key])){
        $newArr[$key][1] += $val[1];
        $newArr[$key][2] += $val[2];
    }else{
        $newArr[$key][0] = $key;
        $newArr[$key][1] = $val[1];
        $newArr[$key][2] = $val[2];
    }
}

print_r(array_values($newArr));
