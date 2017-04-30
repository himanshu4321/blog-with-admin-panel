<?php
session_start();
include("includes/connect.php");
extract($_POST);
$encrypt=md5($pass);
$query="select id from users where user='$user' and pass='$pass' ";
$result=mysql_query($query);
$rows=mysql_num_rows($result);
if (!$result) die("unable to connect table".mysql_error());
if($rows>=1)
{
	$_SESSION['user']=$user;

?>
<script> window.open('index.php','_self')</script>

<?php }
else
{
header("Location:admin_login1.php");
}
?>


