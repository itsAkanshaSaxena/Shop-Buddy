<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con1,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con1,$str);
	}
}

function get_product($con1,$limit='',$cat_id='',$product_id='',$search_str='',$sort_order=''){
	$sql="select product.*,categories.categories from product,categories where product.status=1 ";
	if($cat_id!=''){
		$sql.=" and product.categories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and product.id=$product_id ";
	}
	$sql.=" and product.categories_id=categories.id ";
	if($search_str!=''){
		$sql.=" and (product.name like '%$search_str%' or product.description like '%$search_str%') ";
	}
	if($sort_order!=''){
		$sql.=$sort_order;
	}else{
		$sql.=$sort_order;
	}
	
	
	if($limit!=''){
		$sql.=" limit $limit";
	}
	
	$res=mysqli_query($con1,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}



/*function getUserDetailsByid($uid=''){
	global $con1;
	$data['name']='';
	$data['email']='';
	$data['mobile']='';
	
	$name1=$_SESSION['name'];
    $res1=mysqli_query($con1,"select * from users where name='$name1'");
    $row1=mysqli_fetch_assoc($res1);
    $_SESSION['USER_ID']=$row1['id'];

	if(isset($_SESSION['USER_ID'])){
		$uid=$_SESSION['USER_ID'];
	}
	
	$row=mysqli_fetch_assoc(mysqli_query($con1,"select * from user where id='$uid'"));
	$data['name']=$row['name'];
	$data['email']=$row['email'];
	$data['mobile']=$row['mobile'];
	return $data;
}*/
?>

