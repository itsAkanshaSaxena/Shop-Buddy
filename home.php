<?php require('topu.php'); ?>


<?php
 $con1=mysqli_connect("localhost","root","","ecom");

$cat_res=mysqli_query($con1,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Buddy</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    
    <!--shreya -->
        <meta name="author" content="Pragya Singh">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>products</title>
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


       
    <script src="https://cdn.jsdelivr.net/npm/jdenticon@3.1.1/dist/jdenticon.min.js" async
        integrity="sha384-l0/0sn63N3mskDgRYJZA6Mogihu0VY3CusdLMiwpJ9LFPklOARUcOiWEIGGmFELx"
        crossorigin="anonymous">
    </script>

    <script src="custom.js"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <!-- End Product Description -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        
   
</head>
<body>
    <div class="bg-white w-full">
       
        <!--sidebar-->
        <div class="main max-h-max flex ">
            <div class="border-t-2 border-gray-300 main-sidebar w-1/5 h bg-gray-200
            p-6">
                <div class="sidebar-categories">
                    <div class="sidebar-main-category text-slate-700 cursor-pointer
                        flex font-bold mb-3 p-2 bg-gray-400 rounded-lg ">
                        <span class="w-8"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                          </svg></span>
                          <span>Categories</span>
                    </div>

                    <div class="sidebar-main-category cursor-pointer text-gray-500
                      font-bold  p-2 ml-8 mb-3 text-lg">
                     <span class="w-8  "></span>
                    <?php
						foreach($cat_arr as $list){
			        ?>
			        <span class=" "><a href="category2.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a><br></span>
			        <?php
		                }
					?>

                    </div>
                    
                    
                   <!-- <div class="sidebar-main-category cursor-pointer text-slate-700
                    flex font-bold mb-4 p-2 hover:bg-gray-400 rounded-lg">
                       <span class="w-8">
                        <i class="fas fa-tshirt"></i>
                       </span>
                       <span>Rent an Outfit</span>
                   </div>
                    <div class="sidebar-main-category cursor-pointer text-slate-700
                    flex font-bold mb-4 p-2 hover:bg-gray-400 rounded-lg">
                       <span class="w-8">
                        <i class="fas fa-percent"></i>
                       </span>
                       <span>Sell on Shop Buddy</span>
                   </div>-->
                   
                  
                   <div class="sidebar-main-category cursor-pointer text-slate-700
                    flex font-bold mb-4 p-2 hover:bg-gray-400 rounded-lg">
                       <span class="w-8">
                        <i class="far fa-question-circle"></i>
                       </span>
                       <span>Help</span>
                   </div>
                   
                   
                </div>
            </div>
            <!--main section -->
            <div class="main-section flex-1 p-4">
                <!--<div class="main-section-banner cursor-pointer h-96 rounded-lg flex 
                items-end ">
                <! <div class="button bg-white w-36 h-10 rounded-full
                    flex justify-center items-center m-4 cursor-pointer
                    ">
                        <h4 class="text-bold text-slate-700">Browse Products</h4>
                    </div>--
                </div>-->
                <div class="slider">
                    <div class="slides">
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
                        <input type="radio" name="radio-btn" id="radio5">
                        <div class="slide first">
                            <img src="images/bann.jpg" class="cursor-pointer h-96 w-full rounded-lg flex items-end "/>
                        </div>
                        <div class="slide second">
                            <img src="images/gg.jpg" class="cursor-pointer h-96 w-full rounded-lg flex items-end "/>
                        </div>
                        <div class="slide third">
                            <img src="images/gtr.jpg" class="cursor-pointer h-96 w-full rounded-lg flex items-end "/>
                        </div>
                        <div class="slide fourth">
                            <img src="images/b2.jpg" class="cursor-pointer h-96 w-full rounded-lg flex items-end "/>
                        </div>
                        <div class="slide fifth">
                            <img src="images/b3.jpeg" class="cursor-pointer h-96 w-full rounded-lg flex items-end "/>
                        </div>
                    </div>
                        <!--automatic -->
                        <div class="navigation auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                            <div class="auto-btn4"></div>
                            <div class="auto-btn5"></div>
                        </div>
                        <!--manual-->
                        <div class="navigation-manual">
                            <label for="radio1" class="manual-btn"></label>
                            <label for="radio2" class="manual-btn"></label>
                            <label for="radio3" class="manual-btn"></label>
                            <label for="radio4" class="manual-btn"></label>
                            <label for="radio5" class="manual-btn"></label>
                        </div>
                </div>
                    <script type="text/javascript">
                        var counter=1;
                        setInterval(function(){
                            document.getElementById('radio'+counter).checked=true;
                            counter++;
                            if(counter>5){
                                counter=1;
                            }
                        },4500);
                    </script>
                
                    
                
                <!--<div class="main-section-categories mt-3">
                    <h1 class="popular-categories font-bold text-xl flex items-center">Popular Categories
                        <svg class="h-6 w-6 text-yellow-400"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                          </svg>
                    </h1>
                    <div class="categories mt-5 flex ">
                        <div class="icon-gift h-20 w-20 rounded-xl bg-gray-300 flex justify-center items-center cursor-pointer ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                              </svg>
                        </div>
                        <div class="icon-music h-20 w-20 rounded-xl bg-gray-300 flex justify-center items-center ml-6 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                              </svg>
                        </div>
                    </div>
                </div>-->
                <div class="main-section-deals">
                    <h1 class=" font-bold text-3xl mt-0">New Arrivals🔥</h1>
                    <div class="main-section-products">
                        <div class="main-product flex">
                        <!--products php-->
                        <?php 
                            $get_product=get_product($con1,5);
							foreach($get_product as $list){
							?>

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
                                <div class="product-make text-gray-600 font-bold ">
                                    <?php echo $list['short_desc'] ?>
                                </div>
                                <div class="product-rating text-gray-400 font-bold my-1 line-through">
                                    ₹<?php echo $list['mrp'] ?>/-
                                </div>
                                <div class="product-price font-bold text-slate-700 text-lg">
                                    ₹<?php echo $list['price'] ?>/-
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
                                <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')">
									<div class="add-to-cart h-8 w-28 bg-yellow-500 flex items-center justify-center text-white rounded text-md cursor-pointer hover:bg-yellow-600">
                                    
                                    Add to Cart
                                </div></a>
                            </div>
                            
                          <?php } ?>  
                            
                            
                        </div>
                    </div>
                </div>


                



            </div>
        </div>
       
    </div>
    
</body>
</html>
<?php
require('footer.inc.php');
?>