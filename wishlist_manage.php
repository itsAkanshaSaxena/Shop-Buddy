<?php
require('connection.inc.php');
require('function.inc1.php');
require('add_to_cart.inc.php');

$pid=get_safe_value($con1,$_POST['pid']);
$type=get_safe_value($con1,$_POST['type']);

if(isset($_SESSION['USER_LOGIN'])){
    $name1=$_SESSION['name'];
    $res=mysqli_query($con1,"select * from users where name='$name1'");
    $row=mysqli_fetch_assoc($res);
    $_SESSION['USER_ID']=$row['id'];
	$uid=$_SESSION['USER_ID'];
	if(mysqli_num_rows(mysqli_query($con1,"select * from wishlist where user_id='$uid' and product_id='$pid'"))>0){
		//echo "Already added";
	}else{
		$added_on=date('Y-m-d h:i:s');
		mysqli_query($con1,"insert into wishlist(user_id,product_id,added_on) values('$uid','$pid','$added_on')");
		//wishlist_add($con1,$uid,$pid);
	}
	echo $total_record=mysqli_num_rows(mysqli_query($con1,"select * from wishlist where user_id='$uid'"));
}else{
	$_SESSION['WISHLIST_ID']=$pid;
	echo "not_login";
}
?>