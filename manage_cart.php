<?php
require('connection.inc.php');
require('function.inc1.php');
require('add_to_cart.inc.php');

$pid=get_safe_value($con1,$_POST['pid']);
$qty=get_safe_value($con1,$_POST['qty']);
$type=get_safe_value($con1,$_POST['type']);

$obj=new add_to_cart();

if($type=='add'){
	$obj->addProduct($pid,$qty);
}

if($type=='remove'){
	$obj->removeProduct($pid);
}

if($type=='update'){
	$obj->updateProduct($pid,$qty);
}

echo $obj->totalProduct();
?>