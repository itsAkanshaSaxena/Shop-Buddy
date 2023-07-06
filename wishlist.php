<?php 
require('topu.php');
$name1=$_SESSION['name'];
    $res1=mysqli_query($con1,"select * from users where name='$name1'");
    $row1=mysqli_fetch_assoc($res1);
    $_SESSION['USER_ID']=$row1['id'];
$uid=$_SESSION['USER_ID'];
 
    if(isset($_GET['id'])){
        $wid=$_GET['id'];
        mysqli_query($con1,"delete from wishlist where id='$wid' and user_id='$uid'");
    }

$res=mysqli_query($con1,"select product.name,product.image,product.price,product.mrp,wishlist.id,wishlist.product_id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="custom.js"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <!-- End Product Description -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
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
                                  <span class="breadcrumb-item active text-3xl text-gray-800 font-bold mb-2 mt-4 ml-5">Wishlist</span>
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
                                            <th class="product-name p-3 text-sm font-semibold tracking-wide text-left">Name of products</th>
                                            <th class="product-name p-3 text-sm font-semibold tracking-wide text-left">Quantity</th>
                                            <th class="product-remove p-3 text-sm font-semibold tracking-wide text-left">Remove</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										while($row=mysqli_fetch_assoc($res)){
										?>
											<tr class="bg-gray-50">
												<td class="product-thumbnail p-3 "><a href="#"><img class="h-20 w-16"src="http://localhost/Shop%20Buddy/images/<?php echo $row['image']?>"  /></a></td>
												<td class="product-name p-3 font-bold text-slate-700 text-lg"><a href="#"><?php echo $row['name']?></a>
													<ul  class="pro__prize">
														<li class="old__prize text-gray-400 font-bold my-1 line-through">₹<?php echo $row['mrp']?>/-</li>
														<li class="text-slate-700 text-lg">₹<?php echo $row['price']?>/-</li>
													</ul>
												</td>
                                                <td class=" p-3 font-bold  text-lg">
                                                    <select id="qty">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                    </select>
                                                </td>
												<td class="product-remove p-3 font-bold  text-lg">
                                                    <a href="wishlist.php?id=<?php echo $row['id']?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 hover:text-red-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a></td>
                                                    <td>
                                                        <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $row['product_id']?>','add')">
                                                            <div class="add-to-cart h-8 w-28 bg-yellow-500 flex items-center justify-center text-white rounded text-md cursor-pointer hover:bg-yellow-600">
                                                            
                                                            Add to Cart
                                                            </div>
                                                        </a>
                                                    </td>
											</tr>
											<?php } ?>
                                    </tbody>
    
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 ">
                                    <div class="buttons-cart--inner flex w-full mt-3 space-x-96">
                                        <div class="buttons-cart text-white bg-green-900 text-center rounded h-8 p-1 font-bold ">
                                            <a href="home.php">Continue Shopping</a>
                                        </div>
                                        <!--<div class="buttons-cart checkout--btn text-white bg-red-800 text-center rounded h-8 w-20 p-1 font-bold ">
                                            <a href="checkout.php ">Checkout</a>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>


</script>

    </body>         
</html>
<?php
require('footer.inc.php');
?>