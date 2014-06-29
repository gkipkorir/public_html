<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CSS Newbie Example: Super Simple Horizontal Navigation Bar</title>
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
   
   /* This is just styling for this specific page. */
   body {
      background-color: #555; 
      font: small/1.3 Arial, Helvetica, sans-serif; }
   #wrap {
      width: 750px;
      margin: 0 auto;
      background-color: #fff; }
   h1 {
      font-size: 1.5em;
      padding: 1em 8px;
      color: #333;
      background-color: #069;
      margin: 0; }
   #content {
      padding: 0 50px 50px; }
</style>
</head>

<body>
<div id="wrap">
   <h1>Welcome to the Midd Calendar!</h1>
   
   <!-- Here's all it takes to make this navigation bar. -->
   <ul id="nav">
      <li><a href="#">Events Us</a></li>
      <li><a href="#">Create an event</a></li>
      <li><a href="#">FAQs</a></li>
      <li><a href="#">Mcab</a></li>
      <li><a href="#">SGA</a></li>
   </ul>
   <!-- That's it! -->
   
   <div id="content">
      <p>It doesn't get much simpler than the navigation bar above. For more information on how this works, please <a href="http://www.cssnewbie.com/super-simple-horizontal-navigation-bar/">see the original CSS Newbie article.</a> For the code, just view the source.</p>
   </div>
</div>

</body>
</html>