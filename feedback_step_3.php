<?php
include "configASL.php";
session_start();
if(isset($_POST['roll']))
{
	$_SESSION['roll']=$_POST['roll'];
}

if(isset($_POST['faculty_id']))
{
	$_SESSION['faculty_id']=$_POST['faculty_id'];
}
//Fetch Faculty Name
$nm = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM faculty WHERE faculty_id='".$_SESSION['faculty_id']."'"));
$_SESSION['name'] = $nm['name'];
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
<span class="SubHead">Step III</span>
<form method="post" action="feedback_step_4.php" >
<div id="table"> 
    <div class="tr">
		<div class="td">
        	<label>Roll No : </label>
        </div>
        <div class="td">
			<input type="text" disabled size="5" value="<?php echo $_SESSION['roll'];?>" />
            <input type="hidden" value="<?php echo $_SESSION['roll'];?>" name="roll" />
        </div>
    </div>
     <div class="tr">
     <div class="td">
        	<label>Faculty : </label>
        </div>
        

     <div class="td">
			<input type="text" disabled size="25" value="<?php echo $_SESSION['name'];?>" />
            <input type="hidden" value="<?php echo $_SESSION['faculty_id'];?>" name="faculty_id" />
        </div>
      </div>
      
      
      <div class="tr">
     <div class="td">
        	<label>Subject : </label>
        </div>
        

     <div class="td">
			<select name="subject" required>
            <option value="NA" disabled selected> - - Select Subject - -</option>
            <?php
			$x=mysqli_query($al,"select distinct s1,s2 from faculty WHERE faculty_id='".$_SESSION['faculty_id']."'");
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

		
        <div class="tdd">
        	<input type="button" onClick="window.location='feedback_step_2.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="NEXT" />
        </div>
   
    <br>
</div>
</form>
<br>

</body>
</html>