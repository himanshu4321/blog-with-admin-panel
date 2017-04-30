<?php
include("includes/connect.php");
     if(isset($_GET['del']))
     {
	$delete_id=$_GET['del'];
	$delete_query="delete from post where post_id='$delete_id'";
	$result=mysql_query($delete_query);
	if($result)
	{
	?>
		 <script>alert('post has been deleted')</script>";
        <script>window.open('p.php','_self')</script>";
<?php	}
}
?>