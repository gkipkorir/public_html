
<!DOCTYPE html>
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
				width: 60%;
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
			p {
				font-family:"Times New Roman";
				font-size:20px;
			}
		</style>
	</head>
	
	<body background=wall.jpg> 
	<!--<body background=midd.jpg> -->
		<div class="box"> 
			<p>Hello world let's make a sick calendar!!!</p>
		</div>

		</div> <!--header-->
		<!-- This is from navigation (banner information)-->
			<div id="wrap">
   <h1>Welcome to the Midd Calendar!</h1>

   <!-- Here's all it takes to make this navigation bar. -->
   <ul id="nav">
      <li><a href="./login.php">Log In</a></li>
      <li><a href="CreateUser.php">Create User</a></li>
      <li><a href="http://www.cs.middlebury.edu/~gkrathwohl/middCalendar/search.php">Search Events</a></li>
      <li><a href="http://www.middlebury.edu/studentlife/activities/mcab">MCAB</a></li>
      <li><a href="http://sga.middlebury.edu/">SGA</a></li>
   </ul>
   <!-- That's it! -->
   
   <div id="content">
      <p>What's happening this week? </p>
   </div>
</div>

		<div class="days">
		   <ul>
		        <li class="stuff"><a href="http://sevendaysvt.com/events" id="navlink-for-tab-3" title="calendar of events">Calendar</a></li>    
		    <li class="stuff"><a href="http://sevendaysvt.com/music" id="navlink-for-tab-2" title="club dates, album reviews, music news">Music</a></li>
		    <li class="stuff"><a href="http://sevendaysvt.com/movie-times" id="navlink-for-tab-4" title="movie reviews and local show times">Movies</a></li>
		    <li class="stuff"><a href="http://sevendaysvt.com/art" id="navlink-for-tab-5" title="gallery listings, art reviews">Art</a></li>
		    <li class="stuff"><a href="http://sevendaysvt.com/articles" title="features, columns, news">This Week</a></li>
		    s
		    <!-- FOR NEW ITEM    
		    	<li class="web-only"><div class="withnewicon"><a title="Seven Days Forums" href="/forum">Forums</a><img width="22" height="18" class="newimage" title="" alt="" src="http://7dvt.com/sites/all/themes/sevendays/images/new.png"/></div></li> -->
		    </ul>
		    </div><!--sections-->
	</body>
</html>
