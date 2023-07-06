<?php 
require('top.php');
require('connection.inc.php');
require('function.inc1.php');

if(isset($_GET['id']) && $_GET['id']!=''){
	$cat_id=mysqli_real_escape_string($con1,$_GET['id']);
    $price_high_selected="";
    $price_low_selected="";
    $new_selected="";
    $old_selected="";
    $sort_order="order by product.id desc";
    if(isset($_GET['sort'])){
        $sort=mysqli_real_escape_string($con1,$_GET['sort']);
        if($sort=="price_high"){
            $sort_order="order by product.price desc";
            $price_high_selected="selected";
        }
        if($sort=="price_low"){
            $sort_order="order by product.price asc";
            $price_low_selected="selected";
        }
        if($sort=="new"){
            $sort_order="order by product.id desc";
            $new_selected="selected";
        }if($sort=="old"){
            $sort_order="order by product.id asc";
            $old_selected="selected";
        }
    }

	if($cat_id>0){
		$get_product=get_product($con1,'',$cat_id,'','',$sort_order);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}										
?>


<!-- Start Banner area -->
<div class="ht__bradcaump__area mb-6" >
                <img class ="w-full  object-contain"
                src="images/b3.jpeg" alt=""       
                >
</div>
        <!-- End Banner area -->

    <div class="container ">
        <div class="row ">
			<?php if(count($get_product)>0){?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
                        <div class="htc__grid__top">
                                <div class="htc__select__option">
                                <select class="ht__select border-solid border-2 border-gray-700 rounded-lg font-bold" onchange="sort_product_drop('<?php echo $cat_id ?>')" id="sort_product_id">
                                        <option value="">Default Sorting</option>
                                        <option value="price_low" <?php echo $price_low_selected?>>Sort by Price Low to High</option>
                                        <option value="price_high" <?php echo $price_high_selected?>>Sort by Price High to Low</option>
                                        <option value="new" <?php echo $new_selected?>>Sort by New Arrival</option>
                                        <option value="old" <?php echo $old_selected?>>Sort by Old Arrival</option>
                                    </select>
                                </div>
                               
                        </div>
                    <div class="main-section-products">
                        <div class="main-product flex">
                            <!--products php-->
                            <?php
								foreach($get_product as $list){
							?>
							<!-- Start Single Category -->

                            <div class="ml-3">
                                <div class="product-image w-48 h-64 mt-4 rounded-lg">
                                   <a href="product1.php?id=<?php echo $list['id']?>">
                                        <img class="w-full h-full object-contain  "src="http://localhost/Shop%20Buddy/images/<?php echo $list['image']?>" alt="product images"/>
                                    </a>
                                </div>
                                <div class="product-name text-black font-bold mt-2 text-sm flex">
                                   <?php echo $list['name'] ?>
                                   <!--heart icon-->
                                   <div class="ml-auto text-red-600  hover:text-red-700 mr-2">
                                        <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                        </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-make text-gray-600 font-bold">
                                    <?php echo $list['short_desc'] ?>
                                </div>
                                <div class="product-rating text-gray-400 font-bold my-1 line-through">
                                    ₹<?php echo $list['mrp'] ?>
                                </div>
                                <div class="product-price font-bold text-slate-700 text-lg">
                                    ₹<?php echo $list['price'] ?>
                                </div>
                                <p class="font-bold text-slate-700 text-sm mb-3 mt-2"><span>Qty:</span> 
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
								</p>
                                <a class="fr__btn" href="cart.php" onclick="manage_cart('<?php echo $list['id']?>','add')">
									<div class="add-to-cart h-8 w-28 bg-yellow-500 flex items-center justify-center text-white rounded text-md cursor-pointer hover:bg-yellow-600">
                                    
                                    Add to Cart
                                </div></a>
                               <!-- <div class="add-to-cart h-8 w-28 bg-yellow-500 flex items-center justify-center text-white rounded text-md cursor-pointer hover:bg-yellow-600">
                                    Add to Cart
                                </div>-->
                            </div>
                            
                          <?php } ?>  
                            
                        </div>   
                    </div>
                </div>
            </div>
        </div>
					<?php } else { 
						echo "Data not found";
					} ?>
                
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <script type="text/javaScript">

        function sort_product_drop(cat_id){
            var sort_product_id=jQuery('#sort_product_id').val();
            window.location.href="http://localhost/Shop%20Buddy/category1.php?id="+cat_id+"&sort="+sort_product_id;
        }



</script>



<?php require('footer.inc.php')?>        