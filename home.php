<?php
error_reporting(E_ALL ^ E_NOTICE);
require"config.php";
session_start();
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
.error {color: #FF0000;}
.below {margin-top:0;clear:both;}
    </style></head>
<script language="JavaScript">
function validate()
{
	
	 if((document.getElementById("ssrc").value == "0") && (document.getElementById("sdest").value == "0"))
   {
	  document.getElementById("error_txt").innerHTML = "<span class='error'>Please Select Source</span>";
	  document.getElementById("error_t").innerHTML ="<span class='error'>Please Select Destination</span>";
      document.getElementById("ssrc").focus(); 
      return false;
   }
   if(document.getElementById("ssrc").value == "0")
   {
	  document.getElementById("error_txt").innerHTML = "<span class='error'>Please Select Source</span>";
	  document.getElementById("error_t").innerHTML ="";
      document.getElementById("ssrc").focus(); 
      return false;
   }
   if(document.getElementById("sdest").value == "0")
   {
	  document.getElementById("error_t").innerHTML = "<span class='space error'>Please Select Destination</span>";
	  document.getElementById("error_txt").innerHTML = "";
      document.getElementById("sdest").focus(); 
      return false;
   } 
}
</script>
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
	
<form action="bus.php" method="post" onsubmit="return validate();">
    <div class="row page-header well-lg">
        <div class="col-lg-4 form-group" align="center">
            <label for="source">Select Source (Select One):</label>
            <select class="form-control" name="src" id="ssrc">	
			  <option selected disabled value="0">--Select a City--</option>
			  <option value="Mumbai">Mumbai</option></select>
            </select>
			<p class="below" id="error_txt">
        </div>
        <div class="col-lg-4 form-group" align="center">
            <label for="destination">Select Destination (Select One):</label>
            <select class="form-control" name="dest" id="sdest" onchange="validate()">
			<option selected disabled value="0">--Select a Place--</option>
  <option value="Pune">Pune</option>
  <option value="Ahmedabad">Ahmedabad</option>
  <option value="Nagpur">Nagpur</option>
	</select>
			<p class="below" id="error_t">
        </div>
        <div class="col-lg-4" align="center">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg"/>
				<br>
        </div>
    </div>
    <div class="row container-fluid">
        <div class="col-lg-12 well-lg"></div>
    </div>
		</form>
    <footer class="footer">
    <div class="container">
        <div class="col-lg-12 well-lg">
            <h5 align="center" class="text-muted"><b>Valentina Rodrigues © 2015</b></h5>
        </div>
    </div>
    </footer>
</body>
</html>

