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
<h2><a href="p.php">View Posts</a></h2>
<h2><a href="#">Insert New Post</a></h2>
<h2><a href="#">View Comments</a></h2>

</div>
<?php 
include("includes/connect.php");
if(isset($_GET['edit']))
{
	$edit_id=$_GET['edit'];

	$edit_query="select *from post where post_id='$edit_id'";
	$run=mysql_query($edit_query);

	while ($row=mysql_fetch_array($run)) {
		
             $post_id=$row['post_id'];
			 $post_date=$row['post_date'];
		     $post_author=$row['post_author'];
			 $post_title=$row['post_title'];
			 $post_image=$row['post_image'];
			 $post_content=$row['post_content'];
			 $post_keywords=$row['post_keywords'];
	?>

<form method="post" action="edit_post.php?edit_form=<?php echo $post_id ;?>"                        enctype="multipart/form-data">
	<table width="600px" align="center" border="10px" bgcolor="orange">
	<tr>
		<td align="center" bgcolor="yellow" colspan="6"><h1>Edit the post here</h1></td>
	</tr>

	<tr>
		<td align="right" >Post Title:</td>
		<td><input type="text" name="title" size="30" value="<?php echo $post_title ?>"></td>
	</tr>

	<tr>
		<td align="right" >Post Author:</td>
		<td><input type="text" name="author" size="30" value="<?php echo $post_author ;?>"></td>
	</tr>
		

		<tr>
		<td align="right" >Post Keywords:</td>
		<td><input type="text" name="keywords" size="30" value="<?php echo $post_keywords;?>"></td>
	</tr>
		

		<tr>
		<td align="right" >Post Image:</td>

		<td><input type="file" name="image" ></td>
		<td>
			<img src="../images/<?php echo $post_image ;?>" width="50px" height="50px">
		</td>
	</tr>
		
          
          	<tr>
		<td align="right" >Post Content:</td>
		<td><textarea name="content" cols="30" rows="15"  ><?php print_r($post_content) ?></textarea></td>
	</tr>

		<tr>
		<td><input type="submit" name="submit" value="Update Now"></td>
	</tr>
	<tr>
		<td><input type="button" name="logout" value="logout"></td>
	</tr>	
	</table>
</form>
<?php }} ?>
</body>
</html>

<?php
include("includes/connect.php");
if(isset($_POST['submit']))
{
     $update_id=$_GET['edit_form'];
    $post_title1=$_POST['title'];
    echo $post_title1;
 	$post_date1=date('Y/m/d');
 	$post_author1=$_POST['author'];
 	$post_keywords1=$_POST['keywords'];
    $post_content1=$_POST['content'];
     $post_image1=$_FILES['image']['name'];
    $image_tmp=$_FILES['image']['tmp_name'];


		move_uploaded_file($image_tmp, "../images/$post_image1");

		$update_query="update post set post_title='$post_title1' where post_id='update_id'  ";


		$result=mysql_query($update_query);
		if (!$result)die("unable to connect table ".mysql_error());

               
       }
   	
   ?>
