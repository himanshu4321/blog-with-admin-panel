	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<div> <?php include("includes/header.php")?> </div>
	<div> <?php include("includes/navbar.php")?> </div>
<div id="main_content">
  <h1> your search result</h1>
<?php
include("includes/connect.php");

if(isset($_GET['search']))
{
 echo $search=$_GET['value'];
 $search_query="select *from post where post_keywords like'%$search%'";
  $run=mysql_query($search_query);
  while($search_row=mysql_fetch_array($run))
  {
  $post_title=$search_row['post_title'];
  $post_image=$search_row['post_image'];
  $post_content=substr($search_row['post_content'],0,150);
  
?>

 <h2><?php echo $post_title?></h2>
 <img src="images/<?php echo $post_image?>" width="300px" height="100px">
 <p><?php echo $post_content; ?></p>

<?php }} ?>
	

</div>



     <div> <?php include("includes/sidebar.php")?> </div>	
	
	<div id="footer">Footer</div>
	</body>
	</html>