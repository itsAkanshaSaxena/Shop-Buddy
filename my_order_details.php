<?php 
require('topu.php');

$order_id=get_safe_value($con1,$_GET['id']);
?>
<div class="ht__bradcaump__area" >
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table class="table w-full p-3">
                                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                                            <tr>
                                                <th class="product-thumbnail p-3 text-sm font-semibold tracking-wide text-left">Product Name</th>
												<th class="product-thumbnail p-3 text-sm font-semibold tracking-wide text-left">Product Image</th>
                                                <th class="product-name p-3 text-sm font-semibold tracking-wide text-left">Qty</th>
                                                <th class="product-price p-3 text-sm font-semibold tracking-wide text-left">Price</th>
                                                <th class="product-price p-3 text-sm font-semibold tracking-wide text-left">Total Price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php

                                                $name1=$_SESSION['name'];
                                                $res1=mysqli_query($con1,"select * from users where name='$name1'");
                                                $row1=mysqli_fetch_assoc($res1);
                                                $_SESSION['USER_ID']=$row1['id'];

											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con1,"select distinct(order_detail.id) ,order_detail.product,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product=product.id");
											$total_price=0;
											while($row=mysqli_fetch_assoc($res)){
											$total_price=$total_price+($row['qty']*$row['price']);
                                            $r=$row['product'];
											?>
                                            <tr class="bg-gray-50 mb-3 p-4">
												<td class="product-name p-3  font-bold text-slate-700 text-lg"><?php echo $row['name']?></td>
                                                <td class="product-name p-3  font-bold text-slate-700 text-lg"><img src="http://localhost/Shop%20Buddy/images/<?php echo $row['image'] ?>"  /></td>
												<td class="product-name p-3  font-bold text-slate-700 text-lg"><?php echo $row['qty']?></td>
												<td class="product-name p-3  font-bold text-slate-700 text-lg">₹<?php echo $row['price']?>/-</td>
												<td class="product-name p-3  font-bold text-slate-700 text-lg">₹<?php echo $row['qty']*$row['price']?>/-</td>
                                                <td class="revieww p-3 "> 
                                                    <a class="fr__btn" href="review.php?iid=<?php echo $r; ?>">
                                                            <div class="add-to-cart h-8 w-28 bg-pink-500 flex items-center justify-center text-white rounded text-md cursor-pointer hover:bg-pink-600">
                                                            Write a Review
                                                            </div>
                                                        </a>
                                            </tr>
                                            <?php } ?>
											<tr class="bg-gray-50 mb-3 p-4">
												<td colspan="3"></td>
												<td class="product-name p-3  font-bold text-slate-700 text-2xl">Total Price</td>
												<td class="product-name p-3  font-bold text-slate-700 text-2xl">₹<?php echo $total_price?>/-</td>
                                                
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        						
<?php require('footer.inc.php')?>        