<?php
    include "inc/header_admin.php";
    include "inc/sidebar_admin.php";

    $db = new Database();
    $fm = new Format();
?>
        <div class="grid_10">
            <div class="box round first grid">

                <h2>Category List</h2>
                <?php
            		if(isset($_GET['msg'])){
                        
                        echo "<span style='color:green'>Category deleted Successfully</span>";
                   }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						<?php

							$query = "select * from  tbl_category order by name";
							$result = $db->select($query);

							if($result){
								for($i=1; $row=$result->fetch_assoc(); $i++){

						?>

						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo  $row['name'];?></td>
							<td><a href="editcat.php?catid=<?php echo  $row['id'];?>">Edit</a> || <a  href="deletecat.php?catid=<?php echo  $row['id'];?>">Delete</a></td>
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
$(document).ready(function (){
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>

<?php
    include "inc/footer_admin.php";
?>