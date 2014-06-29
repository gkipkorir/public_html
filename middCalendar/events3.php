
<!--
<style>
#links{
float:left;
width: 200px ;
}
#content{
float:left;
}
#table{
  width: 1100px ;
  margin-left: auto ;
  margin-right: auto ;

}
table{
text-align:center;
}
td{
vertical-align:top;
text-align:left;
width:200;
}
</style>
-->
<!DOCTYPE HTML>
<html>
	<head>
		<style>
			 /* Begin Navigation Bar Styling */
			   #nav {
			      width: 100%;
			      float: left;
			      margin: 0 0 3em 0;
			      padding: 0;
			      list-style: none;
			      background-color: #f2f2f2;
			      border-bottom: 1px solid #ccc; 
			      border-top: 1px solid #ccc; }
			   #nav li {	
			      float: left; }
			   #nav li a {
			      display: block;
			      padding: 8px 15px;
			      text-decoration: none;
			      font-weight: bold;
			      color: #069;
			      border-right: 1px solid #ccc; }
			   #nav li a:hover {
			      color: #c00;
			      background-color: #fff; }
			   /* End navigation bar styling. */
			body {

				background-color: gray;
				
				
			/*	background: -webkit-linear-gradient(black, blue); /* For Safari */
			/*	background: -o-linear-gradient(black, blue); /* For Opera 11.1 to 12.0 */
			/*	background: -moz-linear-gradient(black, blue); /* For Firefox 3.6 to 15 */
			/*	background: linear-gradient(black, blue); /* Standard syntax */
				


			}
			.center {
				color:black;
				text-align:center;
			}
			.box {
				background-color: white;
				width: 70%;
				padding-top: 5%;
				padding-bottom: 5%;
				padding-right: 10%;
				padding-left: 10%;
				border-width: 5px;
				border-style: ridge;
				border-color: blue;
				margin-top: 5%;
				margin-bottom: 5%;
				margin-right: 10%;
				margin-left: 10%;
			}
			links{
				float:left;
				width: 200px ;
			}
			#content{
				float:left;
			}

				
			p {
				font-family:"Times New Roman";
				font-size:20px;
			}
		</style>
	</head>
	
	<body background=wood_background.png> 
	<!--<body background=midd.jpg> -->
		<div class="box"> 
			<p>Hello world let's make a sick calendar!!!</p>

<?php session_start(); ?>  

<?php 
//start session
//must happen before anything else on the page
s
//print_r($_SESSION);

//set up the connection to the database
define('DB_SERVER','panther.cs.middlebury.edu');
define('DB_USERNAME','wschaaf');
define('DB_PASSWORD','wschaaf');

define('DB_DATABASE','wschaaf_Calendar');

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Could not connect");

//get todays date in form (y-m-d)
$date = getdate();
$today = $date['year']."-".$date['mon']."-".$date['mday'];
$date1 = date_create("$today");


//make array of week
$t = date_create("$today");
$byDate[date_format($t,"Y-m-d")][]=' ';
for ($x=1; $x<=6; $x++)
  {
   date_add($t,date_interval_create_from_date_string("1 days"));
   $byDate[date_format($t,"Y-m-d")][]=' ';
  } 

//get date 6 days from today (to create a week, including today)
$date=date_create("$today");
date_add($date,date_interval_create_from_date_string("6 days"));
//echo "Seven days from now is: ".date_format($date,"Y-m-d")."</br>";

//sql query selects all events between today's date and 6 days from now
$sql="SELECT * FROM Events WHERE date BETWEEN '".date_format($date1,"Y-m-d")."' AND '".date_format($date,"Y-m-d")."' AND approved=1";


if (!mysqli_query($con,$sql))
{
  die('Error: ' . mysqli_error());
}
else
{
 //execute the SQL query
 $result = mysqli_query($con,$sql);
}


//$byDate needs to be initialized first so that days with no events still show up...

echo "</br>Events in the Next 7 days: </br>";
while ($row = mysqli_fetch_array($result)) {
 //for each event, display its name as a link to detailed event info, with eid in the url
// echo "<a href='./eventInfo.php?eid=".$row['eid']."'>".$row['name']."</a><br>";
$byDate[$row['date']][]=$row;
}

//print_r($byDate);




echo "<div id='links'>";


echo "</br>";

//if session user is set (from logging in), show link to create event and log out
if(isset($_SESSION['User'])){
	echo "Welcome  ".$_SESSION['User']."</br>";
	echo "<a href='./CreateEvent.php'>Create Event</a></br>";
	echo "<a href='./CreateOrganization.php'>Create Organization</a></br>";
	echo "<a href='./addMembers.php'>Add Members to Org</a></br>";
	$sql2="SELECT supervisor FROM Users WHERE uid = '$_SESSION[uid]'";
  if (!mysqli_query($con,$sql2))
  {
    die('Error: ' . mysqli_error());
  }
  else
  {
 //execute the SQL query
    $result2 = mysqli_query($con,$sql2);
	
  }
	
	$row = mysqli_fetch_array($result2);
      if($row['supervisor']==1){
	
     	 echo "<a href='./approveEvents.php'>Approve Events</a></br>";
      }
 
	echo "<a href='./logout.php'>Don't forget to logout</a><br>";
}
else{ //if session user is not set, show link to log in and to create user
	$_SESSION['User'] = null;
	echo "<a href='./login.php'>Log In</a></br>";
	echo "<a href='./CreateUser.php'>Create User</a></br>";
}

//link to search page
echo "</br></br><a href='./search.php'>Search Events</a></br>";

echo "</div>";






$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
$months = array('01'=>'January', 'February', 'March', 'April','May','June', 'July', 'August', 'September', 'October', 'November', 'December');

echo "</br>";
echo "<div id='content'>";
echo "<div id='table'>";
echo "<table>";
echo "<tr>";
foreach($byDate as $key => $value)
  {
echo "<td>";
  echo "<a href='./date.php?date=".$key."'>";
  echo $days[date( "w", strtotime($key))]."</br>";
  echo $months[date( "m", strtotime($key))]." ".date( "d", strtotime($key))."</br></br>";
  echo "</a>";
  //array shift removes first value of array, which kept being current time for some reason.
  array_shift($value);

  //print out each event that occurs on day, as a link to more details
  foreach($value as $event){
	echo "<a href='./eventInfo.php?eid=".$event['eid']."'>".$event['name']."</a>  ".date('g:i',strtotime($event['time']))."<br>";
  }
echo "</td>";
  }
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</div>";

//Display events
//echo "</br>Events in the Next 7 days: </br>";
//while ($row = mysqli_fetch_array($result)) {
 //for each event, display its name as a link to detailed event info, with eid in the url
// echo "<a href='./eventInfo.php?eid=".$row['eid']."'>".$row['name']."</a><br>";
//}




//view session data:
//print_r($_SESSION);


//close connection

mysql_close($con)


?>

		</div>

		</div> <!--header-->
		<!-- This is from navigation (banner information)-->
			<div id="wrap">
   <h1>Welcome to the Midd Calendar!</h1>


   <!-- Start of the navigation bar. -->
   <ul id="nav">
      <li><a href="./login.php">Log In</a></li>
      <li><a href="CreateUser.php">Create User</a></li>
      <li><a href="http://www.cs.middlebury.edu/~gkrathwohl/middCalendar/search.php">Search Events</a></li>
      <li><a href="http://www.middlebury.edu/studentlife/activities/mcab">MCAB</a></li>
      <li><a href="http://sga.middlebury.edu/">SGA</a></li>
   </ul>
   <!-- End of navigation bar-->
   
   <div id="content">
      <p>What's happening this week? </p>
   </div>
</div>
	<p>
		<div class="days">
		   <ul>
		        <li class="stuff"><a href="#">Monday</a></li>    
		    <li class="stuff"><a href="#">Tuesday</a></li>
		    <li class="stuff"><a href="#">Wednesday</a></li>
		    <li class="stuff"><a href="#">Thursday</a></li>
		    <li class="stuff"><a href="#">Friday<a></li>
		    <li class="stuff"><a href="#">Saturday</a></li>
		    <li class="stuff"><a href="#">Sunday</a></li>
	</p>

		    <!-- FOR NEW ITEM    
		    	<li class="web-only"><div class="withnewicon"><a title="Seven Days Forums" href="/forum">Forums</a><img width="22" height="18" class="newimage" title="" alt="" src="http://7dvt.com/sites/all/themes/sevendays/images/new.png"/></div></li> -->
		    </ul>
		    </div><!--sections-->
	</body>
</html>
