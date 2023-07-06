<?php 
require('topu.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>   
<div class="ht__bradcaump__area mt-4" >
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active text-3xl text-gray-800 font-bold mb-2 mt-4 ml-5">Shopping Cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table class="table w-full p-3">
                                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                                        <tr>
                                            <th class="product-thumbnail p-3 text-sm font-semibold tracking-wide text-left">Products</th>
                                            <th class="product-name p-3 text-sm font-semibold tracking-wide text-left">Name of Products</th>
                                            <th class="product-price p-3 text-sm font-semibold tracking-wide text-left">Price</th>
                                            <th class="product-quantity p-3 text-sm font-semibold tracking-wide text-left">Quantity</th>
                                            <th class="product-subtotal p-3 text-sm font-semibold tracking-wide text-left">Total</th>
                                            <th class="product-remove p-3 text-sm font-semibold tracking-wide text-left">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if(isset($_SESSION['cart'])){

											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($con1,'','',$key);
											$pname=$productArr[0]['name'];
											$mrp=$productArr[0]['mrp'];
											$price=$productArr[0]['price'];
											$image=$productArr[0]['image'];
										    $qty=$val['qty'];
											?>
											<tr class="bg-gray-50">
												<td class="product-thumbnail p-3 "><a href="#"><img class=" h-20 w-16"src="http://localhost/Shop%20Buddy/images/<?php echo $productArr[0]['image'] ?>"  /></a></td>
												<td class="product-name p-3 font-bold text-slate-700 text-lg "><a href="#"><?php echo $pname?></a>
													<ul  class="pro__prize ">
														<li class="old__prize text-gray-400 font-bold my-1 line-through">₹<?php echo $mrp?>/-</li>
														<li class="font-bold text-slate-700 text-lg ">₹<?php echo $price?>/-</li>
													</ul>
												</td>
												<td class="product-price p-3 text-sm font-bold text-slate-700 text-lg "><span class="amount">₹<?php echo $price?>/-</span></td>
												<td class="product-quantity p-3 text-sm text-gray-700 font-bold hover:text-gray-900"><input type="number" id="<?php echo $key?>qty" value="<?php echo $val['qty']?>" />
												<br/><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">Update</a>
												</td>
												<td class="product-subtotal p-3 font-bold text-slate-700 text-lg">₹<?php echo $qty*$price?>/-</td>
												<td class="product-remove p-3 text-sm text-gray-700">
                                                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 hover:text-red-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a></td>
											</tr>
											<?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 ">
                                    <div class="buttons-cart--inner flex w-full mt-3 space-x-96">
                                        <div class="buttons-cart text-white bg-green-900 text-center rounded h-8 p-1 font-bold ">
                                            <a href="home.php">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn text-white bg-red-800 text-center rounded h-8 w-20 p-1 font-bold ">
                                            <a href="checkout.php ">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
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
				window.location.href='cart.php';
			}
			jQuery('.htc__qua').html(result);
		}	
	});	
}
</script>

    </body>         
</html>
<?php
require('footer.inc.php');
?>