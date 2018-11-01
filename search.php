<?php 
	include "inc/header.php";
	include "inc/slider.php";
?>

<?php



	$db = new Database();
	$fm = new Format();

	if(isset($_POST['keyword']) and $_POST['keyword']!=null){
		$search = $_POST['keyword'];
	}else{
		$search = null;
	}
	

	$query = "Select * from tbl_post where title like '%$search%' or body like '%$search%' limit 4";
	$result = $db->select($query);



?>




	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

		<?php

			if($result and $search != null){
				while($row = $result->fetch_assoc()){

		?>

			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($row['date']);?>, By <a href="#"><?php echo $row['author']?></a></h4>
				 <a href="post.php?id=<?php echo $row['id'];?>"><img src="images/<?php echo $row['image'];?>" alt="post image"/></a>
					<?php echo $fm->shortText($row['body']);?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id'];?>">Read More</a>
				</div>
			</div>
		
		<?php 
			} 

		}else{
				echo "<h3>No match found</h3>";
			}	
		?>

		
		
			

		</div>


	
	<?php 
		include "inc/sidebar.php";
		include "inc/footer.php";
	?>
	  
	

	