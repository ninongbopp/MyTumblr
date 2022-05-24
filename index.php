
<?php
SESSION_START();

$acc_username = "Warren";
$acc_password = "123456";
$acc_fullname = "Warren Bopp Salvacion";
$acc_address = "Buenavista,Marinduqe";

$url_add ="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if(isset($_REQUEST['login_button']) === true){
	if($_REQUEST['form_username'] != $acc_username){
	  	header("location:".$url_add."?notexist");
	}

	else if ($_REQUEST['form_username'] ==$acc_username && $_REQUEST['form_password'] != $acc_password){
		header("location:".$url_add."?wrongpass");
	}
	else if ($_REQUEST['form_username']==$acc_username && $_REQUEST['form_password']== $acc_password){
		header("location:".$url_add."?success");

		$_SESSION['ses_username'] = $acc_username;
		$_SESSION['ses_password'] = $acc_password;
		$_SESSION['ses_fullname'] = $acc_fullname;
		$_SESSION['ses_address'] =$acc_address;
	}
}

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>MyTumblr Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">MyTumblr Login</h3>


						
						<form method="POST" class="login-form">

		      		<div class="form-group">

		      			<?php
		      			if(isset($_REQUEST['notexist'])===true){
		      				echo "<div class='alert alert-danger' role='alert'> username does not exist ...</div>"; 

		      			}else if(isset($_REQUEST['wrongpass'])===true){
		      			  echo "<div class='alert alert-warning' role='alert'> Incorrect password ...</div>"; 

		      			}else if (isset($_REQUEST['success'])===true){
		      			 echo "<div class='alert alert-success' role='alert'> Redirecting ...</div>"; 
		      			 header ("refresh: 5; url=account.php");

		      			}else if (isset($_REQUEST['logout'])===true){
		      		  	echo "<div class='alert alert-info' role='alert'> thank you ...</div>";
		      			}else if (isset($_REQUEST['logfirst'])===true){
		      				echo "<div class='alert alert-info' role='alert'> please login first ...</div>"; 
		      			}else if(isset($_SESSION['ses_username'])===true){
		      				echo "<div class='alert alert-warning' role='alert'> you still logged in. <a href='account.php'> please click here </a> to proceeed...</div>"; 

		      			}

		      			?>
		      			


		      			<input type="text" class="form-control rounded-left" placeholder="Username" name="form_username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" placeholder="Password" name="form_password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">

	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="login_button" >Get Started</button>
	            </div>
	          </form>



	        </div>
				</div>
			</div>
		</div>
	</section>

  <!--<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->

	</body>
</html>

