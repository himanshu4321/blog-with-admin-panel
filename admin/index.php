<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("Location:admin_login1.php");
}
else
{
?>




<!DOCTYPE html>
<html>
<head>
	<title>Admin panel </title>
	<link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>
<div id="header"><a href="index.php"><h1>Welcome to the admin panel</h1></a></div>

<div id="sidebar">
	
	Welcome:<h2><?php echo $_SESSION['user']; ?></h2>
<h2><a href="logout.php">Logout</a></h2>
<h2><a href="p.php">View Posts</a></h2>
<h2><a href="index.php?insert=insert">Insert New Post</a></h2>
<h2><a href="#">View Comments</a></h2>

</div>
<div id="welcome">
	
	<h2>Welcome to admin panel</h2>
	<p>This is your admin panel where  you can manage your website files and <content></content></p>
</div>
<?php

if(isset($_GET['insert']))
{
	include("insert_post.php");
}
?>

</body>
</html>
<?php } ?>