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

if(!empty($_POST))
{
	$faculty_id=$_POST['faculty_id'];
	//Fetch Name
	$name = mysqli_fetch_array(mysqli_query($al,"SELECT * FROM faculty WHERE faculty_id='".$faculty_id."'"));
	$subject=$_POST['subject'];
	$sql=mysqli_query($al,"select * from feeds where faculty_id='$faculty_id' AND subject='$subject'");
	while($z=mysqli_fetch_array($sql))
	{
		$q1 = $q1 + $z['q1'];
		$q2 = $q2 + $z['q2'];
		$q3 = $q3 + $z['q3'];
		$q4 = $q4 + $z['q4'];
		$q5 = $q5 + $z['q5'];
		$q6 = $q6 + $z['q6'];
		$q7 = $q7 + $z['q7'];
		$q8 = $q8 + $z['q8'];
		$q9 = $q9 + $z['q9'];
		$q10 = $q10 + $z['q10'];
		$total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10;
		$s++;
		
	}
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

<div id="content" align="center" style="width:600px;">
<br>
<br>
<span class="SubHead">Student Feedback</span>
<br>
<br>

<table border="0" cellpadding="4" cellspacing="4">
<tr><td style="font-weight:bold;">Faculty Name : </td><td><?php echo $name['name'];?></td></tr>
<tr><td style="font-weight:bold;">Subject : </td><td><?php echo $subject;?></td></tr>
<tr><td style="font-weight:bold;">1. Description of course objectives &amp; assignments :</td><td><?php echo $q1;?></td></tr>
<tr><td style="font-weight:bold;">2. Communication of ideas &amp; information : </td><td><?php echo $q2;?></td></tr>
<tr><td style="font-weight:bold;">3. Expression of expectations for performance : </td><td><?php echo $q3;?></td></tr>
<tr><td style="font-weight:bold;">4. Availability to assist students in or out of class : </td><td><?php echo $q4;?></td></tr>
<tr><td style="font-weight:bold;">5. Respect or concern for students : </td><td><?php echo $q5;?></td></tr>
<tr><td style="font-weight:bold;">6. Stimulation of interest in course : </td><td><?php echo $q6;?></td></tr>
<tr><td style="font-weight:bold;">7. Facilitation of learning : </td><td><?php echo $q7;?></td></tr>
<tr><td style="font-weight:bold;">8. Enthusiasm for the subject : </td><td><?php echo $q8;?></td></tr>
<tr><td style="font-weight:bold;">9. Encourage students to think independently, creatively &amp; critically : </td><td><?php echo $q9;?></td></tr>
<tr><td style="font-weight:bold;">10. Overall rating : </td><td><?php echo $q10;?></td></tr>
<tr><td style="font-weight:bold;">Total Students :</td><td><?php echo $s;?></td></tr>
<tr><td style="font-weight:bold;">Total :</td><td><?php echo $total;?></td></tr>
<tr><td style="font-weight:bold;" colspan="2" align="center">Comments</td></tr>
	<tr><td colspan="2">
    	<?php $cc = mysqli_query($al, "SELECT * FROM comments WHERE faculty_id = '".$faculty_id."' ORDER BY id DESC");
		while($pr = mysqli_fetch_array($cc))
		{
			echo "~".$pr['comment']."~";
		}
		?>
    </td>
    </tr>
</table>
<br>
<br>
<input type="button" onClick="window.print();" value="PRINT">&nbsp;<input type="button" onClick="window.location='feeds.php'" value="BACK">
<br>
<br>

</div>
</body>
</html>