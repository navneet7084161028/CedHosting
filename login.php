
<!DOCTYPE HTML>
<html>
<head>
<title>Login Page</title>
</head>
<body>
	<!---header--->
	<?php include 'header.php';?>						
	<!---header--->
		<!---login--->
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">
									<h3>registered</h3>
									<p>If you have an account with us, please log in.</p>
									<form>
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" id="email" name="email"> 
									  </div>
									  <div>
										<span>Password<label>*</label></span>
										<input type="password" name="password" id="password"> 
									  </div>
									  <a class="forgot" href="#">Forgot Your Password?</a>
									  <input type="button" class="btn btn-danger" value="Login" onclick="show()" name="submit">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
<!---footer--->
	<?php include 'footer.php';?>
<!---footer--->
</body>
</html>
<script>
function show(){
    var user = $('#email').val();
	var pass = $('#password').val();
	
		if(user=='') {
        	alert("Enter your verified E-mail Address");
    	} else if(!(user.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))) {
        	alert("Plz enter e-mail in correct format");
        	$('#email').focus();
		}else if(pass==''){
        	alert('Enter Your password');
    		$('#password').focus();
		}
    	else{
    	$.ajax({
        	type:'POST',
        	url:'logindb.php',
        	data:{'email':user, 'password':pass},
        	success:function(data){
			console.log(data);
			if(data == 1){
				alert('you are admin');
			}else if(data == 2){
				alert('you are user');
			}else if(data == -1){
				alert('you are block by admin');
			}else if(data == -2){
				alert('wrong user anem and password');
			}
			}
    	});
	}
}
</script>