<?php

/**
 * 题目: 从m个数中选出n个数来(0<n<=m)，要求n个数之间不能有重复，其和等于一个定值k。求一段程序，罗列所有的可能
 */

//1.定义的数据，和k值
$arr = [11,18,12,1,-2,20,8,10,7,6];
$k   = 18;

//2.计算数据的数量和数据可以组合的数量。
$numCount   = count($arr);
$total      = 2 << $numCount -1; //等于 2 * (2^n)

//3.循环总的组合数量,并整合出符合的数值
$newArr = [];
for ($i = 1; $i < $total; $i++) {
    
     //3.1 定义临时数组,计算出每次循环 i 的二进制值
     //二进制的位数跟$numsCount的数量一致，不足的拿0填充，方便后续循环，防止报错
    $binary  = decbin($i);
    $bingStr = str_pad($binary,$numCount,'0',STR_PAD_LEFT);

    //3.2 循环数据并计算出二进制位等于$i时,$arr可以排列出的所有数值,并放置到$tempArr中
    $tempArr = [];
    for($j = 0;$j < $numCount; $j++){
        if(1 == $bingStr[$j]){
            $tempArr[] = $arr[$j];
        }
    }

    //3.3 判断$temArr中所有值的和是否等于$k,等于就放到一个新数组中。
    if($k == array_sum($tempArr)){
        $newArr[$i] = json_encode($tempArr);
    }
}

print_r($newArr);
