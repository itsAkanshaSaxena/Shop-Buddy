<?php
require('top.inc.php');
$order_id=get_safe_value($con1,$_GET['id']);
if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	if($update_order_status=='5'){
		mysqli_query($con1,"update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
	}else{
		mysqli_query($con1,"update `order` set order_status='$update_order_status' where id='$order_id'");
	}
	
}
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title text-2xl text-gray-700 font-bold mb-2 mt-4 ml-5">Order Detail </h4>
				</div>
				<div class="card-body-- ml-12 mr-12">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
								<thead w-full p-3 >
									<tr>
										<th class="product-thumbnail p-3 text-sm font-semibold tracking-wide text-left">Product Name</th>
										<th class="product-thumbnail p-3 text-sm font-semibold tracking-wide text-left">Product Image</th>
										<th class="product-name p-3 text-sm font-semibold tracking-wide text-left">Qty</th>
										<th class="product-price p-3 text-sm font-semibold tracking-wide text-left">Price</th>
										<th class="product-price p-3 text-sm font-semibold tracking-wide text-left">Total Price</th>
									</tr>
								</thead>
								<tbody>
									<?php


									$res=mysqli_query($con1,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image,`order`.address,`order`.city,`order`.pincode from order_detail,product ,`order` where order_detail.order_id='$order_id' and  order_detail.product=product.id GROUP by order_detail.id");
									$total_price=0;
									
									$userInfo=mysqli_fetch_assoc(mysqli_query($con1,"select * from `order` where id='$order_id'"));
									
									$address=$userInfo['address'];
									$city=$userInfo['city'];
									$pincode=$userInfo['pincode'];
									
									while($row=mysqli_fetch_assoc($res)){
									
									$total_price=$total_price+($row['qty']*$row['price']);
									?>
									<tr>
										<td class="product-name p-3  font-bold text-slate-700 text-lg"><?php echo $row['name']?></td>
										<td class="product-name p-3  font-bold text-slate-700 text-lg"> <img src="http://localhost/Shop%20Buddy/images/<?php echo $row['image'] ?>"></td>
										<td class="product-name p-3  font-bold text-slate-700 text-lg"><?php echo $row['qty']?></td>
										<td class="product-name p-3  font-bold text-slate-700 text-lg"><?php echo $row['price']?></td>
										<td class="product-name p-3  font-bold text-slate-700 text-lg"><?php echo $row['qty']*$row['price']?></td>
										
									</tr>
									<?php } ?>
									<tr>
										<td colspan="3"></td>
										<td class="product-name p-3  font-bold text-slate-700 text-lg">Total Price</td>
										<td class="product-name p-3  font-bold text-slate-700 text-lg"><?php echo $total_price?></td>
										
									</tr>
								</tbody>
							
						</table>
						<div id="address_details">
							<strong class="font-bold text-slate-700 text-lg">Address:</strong>
							<?php echo $address?>, <?php echo $city?>, <?php echo $pincode?><br/><br/>
							<strong class="font-bold text-slate-700 text-lg">Order Status</strong>
							<?php 
							$order_status_arr=mysqli_fetch_assoc(mysqli_query($con1,"select order_status.name from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
							echo $order_status_arr['name'];
							?>
							
							<div>
								<form method="post">
									<select class="form-control mt-4 mb-7" name="update_order_status" required>
										<option class="font-bold text-slate-700 text-lg" value="">Select Status</option>
										<?php
										$res=mysqli_query($con1,"select * from order_status");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['name']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
										}
										?>
									</select>
									<input type="submit" class="form-control h-12 w-64 bg-pink-600 flex items-center justify-center text-white  text-2xl rounded text-md cursor-pointer hover:bg-white focus:ring-pink-600 hover:border-pink-600 hover:text-pink-600 mb-4 "/>
								</form>
							</div>
						</div>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.php');
?>