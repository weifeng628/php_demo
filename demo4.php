<?php

/**
 * 题目：使用php://input接收post提交的参数，从db中获取数据，并使用var_export写入文件缓存，下次访问从文件中获取数据。
 */

$params = file_get_contents('php://input');
parse_str($params,$output);

$ids    = isset($output['id']) ? $output['id'] : '';
if(!$ids){
    return false;
}

$filePath = 'data-'.$ids.'.php';

$list = [];
if(file_exists($filePath)){
    $list = include_once($filePath);
}else{
    //连接数据库并查询数据
    $dbh    = new PDO('mysql:host=localhost;dbname=test','root','root');
    $sql    = 'SELECT * from user where `id` in ('.$ids . ')';
    foreach($dbh->query($sql,PDO::FETCH_ASSOC) as $row) {
        $list[] = $row;
    }
    if(!empty($list)){
        //返回一个变量的字符串表示，并存到文件中
        $data = '<?php'.PHP_EOL . 'return ';
        $data .= var_export($list,true);
        $data .= ';';
        file_put_contents($filePath,$data);
    }
}

print_r($list);
