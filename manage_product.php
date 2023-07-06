<?php
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc	='';
$description	='';
$meta_title	='';
$meta_description	='';
$meta_keyword='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con1,$_GET['id']);
	$res=mysqli_query($con1,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$name=$row['name'];
		$mrp=$row['mrp'];
		$price=$row['price'];
		$qty=$row['qty'];
		$short_desc=$row['short_desc'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
	}else{
		/*header('location:product.php');
		die();*/
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con1,$_POST['categories_id']);
	$name=get_safe_value($con1,$_POST['name']);
	$mrp=get_safe_value($con1,$_POST['mrp']);
	$price=get_safe_value($con1,$_POST['price']);
	$qty=get_safe_value($con1,$_POST['qty']);
	$short_desc=get_safe_value($con1,$_POST['short_desc']);
	$description=get_safe_value($con1,$_POST['description']);
	$meta_title=get_safe_value($con1,$_POST['meta_title']);
	$meta_desc=get_safe_value($con1,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($con1,$_POST['meta_keyword']);
	
	$res=mysqli_query($con1,"select * from product where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	
	if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
		if($_FILES['image']['size']>500000){
			$msg="Please upload image size less than 500KB";
		}
	}
	else{
		if($_FILES['image']['type']!=''){
			if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
			
			if($_FILES['image']['size']>500000){
				$msg="Please upload image size less than 500KB";
			}
		
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){


				//$image=$_FILES['image'];
				//$filename=$_FILES['error'];
				//$filesetup=$_FILES['tmp_name'];
				//$destinationfile='images/'.$filename;
				//move_uploaded_file($filetemp,$destinationfile);


				$image=$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$image);
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' where id='$id'";
			}else{
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
			}
			mysqli_query($con1,$update_sql);
		}else{
			//$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			//move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$image);
			$image=$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$image);
			mysqli_query($con1,"insert into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image')");
		}
		header('location:product.php');
		die();
	}
}
?>
<div class="content pb-0 mb-5">
	<div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ml-20 mr-20 ">
                    <div class="card-header ml-5 mr-5 mt-5 h-14 text-slate-700 text-2xl border-b-4 rounded flex items-center justify-center"><strong>Product</strong><small class="ml-2"> Form</small></div>
                        <form method="post" enctype="multipart/form-data" class="ml-5 mt-5 mr-5">
							<div class="card-body card-block justify-center item-center ">
							   	<div class="flex mb-4">
									<div class="form-group  mr-8">
									<label for="categories" class=" form-control-label text-lg  mr-3">Categories:</label>
									<select class="form-control" name="categories_id">
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con1,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								<div class="form-group flex">
									<label for="categories" class=" form-control-label text-lg mt-1">Product Name:</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control p-4 ml-5  h-9 w-96 bg-gray-200 border border-gray-500 border-opacity-75 rounded px-3 text-slate-700  focus:outline-none"  required value="<?php echo $name?>">
								</div>
									</div>
								<div class="flex space-x-10 mb-4">
								<div class="form-group flex">
									<label for="categories" class=" form-control-label text-lg">MRP:</label>
									<input type="text" name="mrp" placeholder="Enter product mrp" class="form-control p-4 ml-5 mb-4 h-9 w-78 bg-gray-200 border border-gray-500 border-opacity-75 rounded px-3 text-slate-700  focus:outline-none" required value="<?php echo $mrp?>">
								</div>
								
								<div class="form-group flex">
									<label for="categories" class=" form-control-label text-lg">Price:</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control p-4 ml-5 mb-4 h-9 w-78 bg-gray-200 border border-gray-500 border-opacity-75 rounded px-3 text-slate-700  focus:outline-none" required value="<?php echo $price?>">
								</div>
									</div>
								<div class="flex space-x-10 mb-4">
								<div class="form-group flex">
									<label for="categories" class=" form-control-label text-lg">Qty:</label>
									<input type="text" name="qty" placeholder="Enter qty" class="form-control p-4 ml-5 mb-4 h-9 w-78 bg-gray-200 border border-gray-500 border-opacity-75 rounded px-3 text-slate-700  focus:outline-none" required value="<?php echo $qty?>">
								</div>
								<!--image input-->
								<div class="form-group flex">
									<label for="categories" class=" form-control-label text-lg">Image:</label>
									<input type="file" name="image" class="form-control p-4 ml-5 mb-4 " <?php echo  $image_required?>>
									<span class="font-bold text-sm text-gray-500 mt-2">*Upload Image less than 500 KB<span>
								</div>
									</div>
								
								<div class="form-group flex">
									<label for="categories" class=" form-control-label text-lg">Short Description:</label>
									<textarea name="short_desc" placeholder="Enter product short description" class="form-control p-4 ml-5 mb-4 h-16 w-full bg-gray-200 border border-gray-500 border-opacity-75 rounded px-3 text-slate-700  focus:outline-none" required><?php echo $short_desc?></textarea>
								</div>
								
								<div class="form-group flex">
									<label for="categories" class=" form-control-label text-lg">Description:</label>
									<textarea name="description" placeholder="Enter product description" class="form-control p-4 ml-5 mb-4 h-20 w-full bg-gray-200 border border-gray-500 border-opacity-75 rounded px-3 text-slate-700  focus:outline-none" required><?php echo $description?></textarea>
								</div>
								<div class="flex space-x-10 mb-4">
								<div class="form-group flex">
									<label for="categories" class=" form-control-label text-lg">Meta Title:</label>
									<textarea name="meta_title" placeholder="Enter product meta title" class="form-control p-4 ml-5 mb-4 h-18 w-78 bg-gray-200 border border-gray-500 border-opacity-75 rounded px-3 text-slate-700  focus:outline-none"><?php echo $meta_title?></textarea>
								</div>
								
								<div class="form-group flex">
									<label for="categories" class=" form-control-label text-lg">Meta Description:</label>
									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control p-4 ml-5 mb-4 h-18 w-78 bg-gray-200 border border-gray-500 border-opacity-75 rounded px-3 text-slate-700  focus:outline-none"><?php echo $meta_description?></textarea>
								</div>
								
								<div class="form-group flex">
									<label for="categories" class=" form-control-label text-lg">Meta Keyword:</label>
									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control p-4 ml-5 mb-4 h-18 w-78 bg-gray-200 border border-gray-500 border-opacity-75 rounded px-3 text-slate-700  focus:outline-none"><?php echo $meta_keyword?></textarea>
								</div>
									</div>
								<div class="flex space-x-10 mb-4">
								<div class="h-14 w-52 text-xl bg-gray-700 text-white hover:bg-gray-800 rounded-lg flex items-center justify-center">
									<button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
									<span id="payment-button-amount">Submit</span>
									</button>
								</div>
							   <div class="field_error text-red-600 font-bold text-lg"><?php echo $msg?></div>
									</div>
							</div>
						</form>
                </div>
            </div>
        </div>
    </div>
</div>
         
<?php
require('footer.php');
?>