<?php 
	include "inc/header.php";
	include "inc/slider.php";
?>
--
<?php



	$db = new Database();
	$fm = new Format();
	$main_query = "Select * from tbl_post";

	$main_result = $db->select($main_query);
	
	$per_page = 3;
	$total_rows = $main_result->num_rows;
	$total_pages = ceil($total_rows/$per_page); 

	if(isset($_GET['page'])){
		$start_from = ($_GET['page']*$per_page) - $per_page;
	}else{
		$start_from = 0;
	}

	$query = "Select * from tbl_post limit $start_from, $per_page";
	$result = $db->select($query);



?>




	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

		<?php

			if($result){
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
		
		<?php } ?>

			<span class="paginationss">
			<?php

				for($i = 1; $i<=$total_pages; $i++){

					echo "<a href='index.php?page=$i'>$i</a>";

				} 
			?>

			</span>

		<?php
		}else{
				//header("Location:index.php");
			}	
		?>

		
		
			

		</div>


	
	<?php 
		include "inc/sidebar.php";
		include "inc/footer.php";
	?>
	  
	

	
