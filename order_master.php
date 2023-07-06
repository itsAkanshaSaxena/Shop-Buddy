<?php
require('top.inc.php');

$sql="select * from users order by id desc";
$res=mysqli_query($con1,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title text-2xl text-gray-700 font-bold mb-2 mt-4 ml-5">Order Master </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table  w-full ml-4">
							<thead class="bg-gray-50 border-b-2 border-gray-200">
								<tr class="bg-gray-50 border-b-2 border-gray-200">
									<th class="product-thumbnail p-3 text-sm font-semibold tracking-wide text-left ">Order </th>
									<th class="product-name p-3 text-sm font-semibold tracking-wide text-left "><span class="nobr">Order Date</span></th>
									<th class="product-price p-3 text-sm font-semibold tracking-wide text-left "><span class="nobr"> Address </span></th>
									<th class="product-stock-stauts p-3 text-sm font-semibold tracking-wide text-left "><span class="nobr"> Payment Type </span></th>
									<th class="product-stock-stauts p-3 text-sm font-semibold tracking-wide text-left "><span class="nobr"> Payment Status </span></th>
									<th class="product-stock-stauts p-3 text-sm font-semibold tracking-wide text-left "><span class="nobr"> Order Status </span></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$res=mysqli_query($con1,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status");
								while($row=mysqli_fetch_assoc($res)){
								?>
								<tr>
									<td class="product-add-to-cart p-3 text-lg text-gray-700  hover:text-pink-600 font-bold"><a href="order_master_detail.php?id=<?php echo $row['id']?>"> View</a></td>
									<td class="product-name p-3 text-sm text-gray-700"><?php echo $row['added_on']?></td>
									<td class="product-name p-3 text-sm text-gray-700">
									<?php echo $row['address']?><br/>
									<?php echo $row['city']?><br/>
									<?php echo $row['pincode']?>
									</td>
									<td class="product-name p-3 text-sm text-gray-700"><?php echo $row['payment_type']?></td>
									<td class="product-name p-3 text-sm text-gray-700"><?php echo $row['payment_status']?></td>
									<td class="product-name p-3 text-sm text-gray-700"><?php echo $row['order_status_str']?></td>
									
								</tr>
								<?php } ?>
							</tbody>
							
						</table>
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