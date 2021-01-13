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
            <input type="text" name="email" placeholder = "E-mail should follow email-format two cosecutive(.)" class="form-control"  id="email">
            <input type="button" onclick="mail()" name="submit" value="VerifyEmail">
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
        <input type="text" name="uname"  placeholder = "Extra spaces are not allowed" class="form-control" id="uname">
    </div>
</div>
<!-- mobile login -->
    <div id="login2">
        <div class="form-group" style="width:50%">
            <label>Number</label><br>
            <input type="number" name="number" placeholder = "Contact should 10 digit(11 included 0)" class="form-control" id="number">
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
    <label>Security Question<span>*</span></label>
        <select class="form-control" name="question" id="sec_que">
            <option value="What was your childhood nickname?">What was your childhood nickname?</option>
            <option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend? </option>
            <option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
            <option value="What was your dream job as a child">What was your dream job as a child ?</option>
            <option value="What is your favourite teacher's nickname?">What is your favourite teacher's nickname? ?</option>
    </select>
</div>

<div class="form-group" style="width:50%">
    <label>Your Answer</label><br>
        <input type="text" class="form-control" id="sec_ans" placeholder = "Only Alpha or Alphanumeric are alowed"> 
</div>

<div class="form-group" style="width:50%">
    <label>Password</label><br>
        <input type="password" name="password"  placeholder="Password should 8 to 16 digit (like-Nav#12aa4)" class="form-control" id="password"><br>
        <input type="button" name="submit" onclick="signup()" class="form-control btn-info"  value="SignUP">
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
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
<script>
function mail(){
	var email = $('#email').val();
        if(email == ""){
            alert('Enter your email');
        }else if(!(email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))){
            alert("Entered Mail in Corrrect Format");
            $('#email').focus();
        }else{
        $.ajax({
            type:"POST",
            url:"sendmail.php",
            data:{'email':email},
            success:function(data){
            console.log(data);
            // $('#result').text(data);
            alert("mail sent");
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
                alert("OTP verified");
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
        }
        else if(!(number.match(/^(0|[+91]{3})?[7-9][0-9]{9}$/))){
            alert("Mobile Number Should be Correct");
            $('#number').focus();
        }else{
        $.ajax({
            type:"POST",
            url:"numotp.php",
            data:{'number':number},
            success:function(data){
            console.log(data);
            // $('#result3').text(data);
            alert("OTP sent");
            $('#form1').css("display","block");
            }
        });
    }
};
// number validate
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

function signup(){
    var email = $('#email').val();
    var uname = $('#uname').val();
    var number = $('#number').val();
    var password = $('#password').val();
    var sec_que = $('#sec_que').val();
    var sec_ans = $('#sec_ans').val();
    if(email=="" || uname=="" || number=="" || password==""  || sec_que==""  || sec_ans=="")
    {
        alert("All fields * are required");
    }
    else if(!(email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))){
            alert("Entered Mail in Corrrect Format");
            $('#email').focus();
    }
    else if(!(number.match(/^(0|[+91]{3})?[7-9][0-9]{9}$/))){
            alert("Mobile Number Should be Correct");
            $('#number').focus();
    }
    else if(!(uname.match(/^([a-zA-Z]+\s?)*$/))) {
        alert("name should in proper way");
        $('#uname').focus();
    }
    // else if(!(password.match(/^(?=.*\d)(?=.*[-+_!@#$%^&*., ?])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/))) {
        // alert("Password would be 8 to 16 digit ex-(nav@1234)");
        // $('#password').focus();
    // }
    else if(!(sec_ans.match(/^([a-zA-Z0-9]+\s?)*$/))) {
        alert("Answer Should be in Proper way");
        $('#sec_ans').focus();
    }else{
    $.ajax({
        type:"POST",
        url:"accountdb.php",
        data:{'email':email, 'uname':uname, 'number':number, 'password':password, 'question':sec_que, 'answer':sec_ans},
        success:function(data){
            console.log(data);
            // $('#demo').html(data);
            if(data=="1"){
                alert('SignUp success..Now You can login.');
                window.location.href="login.php";
            }else{
                alert('something went wrong');
            }
            }
        });
    }
}
</script>