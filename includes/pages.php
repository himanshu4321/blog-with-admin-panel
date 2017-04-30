	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<div> <?php include("includes/header.php")?> </div>

	<div> <? php include("includes/navbar.php")?> </div>
     <div id="main_content">
<?php

include("connect.php");
$select_posts="select *from post order by rand() LIMIT 0,5";
$run_post=mysql_query($select_posts);
if(!$run_post)die("unable to connect mysql".mysql_error());
while ($row=mysql_fetch_array($run_post)) {
	
	$post_id=$row['post_id'];
	$post_title=$row['post_title'];
	$post_date=$row['post_date'];
	$post_author=$row['post_author'];
	$post_image=$row['post_image'];
	$post_keywords=$row['post_keywords'];
	$post_content=substr($row['post_content'],0,200);
?>

<h2>
<a href="pages.php?id=<?php echo post_id;?>">
<?php echo $post_title; ?>
</a>
	
</h2>
<p align="left">Published On:<b><?php echo $post_date; ?></p>
<p align="right">Posted By:<?php echo $post_author; ?></p>
<center><img src="images/<?php echo $post_image?>" width="500px" height="300px"/></center>
<p align="justify"><?php echo $post_content;   ?></p>

Content Area</div>
     <div> <? php include("includes/sidebar.php")?> </div>	
	</body>
	</html>