<?php
error_reporting(E_ALL ^ E_NOTICE);
require "config.php";
session_start();
	if (isset($_POST['src']) && isset($_POST['dest']))
	{
	$_SESSION['src']=$_POST['src'];
	$_SESSION['dest']=$_POST['dest'];
	$src=$_SESSION['src'];
	$dest=$_SESSION['dest'];
	}
	else
	{
	$src=$_SESSION['src'];
	$dest=$_SESSION['dest'];
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
</head>
<body class="body"> <div class="row container-fluid">
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
	<div class="container-fluid ">
  <h2>Buses Available</h2>
  <div class="table-responsive">          
  <table class="table table-hover">
	<?php
	$sql = "SELECT * FROM bus where source='$src' AND dest='$dest' group by bus_id";
	$result = mysqli_query($con,$sql);
	if (mysqli_num_rows($result) > 0) 
			{ 
		?>
		<thead>
      <tr>
        <th>Source</th>
        <th>Destination</th>
        <th>Departure Time</th>
        <th>Arrival Time</th>
        <th>Fare</th>
      </tr>
    </thead>
    <tbody>
				<?php while($row = mysqli_fetch_assoc($result))
				{	
				echo "<tr>";
				echo "<td>". $row["source"]."</td>";
				echo "<td>". $row["dest"]."</td>";
				echo "<td>". $row["dept_time"]."</td>";
				echo "<td>". $row["arrival_time"]."</td>";
				echo "<td>". $row["fare"]."</td>";
				echo "<td><input type='submit' value='View Seats' onclick='validate(this);' name='".$row["bus_id"]."' class='btn btn-primary btn-mb' /><br>";
				echo "</tr>";
				}		
				echo "<p name='val'></p>";
			} 
			else{echo "Sorry no such bus available";}
	
			mysqli_close($con);
	 ?>
    </tbody>
  </table>
  </div>
</div>
		<form name='my_form' method='post'>
		<script>
		function validate(a) 
		{
			var display = a.getAttribute("name");
			window.location.href = "bus2.php?val=" + display;
			document.getElementById("demo").innerHTML = display;
			document.my_form.val.value=display;
		}
		</script>
		</form> 
    <footer class="footer">
    <div class="container">
        <div class="col-lg-12 well-lg">
            <h5 align="center" class="text-muted"><b>Valentina Rodrigues © 2015</b></h5>
        </div>
    </div>
    </footer>
		