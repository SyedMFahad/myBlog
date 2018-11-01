<?php
    include "inc/header_admin.php";
    include "inc/sidebar_admin.php";

    $db = new Database();
    $fm = new Format();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Post Title</th>
							<th width="20%">Description</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">tags</th>
							<th width="10%">Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = "SELECT tbl_post.title, tbl_post.body, tbl_category.name, 
										tbl_post.image, tbl_post.author, tbl_post.tags, tbl_post.date
										FROM tbl_post, tbl_category
										where tbl_post.cat = tbl_category.id order by tbl_post.id desc";

							$result = $db->select($query);
							if($result){
								for ($i=1; $row = $result->fetch_assoc(); $i++){
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $fm->shortText($row['body'],20);?></td>
							<td><?php echo $row['name'];?></td>
							<td><img src="../images/<?php echo $row['image'];?>" height="40px" width="40px"></td>
							<td><?php echo $row['author'];?></td>
							<td><?php echo $row['tags'];?></td>
							<td><?php echo $fm->formatDate($row['date']);?></td>
							<td><a href="">Edit</a> || <a href="">Delete</a></td>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>

<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
</script>

<?php
    include "inc/footer_admin.php";
?>
