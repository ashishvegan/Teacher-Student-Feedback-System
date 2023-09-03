<?php
include "configASL.php";
session_start();

$sql=mysqli_query($al,"select * from feeds where roll='".mysqli_real_escape_string($al,$_POST['roll'])."' AND name='".mysqli_real_escape_string($al,$_POST['faculty'])."' AND subject='".mysqli_real_escape_string($al,$_POST['subject'])."'");

if(mysqli_num_rows($sql)>0)
{
	?>
    <script type="text/javascript">
	alert('Feedback already submitted');
	window.location='feedback_step_3.php';
	</script>
    <?php
}

if(isset($_POST['roll']))
{
	$_SESSION['roll']=$_POST['roll'];
}

if(isset($_POST['faculty_id']))
{
	$_SESSION['faculty_id']=$_POST['faculty_id'];
}

if(isset($_POST['subject']))
{
	$_SESSION['subject']=$_POST['subject'];
}
//Fetch Questions
$q = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM questions WHERE id = '1'"));
$parameters = array("Poor","Fair","Good","Very Good","Excellent");
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
<form method="post" action="feedback_step_5.php" >
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
			<input type="text" disabled size="25" value="<?php echo $_SESSION['subject'];?>"/>
            <input type="hidden" value="<?php echo $_SESSION['subject'];?>" name="subject" />
        </div>
      </div>
      
</div>
<hr style="width:100%;">

	<?php
		for($i=1;$i<=10;$i++)
		{
			?>
            <div class="tddd">
				<span class="text"><?php echo $i;?>. <?php echo  $q['q'.$i];?> : <br>
                <?php 
						for($j=1;$j<=5;$j++)
						{
							?>
                        <input type="radio" required value="<?php echo $j;?>" name="q<?php echo $i;?>" /><?php echo $parameters[$j-1];?>&nbsp;&nbsp;
                        <?php } ?> </span>
                        				</div>
                                        	<hr style="width:100%;"> <?php } ?>
                                         <div class="tddd">
                                         <textarea name="comment" cols="40" required placeholder="Enter Comments"></textarea>
                                         </div>
        	<input type="button" onClick="window.location='feedback_step_3.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="SUBMIT" onClick="return confirm('Are you sure?')" />
            <br>
<br>

        </div>
   
    <br>
</div>
</form>
<br>

</body>
</html>