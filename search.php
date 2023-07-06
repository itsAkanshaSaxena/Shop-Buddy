<?php 
require('topu.php');
$con1=mysqli_connect("localhost","root","","ecom");

$str=mysqli_real_escape_string($con1,$_GET['str']);
	if($str!=''){
		$get_product=get_product($con1,'','','',$str);
	}else{
		?>
		<script>
		    window.location.href='home.php';
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
        
                    <div class="main-section-products">
                        <div class="main-product flex">
                            <!--products php-->
                            <?php
								foreach($get_product as $list){
							?>
							<!-- Start Single Category -->

                            <div class="ml-3">
                                <div class="product-image w-48 h-64 mt-4 rounded-lg">
                                   <a href="product2.php?id=<?php echo $list['id']?>">
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





<?php require('footer.inc.php')?>        