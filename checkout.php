<?php 
require('topu.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='home.php';
	</script>
	<?php
}

$cart_total=0;

if(isset($_POST['submit'])){
	$address=get_safe_value($con1,$_POST['address']);
	$city=get_safe_value($con1,$_POST['city']);
	$pincode=get_safe_value($con1,$_POST['pincode']);
	$payment_type=get_safe_value($con1,$_POST['payment_type']);
    


    $name1=$_SESSION['name'];
    $res=mysqli_query($con1,"select * from users where name='$name1'");
    $row=mysqli_fetch_assoc($res);
    $_SESSION['USER_ID']=$row['id'];



	
    $user_id=$_SESSION['USER_ID'];
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con1,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$cart_total=$cart_total+($price*$qty);
		
	}
	$total_price=$cart_total;
	$payment_status='Pending';
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
	
	
	mysqli_query($con1,"insert into `order`(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price')");
	
	$order_id=mysqli_insert_id($con1);


	if($payment_type=='COD'){
		$payment_status='Success';
		?>
		<script>
			alert("Order Placed");
			window.location.href='home.php';
		</script>
		<?php
	}//paytm integration
	if($payment_type=='PayTm'){
		$paytm_oid=$order_id.'_'.$user_id.'_'.rand(111111111,999999999);
		$html='<form method="post" action="pgRedirect.php" name="frmPayment" style="display:none;">
				<input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="'.$paytm_oid.'">
				<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="'.$user_id.'"></td>
				
				<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				<input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
				<input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT" value="'.$total_price.'">
				<input value="CheckOut" type="submit"	onclick=""></td>
				
				</form>
				<script type="text/javascript">
						document.frmPayment.submit();
					</script>';
		echo $html;
	}




	
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con1,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		
		mysqli_query($con1,"insert into `order_detail`(order_id,product,qty,price) values('$order_id','$key','$qty','$price')");
	}
	
	
	unset($_SESSION['cart'])
	?>
	<script>
        alert("Your order has been placed successfully!");
		window.location.href='home.php';
	</script>
	<?php
	
	
}
?>


        
        <!-- cart-main-area start -->
        <div class="checkout-wrap  mt-8">
            <div class="container ml-6 mr-6">
                <div class="row flex space-x-4 ">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list flex">
                                <div class="accordion bg-gray-100 p-4 mr-4 rounded">
                                    
									<?php 
									$accordion_class='accordion__title';
									if(!isset($_SESSION['USER_LOGIN'])){
									$accordion_class='accordion__hide';
									?>
									<div class="accordion__title">
                                        
                                    </div>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login mb-6">
                                                        <!--<form id="login-form" method="post">
                                                            <h5 class="checkout-method__title">Login</h5>
                                                            <div class="single-input mr-3">
                                                                <input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
																<span class="field_error" id="login_email_error"></span>
                                                            </div>
															
                                                            <div class="single-input mr-3">
                                                                <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
																<span class="field_error" id="login_password_error"></span>
                                                            </div>
															
                                                            <p class="require">* Required fields</p>
                                                            <div class="dark-btn mr-3">
                                                                <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                                            </div>
															<div class="form-output login_msg">
																<p class="form-messege field_error"></p>
															</div>
                                                        </form>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                       <!-- <form action="#">
                                                            <h5 class="checkout-method__title">Register</h5>
                                                            <div class="single-input">
                                                                <input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
																<span class="field_error" id="name_error"></span>
                                                            </div>
															<div class="single-input">
                                                                <input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
																<span class="field_error" id="email_error"></span>
                                                            </div>
															
                                                            <div class="single-input">
                                                                <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
																<span class="field_error" id="mobile_error"></span>
                                                            </div>
															<div class="single-input">
                                                                <input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
																<span class="field_error" id="password_error"></span>
                                                            </div>
                                                            <div class="dark-btn">
                                                                <button type="button" class="fv-btn" onclick="user_register()">Register</button>
                                                            </div>
                                                        </form>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<?php } ?>
                                    <div class="<?php echo $accordion_class?>  font-bold text-gray-600 text-lg mt-0 mb-5">
                                        ADDRESS INFORMATION
                                    </div>
									<form method="post">
										<div class="accordion__body">
											<div class="bilinfo">
												
													
														<div class="col-md-12">
															
																<input type="text" class="p-1 h-12 rounded w-full mb-4" name="address" placeholder="Street Address" required>
															
                                                            
														</div>
                                                        <div class="row">
														<div class="col-md-6">
															<div class="single-input mr-2">
																<input type="text" class="p-1 h-12 rounded" name="city" placeholder="City/State" required>
															</div>
														</div>
                                                    
														<div class="col-md-6">
															<div class="single-input ">
																<input type="text" class="p-1 h-12 rounded" name="pincode" placeholder="Post code/ zip" required>
															</div>
														</div>
														
													</div>
												
											</div>
										</div>
										<div class="<?php echo $accordion_class?>  font-bold text-gray-600 text-lg mt-8 mb-4">
											PAYMENT INFORMATION
										</div>
										<div class="accordion__body">
											<div class="paymentinfo">
												<div class="single-method  text-gray-600 text-lg ml-4">
													COD <input type="radio" name="payment_type" value="COD" required/>
													&nbsp;&nbsp;PayTm <input type="radio" name="payment_type" value="PayTm" required/>
												</div>
												<div class="single-method">
												  
												</div>
											</div>
										</div>
										 <input type="submit" name="submit" class="fv-btn h-12 w-64 bg-pink-600 flex items-center justify-center text-white  text-2xl rounded text-md cursor-pointer hover:bg-white focus:ring-pink-600 hover:border-pink-600 hover:text-pink-600 mt-8"/>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details bg-gray-100 rounded w-max p-3">
                            <h5 class="order-details__title text-2xl font-bold text-gray-500">YOUR ORDER</h5>
                            
                            <div class="order-details__item mt-4 p-4">
                                <?php
								$cart_total=0;
								foreach($_SESSION['cart'] as $key=>$val){
								$productArr=get_product($con1,'','',$key);
								$pname=$productArr[0]['name'];
								$mrp=$productArr[0]['mrp'];
								$price=$productArr[0]['price'];
								$image=$productArr[0]['image'];
								$qty=$val['qty'];
								$cart_total=$cart_total+($price*$qty);
								?>
								<div class="single-item flex space-x-6 mb-3 ">
                                    <div class="single-item__thumb ml-3">
                                       
                                        <img class="h-20 w-16  "src="http://localhost/Shop%20Buddy/images/<?php echo $productArr[0]['image']?>" alt="product images"/>

                                    </div>
                                    <div class="single-item__content font-bold text-slate-700 text-lg ml-3">
                                        <a href="#"><?php echo $pname?></a>
                                        <br/>
                                        <span class="price ml-6">₹<?php echo $price*$qty?>/-</span>
                                    </div>
                                    <div class="single-item__remove text-right mr-3">
                                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 hover:text-red-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                        </a>
                                    </div>
                                </div>
								<?php } ?>
                            </div>
                            <div class="ordre-details__total flex space-x-20">
                                <h5 class="font-bold text-gray-600 text-lg mt-6">ORDER TOTAL</h5>
                                <span class="price font-bold text-slate-700 text-lg mt-6">₹<?php echo $cart_total?>/-</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- End Product Description -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <script type="text/javaScript">

        function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}
			jQuery('.htc__qua').html(result);
		}	
	});	
}



</script>

        						
<?php require('footer.inc.php')?>        