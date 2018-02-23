<?php
error_reporting(E_ALL ^ E_NOTICE);
require "config.php";
session_start();
	if (isset($_REQUEST['submit']))
	{	
		$_SESSION['pay']=$_POST['hi'];
		$_SESSION['seating']=$_POST['seats'];
	}	
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Bus-StApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="font-awesome-4.4.0\css\font-awesome.min.css">
    <style type="text/css">
        .body {
            overflow-x: hidden;
            font-family: Helvetica,sans-serif;
        }
    </style>
<script>
function validate()
{
	if((document.getElementById("confirmpassword").value != document.getElementById("password").value))
	{
		document.getElementById("confirmpassword").value = "";
		document.getElementById("confirmpassword").focus(); 
		return false;
	}
}
</script>
<style>
.error {color: #FF0000;}
</style>
</head>
<body class="body">
    <div class="row container-fluid">
        <div class="col-lg-12 well-lg"></div>
    </div>
    <div class="row container-fluid">
        <div class="col-lg-12" align="center">
            <i class="fa fa-bus fa-5x"></i>
        </div>
    </div>
    <div class="row container-fluid">
        <div class="col-lg-12" align="center">
            <i class="fa fa-road fa-5x"></i>
        </div>
    </div>
    <div class="row page-header">
        <div class="col-lg-12" align="center">
            <h1>Bus-StApp</h1>
        </div>
    </div>	
<link href="bootstrap.min.css" rel="stylesheet">
<style>
body{
  background: url("astardust.png");
}

.centered-form .panel{
  background: rgba(255, 255, 255, 0.8);
  box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
.centered-form{
  margin-top: 60px;
}
</style>
<script src="bootstrap.min.js"></script>  
<div class="row">
<div class="col-sm-2 centered-form" >
</div>
<div class="col-sm-4 centered-form" >
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Please Register<small>It's free!</small></h3>
      </div>
      <div class="panel-body">
		<form name='forma' method='POST' action='register.php' onsubmit="return validate();">
<h4>Registration:</h4>
		<div class="form-group">
		<span class="error">*</span><input id='email' type='email' name='email'  class="form-control input-sm" onchange="validate();" placeholder='Enter your E-mail ID' required />
          </div>  
		  
		<div class="form-group">
		<span class="error">*</span><input id='namea' type='text' name='namea' class='form-control input-sm'   placeholder='Enter Name' required />
		</div>
		
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
			  
		<span class="error">*</span><input id='password' class='form-control input-sm' type='password' name='password' placeholder='Enter password' required />
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">  
		<span class="error">*</span><input id='confirmpassword' class='form-control input-sm' type='password' onchange="validate();" name='confirmpassword' required placeholder='Re-Enter password' />
              </div>
            </div>
          </div>
		  	
		<div class="form-group">
		  <span class="error">*</span><input id='bank' class='form-control input-sm' type='text' name='bank'  placeholder='Enter bank name' required />
        </div>


		<div class="form-group">
		<span class="error">*</span><input id='account' size="15" maxlength="15" class='form-control input-sm' type='text' name='account'  placeholder='Enter your Account Number' required />
		</div>
		<p class="error">
				 <?php if(isset($_SESSION['error2']))
				 {  
					$error = $_SESSION['error2']; 
					echo $error;
					unset($_SESSION['error2']); 
					
				 }
				 ?></p>
          <input type="submit" name='submit' value="Register" class="btn btn-primary btn-mb">
		</form>
    </div>
  </div>
</div><style>
.centered-form .panel{
  background: rgba(255, 255, 255, 0.8);
  box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
span { display: inline }
.centered-form{
  margin-top: 60px;
}
</style>
<div class="col-sm-4 centered-form" >
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Please Login</h3>
      </div>
      <div class="panel-body">
	  
		<form name='formb' method='POST' action='register.php' >
<h4>Login:</h4>
          <div class="form-group">
          
		<span class="error">*</span><input id='email2' class='form-control input-sm' type='email' name='email2' autofocus placeholder='Enter your E-mail ID' required/>
          </div>

          <div class="form-group">
	<span class="error">*</span><input id='password2' class='form-control input-sm' type='password' name='password2' placeholder='Enter password'required />
		
          </div>
<p class="error">
				 <?php if(isset($_SESSION['error']))
				 {  
					$error = $_SESSION['error']; 
					echo $error;
					unset($_SESSION['error']); 
					
				 }
				 ?></p>
          <div class="checkbox">
            <label>
              <input name="remember" type="checkbox" value="Remember Me"> Remember Me<br>
              <!--a href="/forgot" class="pull-right">Forgot Password?</a-->
            </label>
          </div>

          <input type="submit" name='submit' value="Login" class="btn btn-primary btn-mb">
</form>
      </div>
    </div>
    <div class="text-center">
      <!--a href="/register" >Don't have an account? Register</a-->
    </div>

</div>
<div class="col-sm-2 centered-form" >
</div>
</div>
</html>
	