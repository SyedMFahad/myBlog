<?php
    include "inc/header_admin.php";
    include "inc/sidebar_admin.php";

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <div class="block copyblock"> 

                <?php 
                    $db = new Database();
                    $fm = new Format();

                    if(!isset($_GET['catid']) or $_GET['catid']==NULL){
                        header("Location:catlist.php");
                        //echo "<script>window.location='catlist.php';</script>";
                    }else{
                        $catid = $_GET['catid'];
                    }

                    $query = "Select * from tbl_category where id='$catid'";
                    $result = $db->select($query);
                    $row = $result->fetch_assoc();

                    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['update'])){
                        $name = $_POST['name'];
                        if(!empty($name)){
                            $query = "UPDATE tbl_category set name='$name' where id='$catid'";
                            $update_result = $db->update($query);
                            echo "<span style='color:green'>Category inserted Successfully</span>";
                        }else{
                            echo "<span style='color:red'>Field mustn't be empty</span>";
                        }
                    }

                ?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $row['name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="update" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

<?php
    include "inc/footer_admin.php";
?>