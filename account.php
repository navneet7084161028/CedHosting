<!DOCTYPE HTML>
<html>
<head>
<title>Account Page</title>
</head>
<body>
	<!---header--->
	<?php include 'header.php';?>
	<!---header--->
	<div class="container-fluid">
<form>
<!-- email send -->
    <div id="login">
        <div class="form-group" style="width:50%">
        <label>Enter Your Email to register</label>
        <br>
        <input type="email" name="email" class="form-control"  id="email" required>
        <input type="button" onclick="mail()" value="VerifyEmail">
        <p id="result"></p>
        </div>
    </div>
 <!-- email otp -->
        <div id="form" style="display: none;">
            <div class="form-group col-md-6">
                <input type="text" name="data" id="data">

                <input type="button" onclick="validate()" value="OTP">
            <p id="result1"></p>
            </div>
        </div>
    <div>
        <div class="form-group" style="width:50%">
                <labe>Name</label><br>
                <input type="text" name="uname" class="form-control" id="uname" required/>
        </div>

</div>
<!-- mobile login -->
<div id="login2">
    <div class="form-group" style="width:50%">
        <label>Number</label><br>
        <input type="number" name="number" class="form-control" id="number" required>

        <input type="button" name="submit" onclick="mobile()" value="VerifyNum">
        <p id="result3"></p>
    </div>
</div>
<!-- mobile otp -->
<div id="form1" style="display: none;">
    <div class="form-group col-md-6">
        <input type="number" name="number" id="num" required>
        
        <input type="button" onclick="send1()" value="num OTP">
        <p id="result4"></p>
    </div>
</div>
<div class="form-group" style="width:50%">
    <label>Password</label><br>
        <input type="password" name="password" class="form-control" id="password" required/><br>
        <input type="button" name="submit" class="form-control btn-info"  value="SignUP">
        <p id="demo"></p>
<div>
</div>
</form>
</div>
				<!---footer--->
				<?php include 'footer.php';?>
			<!---footer--->
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    function mail(){
		var email = $('#email').val();
        if(email == ""){
            alert('Enter your email');
        }else{
        $.ajax({
            type:"POST",
            url:"sendmail.php",
            data:{'email':email},
            success:function(data){
            console.log(data);
            $('#result').text(data);
            $('#form').css("display","block");
			}
        });
		}
    }
    // email validation
    function validate(){
        var data = $('#data').val();
        if(data == ""){
            alert('enter your OTP');
        }else{
        $.ajax({
            url:'validate.php',
            type:'POST',
            data:{'data':data},
            success:function(data){
            console.log(data);
            $('#result1').text(data);
            if(data == ['OTPMatch']){
            $('#form').css("display","none");
            }else{
            $('#form').css("display","block");
            }
            //  window.location.href="home.php";
        }
    });
        }
}
    // mobile function to send number
    function mobile(){
        var number = $('#number').val();
        if(number == ""){
            alert('enter your number');
        }else{
        $.ajax({
            type:"POST",
            url:"numotp.php",
            data:{'number':number},
            success:function(data){
            console.log(data);
            $('#result3').text(data);
            $('#form1').css("display","block");
            }
        });
        }
    };
// number validation
    function send1(){
        var num = $('#num').val();
        if(num ==""){
            alert('enter OTP')
        }else{
        $.ajax({
            url:'numvalidate.php',
            type:'POST',
            data:{'num':num},
            success:function(data){
            console.log(data);
            $('#result4').text(data);
            if(data == "Verify"){
				alert("verified");
            $('#form1').css("display","none");
            }else{
            alert("opt did not match");
            }
        //  window.location.href="home.php";
        }
    });
        }
};

</script>