<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con1,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con1,$_GET['id']);
		$delete_sql="delete from contact_us where id='$id'";
		mysqli_query($con1,$delete_sql);
	}
}

$sql="select * from contact_us order by id desc";
$res=mysqli_query($con1,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card ml-5 mr-5 mt-2">
				<div class="card-body">
				   <h4 class="box-title text-2xl text-gray-700 font-bold mb-2 mt-5">Contact Us </h4>
                   <hr class="text-gray-400"/>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table w-full">
						 <thead class="bg-gray-50 border-b-2 border-gray-200">
							<tr>
							   <th class="serial  p-3 text-sm font-semibold tracking-wide text-left">#</th>
							   <th class=" p-3 text-sm font-semibold tracking-wide text-left">ID</th>
							   <th class=" p-3 text-sm font-semibold tracking-wide text-left">Name</th>
							   <th class=" p-3 text-sm font-semibold tracking-wide text-left">Email</th>
							   <th class=" p-3 text-sm font-semibold tracking-wide text-left">Mobile</th>
							   <th class=" p-3 text-sm font-semibold tracking-wide text-left">Query</th>
							   <th class=" p-3 text-sm font-semibold tracking-wide text-left">Date</th>
							   <th class=" p-3 text-sm font-semibold tracking-wide text-left"></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=0;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr class="bg-gray-50">
							   <td class="serial p-3 text-sm text-gray-700"><?php echo $i=$i+1?></td>
							   <td class="p-3 text-sm text-gray-700"><?php echo $row['id']?></td>
							   <td class="p-3 text-sm text-gray-700"><?php echo $row['name']?></td>
							   <td class="p-3 text-sm text-gray-700"><?php echo $row['email']?></td>
							   <td class="p-3 text-sm text-gray-700"><?php echo $row['mobile']?></td>
							   <td class="p-3 text-sm text-gray-700"><?php echo $row['comment']?></td>
							   <td class="p-3 text-sm text-gray-700"><?php echo $row['added_on']?></td>
							   <td class="p-3 text-sm text-gray-700">
								<?php
								echo "<span class='badge badge-delete font-bold  text-red-800 hover:underline'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								?>
							   </td>
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