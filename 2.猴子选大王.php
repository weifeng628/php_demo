<?php

function king($n, $m)
{
	//建立一个包含指定范围的数组
	$arr = range(1,$n);
	$i = 0;
	while(count($arr) >1){
		$i++;
		$head = array_shift($arr);
		if($i % $m != 0){
			array_push($arr,$head);
		}
	}
	return $arr[0];
}


echo $maxNumver = king(9,3);

