<?php
require('top.inc.php');
$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con1,$_GET['id']);
	$res=mysqli_query($con1,"select * from categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['categories'];
	}else{
		/*header('location:categories.php');
		die();*/
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con1,$_POST['categories']);
	$res=mysqli_query($con1,"select * from categories where categories='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Categories already exist";
			}
		}else{
			$msg="Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con1,"update categories set categories='$categories' where id='$id'");
		}else{
			mysqli_query($con1,"insert into categories(categories,status) values('$categories','1')");
		}
		header('location:categories.php');
		die();
	}
}
?>
<div class="content pb-0 mb-5">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header ml-5 mr-5 mt-5 h-14 text-slate-700 text-2xl border-b-4 rounded flex items-center justify-center"><strong>Categories</strong><small class="ml-2"> Form</small></div>
                        <form method="POST" class="ml-5 mt-5 mr-5">
							<div class="card-body card-block">
							   <div class="form-group ">
									<label for="categories" class=" form-control-label text-lg mb-5">Categories</label><br>
									<input type="text" name="categories" placeholder="Enter categories name" class="form-control mb-4 h-9 w-full bg-gray-200 border border-gray-500 border-opacity-75 rounded px-3 text-slate-700  focus:outline-none" required value="<?php echo $categories ?>">
								</div>
								<div class="h-14 w-full text-xl bg-gray-700 text-white hover:bg-gray-800 rounded-lg flex items-center justify-center">
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
								</div>
							   <div class="field_error text-red-800"><?php echo $msg?></div>
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