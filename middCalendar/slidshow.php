<html>
<head>
<script type="text/javascript">
<!--
var image1=new Image()
image1.src="midd.jpg"
var image2=new Image()
image2.src="wall.jpg"
var image3=new Image()
image3.src="rugby.jpg"
//-->
</script>
</head>
<body>
<img src="firstcar.gif" name="slide" width="400" height="600" />
<script>
<!--
//variable that will increment through the images
var step=1
function slideit(){
//if browser does not support the image object, exit.
if (!document.images)
return
document.images.slide.src=eval("image"+step+".src")
if (step<3)
step++
else
step=1
//call function "slideit()" every 2.5 seconds
setTimeout("slideit()",5000)
}
slideit()
//-->
</script>
</body>
</html>