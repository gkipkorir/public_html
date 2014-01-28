<?php session_start(); ?>
<!DOCTYPE HTML>


<html>
	<head>
		<style>
		
			
			.logo {
				position: fixed;
				margin-top: 1%;
				margin-left: 38%;
				z-index: 2;
				opacity: .6;
			}
			.header {				

				position:fixed;				
				background-color:gray;
				opacity: .9;
				width:100%;
				padding-top: 20px;
				padding-bottom: 20px;
				padding-right: 10%;
				padding-left: 10%;
				border-width: 3px;
				border-color: black;
				margin-top: 10%;
				margin-right: 0%;
				margin-left: 0%;
				z-index: 1;
			}
			.headerText {
				float: left;
				color: white;
				width: 13%  
			}
			.center {
				color:black;
				text-align:center;
			}
			.main {
				position: fixed;
				background-color: white;
				opacity: .8;
				width: 60%;
				height: 500px;
				overflow-y: scroll;
				padding-top: 5%;
				padding-bottom: 5%;
				padding-right: 10%;
				padding-left: 10%;
				border-width: 3px;
				border-color: black;
				border-radius: 25px;
				margin-top: 15%;
				margin-bottom: 5%;
				margin-right: 10%;
				margin-left: 10%;
				z-index = -1;
			}
			p {
				font-family:"Times New Roman";
				font-size:20px;
			}
			a:link {
				font-size: 1em;
				font-weight: normal;
				color: white;  
				text-decoration:none;
				
			}
			a:visited {
				font-size: 1em;
				font-weight: normal;
				color: white;  
				text-decoration:none;
			}
			a:hover {
				font-size: 1.2em;
				font-weight: bold;
				color: white;  
				text-decoration:none;
			}
			a:active {
				font-size: 1.2em;
				font-weight: bold;
				color: white;  
				text-decoration:none;
			}
		</style>
	</head>
	
	<body background=1003background1.png>
		<div class="logo">
			<img src=MiddleburyPanther.jpg width="400px" height="145px">		
		</div>		
		<div class="header">
			<?php
				define('DB_SERVER','panther.cs.middlebury.edu');
				define('DB_USERNAME','wschaaf');
				define('DB_PASSWORD','wschaaf');
				define('DB_DATABASE','wschaaf_Calendar');
				$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Could not connect");
				if(isset($_SESSION['User'])){
					echo "<div class=headerText>Welcome ".$_SESSION['User']."</div>";
					echo "<div class=headerText><a href='./events.php'>Home</a></div>";
					echo "<div class=headerText><a href='./logout.php'>Logout</a></div>";					
					echo "<form method='POST' action='insert1.php'> <input type='text' name='Search' >
	<input type='submit' value='Search'> 
	</form>";	
					
				}
				else { 
					//if session user is not set, show link to log in and to create user
					$_SESSION['User'] = null;
					echo "<div class=headerText><a href='./events.php'>Home</a></div>";					
					echo "<div class=headerText><a href='./login.php'>Log In</a></div>";
					echo "<form method='POST' action='insert1.php'> <input type='text' name='Search' >
	<input type='submit' value='Search'> 
	</form>";	
				}
			?>
		</div>



		<div class="main"> 
			<?php 
	//set up the connection to the database
	define('DB_SERVER', 'panther.cs.middlebury.edu');
	define('DB_USERNAME', 'wschaaf');
	define('DB_PASSWORD', 'wschaaf');
	define('DB_DATABASE', 'wschaaf_Calendar');
	$search = htmlspecialchars($_POST[Search]);
	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("could not connect");
	$sql="SELECT * FROM Events WHERE name LIKE '%$search%'";
	if (!mysqli_query($con, $sql)) {
		die('Error: ' . mysqli_error($con));
	}
	else {
		//execute the SQL query
		$result = mysqli_query($con,$sql);
	}
	while ($row = mysqli_fetch_array($result)) {
		//print result
		echo "<p>".$row['name']."</p>  </br>Location: ".$row['location']."  </br>Date: ".$row['date']."  </br> Time: ".$row['time']." </br> Genre: ".$row['genre']." </br> Description: ".$row['description']."</br> </br>";	 
	}

?>
		</div>	



