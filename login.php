<?php
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-300">
<?php
			include 'connection.inc.php';
			if(isset($_POST['submit'])){
				$email=$_POST['email'];
				$password=$_POST['pass1'];
			
				$email_search="select * from users where email='$email'";
				$query=mysqli_query($con1, $email_search);
				$email_count=mysqli_num_rows($query);
				if($email_count){
					$email_pass=mysqli_fetch_assoc($query);
					$db_pass=$email_pass['password'];
					
					$_SESSION['name']=$email_pass['name'];
					//$pass_decode=password_verify($password,$db_pass);
					
					if($password === $db_pass){
						?>
						<script>
						location.replace("home.php");</script>
						<?php
						
					}
					else{
						?>
						<script>alert("Password Incorrect");</script>
						<?php
					}
				}
				else{
					?>
					<script>alert("Invalid Email");</script>
					<?php	
				}
			}
			
		?>
		<div class="">
			<a href="index.php">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mt-6 ml-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				<path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
				</svg>
			</a>
    	</div>	
    <div class="mx-80 mt-12 border-slate-900 bg-white border-white border-2 rounded-xl p-5">
        <h1 class="text-4xl font-family:'Muli, sans-serif text-bold  text-gray-700 text-center">Login</h1><br><br>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
            
                <div class="flex justify-center">
					<div class="h-9 w-10 bg-gray-800 px-3
                    text-slate-700 flex justify-center items-center
                     rounded-l text-white">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
					<input name="email" class=" h-9 w-96 bg-gray-200 border border-gray-500 border-opacity-75 rounded-r px-3 text-slate-700  focus:outline-none" placeholder="Enter Email address" type="email"
					required>
				</div><br><br>
				
				<div class="flex items-center justify-center ">
                <div class=" h-9 w-10 bg-gray-800 px-3 text-slate-700 flex justify-center items-center  rounded-l text-white">
						<span class="input-group-text"><i class="fa fa-lock"></i></span>
					</div>
					<input name="pass1" class="h-9 w-96 bg-gray-200 border border-gray-500 border-opacity-75 rounded-r px-3 text-slate-700 focus:outline-none" placeholder="Enter Password" type="password" value=""
					required>
				</div><br><br>
				<div class="flex items-center justify-center">
                    <div class="form-group  h-14 w-96 text-xl bg-gray-700 text-white hover:bg-gray-800 rounded-lg flex items-center justify-center ">
                        <button type="submit" name="submit"class="btn ">LOG IN</button>
                    </div>
                </div>
        </form>
        <div class="text-center mt-5">
           <!-- Forgot <span class="text-lg text-blue-500">Username/Password</span>?<br>-->
            Don't have an account? <span class="text-lg text-blue-500"><a href="signup.php">Sign Up</a></span>
        </div>
    </div>
</body>
</html>