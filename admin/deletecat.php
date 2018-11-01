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

                    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['delete'])){
                        $name = $_POST['name'];
                        if(!empty($name)){
                            $query = "Delete from tbl_category where id='$catid'";
                            $delete_result = $db->delete($query);
                            echo "<script>window.location='catlist.php?msg';</script>";
                            //header("Location:catlist.php");
                        }else{
                            echo "<span style='color:red'>Couldn't be deleted</span>";
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
                                <input onclick="return confirm('Sure to delete Category?!');" type="submit" name="delete" Value="Delete" />
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