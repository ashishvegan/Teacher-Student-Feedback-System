<?php
include("configASL.php");
$id=$_GET['del'];
mysqli_query($al,"delete from faculty where id='$id'");
?>
<script type="text/javascript">
alert("Successfully deleted");
window.location='manageFaculty.php';
</script>
