<div id="sidebar">
<div id="searchbox">
<form method="get" action="search.php" enctype="multipart/form-data">

<input type="text" name="value" placeholder="Search this site" size="25px">
	<input type="submit" name="search" value="Search">

</form>


	
</div>

<div id="social">
	<h2> Follow Us</h2>
<a href="https://www.facebook.com/himanshu.singh.5437"><img src="images/facebook.png"></a>
<img src="images/twitter.png">
<img src="images/instagram.png">
<img src="images/google.png">
</div>

<?php

include("connect.php");
	$query="select *from post order by 1 desc limit 0,5";
	$result=mysql_query($query);

	while ($row=mysql_fetch_array($result)) {
		$post_id=$row['post_id'];
		$title=$row['post_title'];
		$image=$row['post_image'];
	?>
	<h2 align="center">Recent Post</h2>
	<center><h3><?php echo $title;?></h3>
	<img src="images/<?php echo $image ?>" width="100px" height="100px">

	<?php }?>


Sidebar</div>