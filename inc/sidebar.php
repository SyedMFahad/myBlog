<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php
						$db = new Database();
						$query = "select * from tbl_category";
						$result = $db->select($query);
						if($result){
							while($row = $result->fetch_assoc()){
					?>
						<li><a href="cat_posts.php?category=<?php echo $row['id']?>"><?php echo $row['name']?></a></li>
					<?php
						}
					}

					?>						
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>

				<?php 
					$query = "Select * from tbl_post limit 4";
					$result = $db->select($query);

					if($result){
						while($row = $result->fetch_assoc()){

				?>

				
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></h3>
						<a style="text-decoration: none;" href="post.php?id=<?php echo $row['id'];?>"><img src="images/<?php echo $row['image'];?>" alt="post image"/>
							<?php echo $fm->shortText($row['body'], 130);?></a>
					</div>
				<?php	
					}
				}else{
					header("Location:404.php");
				}	
				?>	
			</div>
			
		</div>
</div>