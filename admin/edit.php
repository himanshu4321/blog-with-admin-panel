<!DOCTYPE html>
<html>
<head>
	<title>Inserting new Post</title>
</head>
<body>
<form method="post" action="insert_post.php" enctype="multipart/form-data">
	<table width="600px" align="center" border="10px">
	<tr>
		<td align="center" bgcolor="yellow" colspan="6"><h1>Insert new post here</h1></td>
	</tr>

	<tr>
		<td align="right" >Post Title:</td>
		<td><input type="text" name="title" size="30"></td>
	</tr>

	<tr>
		<td align="right" >Post Author:</td>
		<td><input type="text" name="author" size="30"></td>
	</tr>
		

		<tr>
		<td align="right" >Post Keywords:</td>
		<td><input type="text" name="keywords" size="30"></td>
	</tr>
		

		<tr>
		<td align="right" >Post Image:</td>
		<td><input type="file" name="image" size="30"></td>
	</tr>
		
          
          	<tr>
		<td align="right" >Post Content:</td>
		<td><textarea name="content" cols="30" rows="15"></textarea></td>
	</tr>

		<tr>
		<td><input type="submit" name="submit" value="Publish Now"></td>
	</tr>
	<tr>
		<td><input type="button" name="logout" value="logout"></td>
	</tr>	
	</table>
</form>

</body>
</html>

<?php
include("includes/connect.php");
if(isset($_POST['submit']))
{
    $post_title=$_POST['title'];
 	$post_date=date('Y/m/d');
 	$post_author=$_POST['author'];
 	$post_keywords=$_POST['keywords'];
    $post_content=$_POST['content'];
    $post_image=$_FILES['image']['name'];
    $image_tmp=$_FILES['image']['tmp_name'];

if ($post_title=='' and $post_author=='' and $post_keywords=='' and $post_image=='' and 
	$post_content=='') {
	
	echo "<script>alert('not possible')</script>";
	exit();												
}
	else
	{
		move_uploaded_file($image_tmp, "../images/$post_image");

		$insert_query="insert into post values('','$post_title','$post_date',
		'$post_author','$post_image','$post_keywords','$post_content')";

		$result=mysql_query($insert_query);
        if (!$result)die("unable to connect table".mysql_error());
        else
        {
        	echo "Post Published successfully";
        }
}
}
else
{
	if(isset($_POST['logout']))
{
function redirect_to($new_location)
{
header("location:".$new_location);

}
redirect_to("admin_login1.php");
}
}
?>