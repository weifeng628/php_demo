<?php
/**
 * 一群猴子排成一圈，按1，2，...，n依次编号。然后从第1只开始数，数到第m只,把它踢出圈，从它后面再开始数，再数到第m只，在把它踢出去...，
 * 如此不停的进行下去，直到最后只剩下一只猴子为止，那只猴子就叫做大王。要求编程模拟此过程，输入m、n, 输出最后那个大王的编号。
 */
/**
 * @param int $n n个猴子
 * @param int $m m是固定数
 * @return mixed
 */
function king($n, $m)
{
    //建立一个包含指定范围的数组
    $arr = range(1,$n);
    $i   = 1;
    
    while(count($arr) >1){
        //弹出最前边的猴子，做判断
        $head = array_shift($arr);
        //判断如果$i 和 $m 的余数 !=0,则证明弹出的这只猴子 不是 第m个，把它放回队伍的尾部
        if($i % $m != 0){
            array_push($arr,$head);
        }
        $i++;
    }
    return $arr[0];
}


echo king(12,3);

