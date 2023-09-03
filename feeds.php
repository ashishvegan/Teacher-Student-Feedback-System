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
<span class="SubHead">Student Feedback</span>
<br>
<br>


<form method="post" action="feeds_2.php" >
<div id="table"> 
    <div class="tr">
		<div class="td">
        	<label>Faculty : </label>
        </div>
        <div class="td">
			<select name="faculty_id" required>
            <option value="NA" disabled selected> - - Select Faculty - -</option>
            <?php
			$x=mysqli_query($al,"select * from faculty");
			while($y=mysqli_fetch_array($x))
			{
			 ?>
             <option value="<?php echo $y['faculty_id'];?>"><?php echo $y['name'];?></option>
             <?php } ?>
                </select>
        </div>
    </div>
     <div class="tr">
     <div class="td">
        	<label>Subject : </label>
        </div>
        <div class="td">

     <div class="td">
			<select name="subject" required>
            <option value="NA" disabled selected> - - Select Subject - -</option>
            <?php
			$x=mysqli_query($al,"select * from faculty");
			while($y=mysqli_fetch_array($x))
			{
			 ?>
             <option value="<?php echo $y['s1'];?>"><?php echo $y['s1'];?></option>
             <option value="<?php echo $y['s2'];?>"><?php echo $y['s2'];?></option>
             
             <?php } ?>
                </select>
        </div>
      </div>
</div>
</div>
		
        <div class="tdd">
        	<input type="button" onClick="window.location='home.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="NEXT" />
        </div>
    
    <br>
</div>
</form>

</div>
</body>
</html>