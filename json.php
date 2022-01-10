<?php
$data=file_get_contents('http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz');
$arrayData=json_decode($data,true);
foreach ($arrayData['data'] as $key => $value) {
    echo 'product id :'.$value['products_id'].
    '|product quality:'.$value['products_id'].
    '|product model:'.$value['products_model'].'<br>';}


?>