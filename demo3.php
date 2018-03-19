<?php

$commits	= 'A,B,B,A,C,C,D,A,B,C,D,C,C,C,D,A,B,C,D,A';
$answers	= 'A,A,B,A,D,C,D,A,A,C,C,D,C,D,A,B,C,D,C,D';
$grade		= 5;

$commitsArray 	= explode(',',$commits);
$answersArray 	= explode(',',$answers);

//带索引检查计算数组的交集
$resArr			= array_intersect_assoc ($commitsArray,$answersArray);
//计算总分
$totalPoints = count($resArr) * 5;

echo $totalPoints;

