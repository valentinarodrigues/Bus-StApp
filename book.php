<?php
error_reporting(E_ALL ^ E_NOTICE);
require "config.php";
session_start();

	$email =$_SESSION['email'] ;
	$password = $_SESSION['password'];
	$bank = $_SESSION['bank'];
	$namea = $_SESSION['namea'];
	$account = $_SESSION['account'];
	$email2 =$_SESSION['email2'];
	$password2 =$_SESSION['password2'];
	

	if(!empty($email2) && !empty($password2))
	{
		$query="SELECT * FROM customer where email_id='$email2' and password='$password2'";
		$result = mysqli_query($con,$query);
		
		if(!$result)
		{
			echo "line 22";
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
					$deducted = (int)$data-(int)$total;
					$_SESSION['bal']=$deducted;
					$query="UPDATE customer SET balance='$deducted' where email_id='$email2'";
					$result = mysqli_query($con,$query);
		$arrc = explode(",",$_SESSION['seating']);
		foreach($arrc as $newvalue)
		{
			$query="UPDATE bus SET seat_booked=1 where seat='$newvalue'";
			$result = mysqli_query($con,$query);
		}
				}
				else 
				{
					$_SESSION['error2']="You dont have sufficient balance";
					header('location:signin.php');
				}
			}
			else
			{
				$_SESSION['error']="Invalid username or Password";
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
			echo "line 67";
			die("ERROR : ".mysql_error());
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
					$deducted=(int)$data - (int)$total;
					$_SESSION['bal']=$deducted;
					$query="UPDATE customer SET balance='$deducted' where email_id='$email'";
					$result = mysqli_query($con,$query);
									
		$arrc = explode(",",$_SESSION['seating']);
		foreach($arrc as $newvalue)
		{
			$query="UPDATE bus SET seat_booked=1 where seat='$newvalue'";
			$result = mysqli_query($con,$query);
		}
								}
								else 
								{
									echo "You dont have sufficient balance";
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
    <script src="bootstrap.min.js"></script><script>
function doit(){
if (!window.print){
alert("You need NS4.x to use this print button!")
return
}
window.print()
}
</script>
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
        </div> <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="out.php">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
<body class="body">
	<div class="row page-header well-lg container-fluid">
        <div class="col-lg-4 " align="center"><h3>Thank you <b><?php echo $_SESSION['namea']?> </b>!!!</h3></div>
<div class="col-lg-4 centered-form" align="center">
		
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title">Congratulations transaction Successfull!!</h1>
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
		<a href="javascript:doit()" target="_blank"><img src="save-as-pdf-3.gif" width="120" height="27" alt="Save as PDF" /></a>
		 
		</form>
    </div>
  </div>
        </div>
        <div class="col-lg-4" align="center">
		<h3>Balance: ₹<b><?php  echo $_SESSION['bal']?></b></h3></div>
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
	