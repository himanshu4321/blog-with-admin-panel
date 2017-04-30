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
	
<h2><a href="#">Logout</a></h2>
<h2><a href="#">View Posts</a></h2>
<h2><a href="#">Insert New Post</a></h2>
<h2><a href="#">View Comments</a></h2>
</div>

<table width="1000" border="5px" align="center">
<tr>
	<td colspan="10" align="center" bgcolor="yellow">
	<h1> view all posts</h1>
	</td>
</tr>
<tr bgcolor="orange">
	<th>Post no</th>
	<th>Post Date</th>
	<th>Post Author</th>
	<th>Post Title</th>
	<th>Post Image</th>
	<th>Post Content</th>
	<th>Delete Post</th>
	<th>Edit Post</th>
</tr>
<tr>
<?php

// $db=mysql_connect();
$conn = new mysqli('localhost','root','', "malala");
	if (!$conn)
		die("unable to connect database:".mysql_error());
	$sql="select * from post";
	$result = $conn->query($sql);
	// $result=mysql_query($sql);
	// var_dump($result);
	// if($result)die("unable to connect table".mysql_error());


	if (mysqli_num_rows($result) > 0) {
    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    
	         $post_id=$row['post_id'];
			 $post_date=$row['post_date'];
		 $post_author=$row['post_author'];
			 $post_title=$row['post_title'];
			 $post_image=$row['post_image'];
			 $post_content=$row['post_content'];

			?>
			<tr>
			<td><?php echo $post_id;?></td>	
			 <td><?php echo $post_date;?></td>	
			 <td><?php echo $post_author;?></td>	
			 <td><?php echo $post_title;?></td>	
			 <td><img src="../images/<?php echo $post_image;?>" width="100px" height="100px"></td>
			 <td><?php echo $post_content?></td>
			 <td> <a href="delete.php?del=<?php echo $post_id;?>">delete</a></td>	
			 <td> <a href="edit_post.php?edit=<?php echo $post_id;?>">edit</a></td>	
			 </tr>	
	<?php }} ?> 
</tr>
</table>


</body>
</html>
<?php } ?>