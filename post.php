<?php 
	include "inc/header.php";


	$db = new Database();
	$fm = new Format();

	if(!isset($_GET['id']) or $_GET['id']==NULL){
		header("Location:404.php");
	}else{
		$id = $_GET['id'];
	}



	$query = "select * from tbl_post where id=$id";

	$ro = $db->select($query);

	if($ro){
		$row = $ro->fetch_assoc();

?>



	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $row['title'];?></h2>
				<h4><?php echo $fm->formatDate($row['date']);?>, By <a href="#"><?php echo $row['author'];?></a></h4>
				<a href="#"><img src="images/<?php echo $row['image'];?>" alt="post image"/></a>
				
					<?php echo $row['body']?>

		<?php 
			}else{
				header("Location:404.php");
			}
		?>

		<div class="relatedpost clear">
			<h2>Related articles</h2>

		<?php
			$cat_id = $row['cat'];
			$related_query = "select * from tbl_post where cat = $cat_id and id != $id limit 6";
			$related_result = $db->select($related_query);
			
			if($related_result){
				while($related_row = $related_result->fetch_assoc() ){
		?>			
						<a href="post.php?id=<?php echo $related_row['id'];?>"><img src="images/<?php echo $related_row['image'];?>" alt="post image"/></a>
		<?php			
				}
			}else{
				echo "<p>Now related post</p>";
			}
		?>
		</div>
	</div>

		</div>
		
	<?php 
		include "inc/sidebar.php";
		include "inc/footer.php";  
	?>