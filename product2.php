<?php 
require('topu.php');
$con1=mysqli_connect("localhost","root","","ecom");


if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con1,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con1,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='home.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='home.php';
	</script>
	<?php
}	

$res=mysqli_query($con1,"select user_name,comment,added_on from review where product_id='$product_id'");

?>


<script src="custom.js"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <!-- End Product Description -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


<!-- Start Banner area -->
<div class="ht__bradcaump__area mb-6" >
                <img class ="w-full  object-contain"
                src="images/b3.jpeg" alt=""       
                >
</div>
        <!-- End Banner area -->

    


	<!-- Start Product Details Area -->
    
<section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row flex space-x-8">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active h-max w-96" id="img-tab-1">
									<img class="w-full h-full object-contain  "src="http://localhost/Shop%20Buddy/images/<?php echo $get_product['0']['image']?>" alt="full-image"/>
                                            
                                </div>
                            </div>
                        </div>
                                <!-- End Product Big Images -->
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40 ml-9 mt-9">
                    <div class="ht__product__dtl">
                        <h2 class="text-3xl font-bold text-gray-800 mb-3"><?php echo $get_product['0']['name']?></h2>
                        <ul  class="pro__prize">
                                    <li class="old__prize text-gray-400 font-bold my-1 line-through">₹<?php echo $get_product['0']['mrp']?>/-</li>
                                    <li class="font-bold text-slate-700 text-lg ">₹<?php echo $get_product['0']['price']?>/-</li>
                        </ul>
                        <p class="pro__info mb-4 text-gray-600 font-bold"><?php echo $get_product['0']['short_desc']?></p>
                        <div class="ht__pro__desc">
                            <div class="sin__desc mb-3">
                                        <p><span class="text-gray-700 text-sm">Availability:</span><span class="text-gray-400 text-sm"> In Stock</span></p>
                            </div>

                                   

                                    <div class="sin__desc text-gray-700 text-sm">
                                        <p><span>Qty:</span> 
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
                                    </div>

                                    <div class="sin__desc align--left mb-6">
                                        <p><span class="text-gray-700 text-sm">Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $get_product['0']['categories']?></a></li>
                                        </ul>
                                            
                                    </div>
                                    
                        </div>
									
                    </div>
                    <div class="flex space-x-3">
                                     <!--heart icon-->
                                     <div class="ml-auto text-red-600  hover:text-red-700 mr-2">
                                        <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $get_product['0']['id']?>','add')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                        </svg>
                                        </a>
                                    </div>
                                    <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">
                                        <div class="add-to-cart h-8 w-28 bg-yellow-500 flex items-center justify-center text-white rounded text-md cursor-pointer hover:bg-yellow-600">
                                        
                                        Add to Cart
                                        </div>
                                    </a>
                    </div>
                </div>
                <div class="ml-10 bg-gray-100 rounded p-6 w-96">
                                <h2 class="font-bold text-gray-500 mb-6 text-3xl">Reviews</h2>
                                <?php   
                                    $i=0;
										while(($row=mysqli_fetch_assoc($res))&&($i<3)){
								?>
                                <div class="mb-4" >

                                    <p class="text-lg text-gray-600 font-bold mb-1"><?php echo $row['user_name']; ?></p>
                                    <p class="text-sm text-gray-400 mb-3 "><?php echo $row['added_on']; ?></p>
                                    <p class="text-lg text-gray-700"><?php echo $row['comment']; ?></p>
                                </div>
                                <hr class="text-slate-700"/>
                                    <?php $i=$i+1;} ?>
                        </div>
            </div>
                        
                    
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->


	<!-- Start Product Description -->
	<section class="htc__produc__decription bg__white">
            <div class="container ">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active text-gray-700 text-lg font-bold mb-3"><a href="#description" role="tab" data-toggle="tab">Description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner text-gray-400">
                                    <?php echo $get_product['0']['description']?>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
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



<?php require('footer.inc.php')?>        