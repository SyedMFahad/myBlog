<?php
    include "inc/header_admin.php";
    include "inc/sidebar_admin.php";

    $db = new Database();
    $fm = new Format();

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">  
                <?php
                    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['submit'])){
                        $cat = $_POST['cat'];
                        $title = $_POST['title'];
                        $body = $_POST['body'];
                        $image = $_POST['image'];
                        $author = $_POST['author'];
                        $tags = $_POST['tags'];

                        if($cat=="" or $title=="" or $body=="" or $image=="" or $author=="" or $tags==""){
                            echo "<span style='color:red'>Field mustn't be empty</span>";
                        }else{
                            $query = "insert into tbl_post(cat, title, body, image, author, tags) values('$cat', '$title', '$body', '$image', 
                            '$author',   '$tags')";
                             $result = $db->insert($query);
                            if($result){
                                echo "<span style='color:green'>Category inserted Successfully</span>";
                            }else{
                                echo "<span style='color:red'>Category not inserted Successfully</span>";
                            }
                        }

                    }
                ?>             
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." class="medium" name="title"/>
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Category</option>
                                    <?php
                                        $query = "SELECT * FROM tbl_category";
                                        $result = $db->select($query);
                                        if($result){
                                            while($row = $result->fetch_assoc()){
                                    ?>

                                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                    
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                   
                    
                        <tr>
                            <td>
                                <label>Image</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Image name..." class="medium" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Author name..." class="medium" name="author"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Tags..." class="medium" name="tags"/>
                            </td>
                        </tr>

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

<!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

<?php
    include "inc/footer_admin.php";
?>


