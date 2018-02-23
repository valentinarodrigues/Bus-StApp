<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require "config.php";
	session_start();
	if (isset($_GET['val'])) 
	{
	$my_busid=$_GET['val'];
	$_SESSION['my_busid']=$my_busid;
	
	$sql = "SELECT * FROM bus where bus_id='$my_busid' ";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	$_SESSION['arrival_time']=(string)$row['arrival_time'];
	
	$sql = "SELECT * FROM bus where bus_id='$my_busid' ";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	$_SESSION['dept_time']=(string)$row['dept_time'];
	
	$sql = "SELECT * FROM bus where bus_id='$my_busid' ";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) 
	{
	?>
	<html>
	<body>
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
	<script src="jquery-1.11.3.js"></script>
	<script>
	var total=0;
	var res="";
	function calculateTotal(a)
	{
			document.getElementById("Print").innerHTML ="";
			var seats = a.getAttribute("data");
			var newString = seats.substr(3);
			if(arr === undefined || arr.length == 0 || arr.length==null && i<=25)
			{
				arr.push(newString);
				arrb.push(seats);
				var onelement = a.getAttribute("name");
				total=total + parseInt(onelement);
				document.getElementById("total").innerHTML=total;
				document.getElementById("seating").innerHTML=arr;
				document.form_2.hi.value=total;
				document.form_2.seats.value=arrb;
			}
			else
			{
			var index = arr.indexOf(newString);
				if (index > -1) 
				{
				arr.splice(index, 1);
				arrb.splice(index, 1);
				var onelement = a.getAttribute("name");
				total=total - parseInt(onelement);
				document.getElementById("seating").innerHTML=arr;
				document.getElementById("total").innerHTML=total;
				document.form_2.hi.value=total;
				document.form_2.seats.value=arrb;
				i++;
				}
				else 
				{
				arr.push(newString);
				arrb.push(seats);
				var onelement = a.getAttribute("name");
				total=total + parseInt(onelement);
				document.getElementById("total").innerHTML=total;
				document.getElementById("seating").innerHTML=arr;
				document.form_2.hi.value=total;
				document.form_2.seats.value=arrb;
				}
			}
	}
	function pass()
	{
		
			if(total==0)
			{
				document.getElementById("Print").innerHTML ="You did not book any seat";
				return false;
			}
			
	}
	</script>
	<style>
	.active{background-color:red;height: 20px; width: 20px;}
	button{
    display:inline-block;    
    width:33%;
    margin: 10px;
    text-align:center;
	}p { display: inline }
	</style>
</head><body class="body">
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
<form name='form_2' method='POST' action='signin.php' onsubmit="return pass();"><div class="container-fluid">
  <center><h2>Buses Available</h2></center>
  
 <div class="row page-header well-lg"> 
 <div class="col-lg-3 form-group" align="center">
 </div>
 <div class="col-lg-6 form-group" align="center">
  <div class="container-fluid">
  <div class="table-responsive">          
  <table class="table table-condensed">
    <tbody>
		<?php 
		while($row = mysqli_fetch_assoc($result))
		{ 
			if(substr($row["seat"],3)==L01)
			{
				echo "<tr>";
			}
			if($row["seat_booked"]==1)
			echo "<td><button type='button' disabled style='height: 20px; width: 20px';></button></td>";
			else
			echo "<td><button type='button' name='".$row["fare"]."' value='".substr($row["seat"],3)."' data='".$row["seat"]."' class='menu' style='height: 20px; width: 20px;' onclick='calculateTotal(this)'></button></td>";
			if(substr($row["seat"],3)==L10)
			echo "</tr>";
		}		
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "<div class='col-lg-3 form-group'>";
		echo "<b><p>Fare:</p></b><p id='total' name='hi'></p><input type=hidden id='total' name='hi'/>";
		echo "<br>";
		//echo "</div>";	
		//echo "<div class='col-lg-1 form-group'>";
		echo "<b><p>Seats:</p></b><p id='seating' name='seats'></p><input type=hidden id='seating' name='seats'/>";
		echo "<br>";
		echo "<b><p id='Print'></p>";
		echo "<br>";
		echo "<br>";
		//echo "</div>";
	} 
	else{
		echo "Sorry no such bus available";
		}		
	//echo "<div class='col-lg-1 form-group'>";
	echo "<input type='Submit' name='submit' value='Book Seats' class='btn btn-primary btn-mb'/>";
	echo "</div>";	
	}
    ?>
	</form>
	</div>
    <footer class="footer">
    <div class="container">
        <div class="col-lg-12 well-lg">
            <h5 align="center" class="text-muted"><b>Valentina Rodrigues © 2015</b></h5>
        </div>
    </div>
    </footer>
	<script>
	var total=0;
	var res="";
	var arr = [];
	var arrb = [];
	var i=0;
		$('.menu').click(function(){
    if($(this).hasClass('active')){
        $(this).removeClass('active')
    } else {
        $(this).addClass('active')
    }
	});
	</script>
	</body>
	</html>

	
	
