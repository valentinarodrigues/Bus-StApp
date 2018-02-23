<?php
error_reporting(E_ALL ^ E_NOTICE);
require "config.php";
session_start();

	$_SESSION['email'] = $email = trim($_POST['email']);
	$_SESSION['password'] = $password = trim($_POST['password']);
	$_SESSION['bank'] = $bank = trim($_POST['bank']);
	$_SESSION['namea'] = $namea = trim($_POST['namea']);
	$_SESSION['account'] = $account = trim($_POST['account']);
	$_SESSION['email2'] = $email2 = trim($_POST['email2']);
	$_SESSION['password2'] = $password2 = trim($_POST['password2']);
	
	if(!empty($email2) && !empty($password2))
	{
		$query="SELECT * FROM customer where email_id='$email2' and password='$password2'";
		$result = mysqli_query($con,$query);
		if(!$result)
		{
			die("ERROR : ".mysql_error());

		}
		else
		{  
			$num_rows = mysqli_num_rows($result);
			if($num_rows == 1)
			{
				$total=$_SESSION['pay'];
				$query="SELECT balance FROM customer where email_id='$email2'";
				$result = mysqli_query($con,$query);
				$row = mysqli_fetch_row($result);
				$data=$row[0];
				if($data > $total)
				{
					$_SESSION['balance1']=$data;
				}
				else 
				{
					$_SESSION['error2']="You dont have sufficient balance";
					header('location:signin.php');
				}		
				
				$query="SELECT * FROM customer where email_id='$email2' ";
				$result = mysqli_query($con,$query);
				$row = mysqli_fetch_assoc($result);
				$_SESSION['namea']=(string)$row['name'];
			}
			else
			{
				$_SESSION['error']="Invalid Username or Password";
				header('location:signin.php');
			}
		}
	}
	else
	{
	$query="SELECT * FROM customer where email_id='$email'";
	$result = mysqli_query($con,$query);
		if(!$result)
		{
			die("ERROR : ".mysql_error());
		}
		else
		{
			$num_rows = mysqli_num_rows($result);
			if($num_rows<1)
			{
																
				$sql = "INSERT INTO customer(email_id, password,bank_name,account_no,name) 
						VALUES ('$email','$password','$bank','$account','$namea')";
						$result=mysqli_query($con,$sql);
						if (!$result)
						{
							die('ERROR : ' . mysql_error());
						}
						else
						{	
								$total=$_SESSION['pay'];
								$query="SELECT balance FROM customer where email_id='$email' and password='$password'";
								$result = mysqli_query($con,$query);
								$row = mysqli_fetch_row($result);
								$data=$row[0];
								if($data > $total)
								{
									$_SESSION['balance1']=$data;
								}
								else 
								{
									echo "You do not have sufficient balance";
								}
						}
			}
			else
			{
				$_SESSION['error2']="User already exists";
				header('location:signin.php');

			}
		}	

							}

?> 
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>startup</title>
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
	.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
	}
	.centered-form{
	margin-top: 60px;
	} h3{ text-align:left; }
    </style>
</head>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#">Bus-StApp</a>
        </div>
      </div>
    </nav>
<body class="body">
	<div class="row page-header well-lg container-fluid">
        <div class="col-lg-4 well-lg" align="center"><h3>Welcome <b><?php echo $_SESSION['namea']?> </b></h3></div>
   
<div class="col-lg-4 centered-form" align="center">
		
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title">Trip Summary</h1>
      </div>
      <div class="panel-body">
		<form name='forma' method='POST' action='book.php' onsubmit="return validate();">
		
		<div class="form-group">
		<h3>Total Fare: ₹<?php echo $_SESSION['pay']; ?></h3>
		</div> 
		<div class="form-group">
		<h3>From: <?php echo $_SESSION['src']; ?></h3>
		</div>
		<div class="form-group">
		<h3>To: <?php echo $_SESSION['dest']; ?></h3>
		</div>
		<div class="form-group">
		<h3>Seats Booked:
		<?php 
		$arrc = explode(",",$_SESSION['seating']);
		$a="";
		foreach($arrc as $newvalue)
		{
		$val=substr($newvalue,3);  
		echo $a.$val;
		$a=",";
		}
		?>
		</h3>
		</div>
		<div class="form-group">
		<h3>Departure Time: <?php echo $_SESSION['dept_time'];  ?></h3>
		</div>
		<div class="form-group">
		<h3>Arrival Time: <?php echo $_SESSION['arrival_time'];  ?></h3>
		</div>
          <input type="submit" name='submit' value="Proceed" class="btn btn-primary btn-mb">
		</form>
    </div>
  </div>
        </div>
        <div class="col-lg-4 well-lg" align="center">
		<h3>Balance: ₹<b><?php  echo $_SESSION['balance1']?></b></h3></div>
   </div>
    <footer class="footer">
    <div class="container">
        <div class="col-lg-12 well-lg">
            <h5 align="center" class="text-muted"><b>Valentina Rodrigues © 2015</b></h5>
        </div>
    </div>
    </footer>
</body>
</html>