<?php include ('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>ACTUALIZAR CATEGORÍA</h1>
            </br></br> 
            
            <?php 
            //1. Get the ID of Selected category
                $id=$_GET['id'];

            //2.Create SQL query
                $sql = "SELECT * FROM tbl_category WHERE id=$id";

            //Execute Query
                $res = mysqli_query($con, $sql);

            //Check query is executed or not

                if($res == true){
                    //check data is avalaible 
                    $count = mysqli_num_rows($res);
                    
                    //check if we have data or not 
                    if($count==1){
                        //Get details
                        //echo "category advalaible";
                        $row = mysqli_fetch_assoc($res);

                        //getting the data from the form --> from the associtive array
                        $title = $row ['title'];
                        $current_image = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                    }else{
                        //redirect to manage category
                        $_SESSION['no-category-found']= "<div class='error'> Failed to found category </div><br>";
                        header('location'.SITEURL.'admin/manage-category.php');
                    }
                }
            ?>
            <!-- Update category form starts-->
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td><label>Título:</label></td>
                        <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Imagen actual: </label></td>
                        <td>
                            <?php
                                if($current_image!=""){//display iamge 
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image;?>" width="100px">
                            <?php
                                }else{//Dispaly message
                                    echo "<div class='error'>Imagen no añadida.</div> ";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <label>Nueva iamgen:</label></td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td><label>Featured:</label></td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                            <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td><label>Active:</label></td>
                        <td>
                            <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                            <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Actualizar" class="btn-update"> 
                        </td>
                    </tr>
                </table>
            </form>
            <!-- Update category form ends-->
            <?php 
                if(isset($_POST['submit'])){
                    //echo "Button clicked";//saving data
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $current_image = $_POST['current_image'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    //Update the image selected
                    if (isset($_FILES['image']['name'])){
                        
                        $file_name=$_FILES['image']['name'];

                        if($file_name!=""){//Auto rename the name --> Get firt the extension 
                            $tmp = explode('.', $file_name);
                            $ext = end($tmp);

                            //$ext=end(explode('.',$file_name));

                            //Rename the file folloring Food_category 
                            $file_name="Food_category_".rand(00,99).'.'.$ext;
                            $source_path=$_FILES['image']['tmp_name'];
                            $image_folder = "../images/category/";
                            $movefile=move_uploaded_file($source_path, $image_folder .$file_name);

                            if($movefile==false){
                                $_SESSION['upload'] = "<div class='error'> Error al actualizar imagen. Intentelo más tarde.</div> <br/>";
                                header("location:".SITEURL.'admin/manage-category.php');
                                //Stop the process
                                die();       
                            }

                            //Removing the image 
                            if($current_image != ""){
                                $remove_path="../images/category/".$current_image;
                                $remove=unlink($remove_path);
                                //echo $remove;
                                //die();
                                //check if the image has been removed or not   
                                if($remove==false){
                                    $_SESSION['failed-remove'] = "<div class='error'> Error al remover imagen actual. Intentelo más tarde. </div> <br/>";
                                    header("location:".SITEURL.'admin/manage-category.php');
                                    //Stop the process
                                    die();
                                }
                            }
                            
                        }else{
                            $file_name = $current_image;
                        }
                        
                    }else{
                        $file_name = $current_image;
                    }

                    //2.2 create SQL Query to Update Admin
                    $sql2 = "UPDATE tbl_category SET title='$title', image_name='$file_name', featured='$featured', active='$active' WHERE id = $id";

                    //3. Stablish Connection and Save data into database
                    $res2=mysqli_query($con, $sql2);
                    
                    // check the query is executed 

                    if ($res2==true){
                        //query successfully updated category
                        //echo "category updated";
                        $_SESSION['update-category']= "<div class='success'> Categoría actualizada. </div><br/>";
                        header('location:'.SITEURL.'admin/manage-category.php');

                    }else{

                        //failed to update category
                        $_SESSION['update-category']= "<div class='error'> Error al actualizar categoría. </div><br/>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                }//redirect to manage admin-- > showing properly mesage 
            ?>
        </div>
    </div>

<?php include ('partials/footer.php'); ?>