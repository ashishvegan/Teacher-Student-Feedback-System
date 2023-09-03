<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$name=$y['name'];
$old=$y['password'];

if(!empty($_POST))
{
	$p1=sha1($_POST['p1']);
	$p2=sha1($_POST['p2']);
	if($old==$p1)
	{
		$u=mysqli_query($al,"update admin set password='$p2' where aid='$aid'");
	}
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully changed password');
		</script>
        <?php } else { ?> <script type="application/javascript">
		alert('Incorrect old password');
		</script><?php }
}
		
?>
<!doctype html>
<html><!-- Designed & Developed by Ashish Labade (Tech Vegan) www.ashishvegan.com | Not for Commercial Use-->
<head>
<meta charset="utf-8">
<title>Student Feedback System</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="topHeader">
	TECH VEGAN PROJECTS<br />
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</div>
<br>
<br>
<br>
<br>

<div id="content" align="center">
<br>
<br>
<span class="SubHead">Change Password</span>
<br>
<br>
<form method="post" action="" >
<div id="table">
	<div class="tr">
		<div class="td">
        	<label>Old Password : </label>
        </div>
        <div class="td">
			<input type="password" name="p1" size="25" required placeholder="Enter Old Password" />
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>New Password : </label>
        </div>
        
        <div class="td">
			<input type="password" name="p2" size="25" required placeholder="Enter New Password" />
        </div>
    </div>
</div>
		
        <div class="tdd">
        	<input type="submit" value="CHANGE PASSWORD" />
        </div>
    
<br>
<br>

     <br>

<input type="button" onClick="window.location='home.php'" value="BACK">
<br>
<br>
</div>
</form>


<br>
<br>
<br>

<br>
<br>

</div>
</body>
</html>