<?php include ('partials/menu.php');?>

    <div class="main-content">
        <div class="wrapper">
            <h1>ACTUALIZAR PRODUCTO</h1>
            </br></br> 
            <?php 
                //1. Get the ID of Selected food
                $id=$_GET['id'];

                 //2.Create SQL query
                $sql_get = "SELECT * FROM tbl_food WHERE id=$id";

                 //Execute Query
                $res_get = mysqli_query($con, $sql_get);

                //Check query is executed or not
                if($res_get == true){//check data is avalaible 
                    $count = mysqli_num_rows($res_get);
                    
                    //check if we have data or not 
                    if($count==1){

                        //Get details //echo "food advalaible";
                        $row = mysqli_fetch_assoc($res_get);

                        //getting the data from the form --> from the associtive array
                        $title = $row ['title'];
                        $description = $row ['description'];
                        $price = $row ['price'];
                        $current_image = $row['image_name'];
                        $current_category = $row ['category_id'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                    }else{
                    //redirect to manage admin
                    //$_SESSION['no-food-found']= "<div class='error'> Failed to found food </div><br>";
                    header('location'.SITEURL.'admin/manage-food.php');
                    }
                }
            ?>
                <!-- Update category form starts-->
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td><label>Título:</label></td>
                        <td><input type="text" name="title" value="<?php echo $title;?>"></td>
                    </tr>
                    <tr>
                        <td><label>Descripción:</label></td>
                        <td><textarea name="description" id="" cols="30" rows="10"><?php echo $description;?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Precio:</label></td>
                        <td><input type="number" name="price" value="<?php echo $price;?>"></td>
                    </tr>
                    <tr>
                        <td><label>Imagen actual: </label></td>
                        <td>
                            <?php
                                if($current_image!=""){
                                        //display iamge 
                            ?>
                            <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image;?>" width="100px">
                            <?php
                                }else{
                                    //Dispaly message
                                    echo "<div class='error'>Imagen no disponible.</div> ";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <label>Nueva imagen:</label></td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td><label>Categoría:</label>
                    
                            <select name="new_category" id="new_category">
                                <?php                        
                                    //create php code for display categories from database
                                    $sql1 = "SELECT * FROM tbl_category WHERE active='Yes'";

                                    //Executing query 
                                    $res1= mysqli_query($con,$sql1);

                                    //counting row for checking if it has the category or not 
                                    $count = mysqli_num_rows($res1);
                                
                                    //if the variable count is greater than Zero (true) we have category if it is not we don't have 
                                    if($count>0){
                                        while($row=mysqli_fetch_assoc($res1)){

                                            $category_id = $row['id'];
                                            $category_title = $row['title'];
                                ?>
                                        <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                                <?php
                                        }
                                    }else{
                                ?> 
                                        <option value="0"> Categoría no disponible</option>
                                <?php
                                    }
                                ?>  
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Featured:</label></td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                            <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td><label>Active:</label></td>
                        <td>
                            <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
                            <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">                            
                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                            <input type="hidden" name="id" value="<?php ob_start(); echo $id;?>">
                            <input type="submit" name="submit" value="Actualizar" class="btn-update"> 
                        </td>
                    </tr>
                </table>
            </form>
            <!-- Update category form ends-->
            
            <?php 
                if(isset($_POST['submit'])){

                    //echo "Button clicked";
                    //saving data
                    $id = $_POST['id'];
                    $new_title = $_POST['title'];
                    $new_description = $_POST ['description'];
                    $new_price = $_POST ['price'];
                    $current_image = $_POST['current_image'];
                    $new_category = $_POST ['new_category'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];
                    
                    //Update the image selected

                    if (isset($_FILES['image']['name'])){
                        
                        $file_name=$_FILES['image']['name'];

                        if($file_name!=""){
                            
                            //Auto rename the name --> Get firt the extension 
                            $tmp = explode('.', $file_name);
                            $file_extension = end($tmp);

                            //Rename the file folloring Food_category 
                            $file_name="Food_name_".rand(00,99).'.'.$file_extension;

                            $source_path=$_FILES['image']['tmp_name'];
                            $image_folder = "../images/food/";
                            $movefile=move_uploaded_file($source_path, $image_folder .$file_name);

                            if($movefile==false){
                                $_SESSION['upload'] = "<div class='error'> Error actualizar imagen. Intentelo más tarde. </div> <br/>";
                                header('location:'.SITEURL.'admin/manage-food.php');
                                //Stop the process
                                die();       
                            }

                            //Removing the image 
                            if($current_image != ""){
                                $remove_path="../images/food/".$current_image;
                                $remove=unlink($remove_path);
                                //echo $remove;
                                //die();
                                //check if the image has been removed or not   
                                if($remove==false){
                                    $_SESSION['failed-remove'] = "<div class='error'>Error al remover imagen actual. Intentelo más tarde. </div> <br/>";
                                    header('location:'.SITEURL.'admin/manage-food.php');
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
                    $sql_delete = "UPDATE tbl_food SET title='$new_title', description='$new_description', price=$new_price, image_name='$file_name', category_id=$new_category, featured='$featured', active='$active' WHERE id = $id";

                    //3. Stablish Connection and Save data into database
                    $res_delete=mysqli_query($con, $sql_delete);
                    
                    // check the query is executed 
                    if ($res_delete ==true){
                        //query successfully deleted admin
                        //echo "category updated";
                        $_SESSION['update-food']= "<div class='success'> Producto actualizado. </div><br/>";
                        header('location:'.SITEURL.'admin/manage-food.php');

                    }else{

                        //failed to update category
                        $_SESSION['update-food']= "<div class='error'> Error al actualizar producto. </div><br/>";
                        header('location:'.SITEURL.'admin/manage-food.php');
                    }
                }       //redirect to manage admin-- > showing properly mesage
                ob_end_flush(); // output buffering --> if not the page won't be directed to the header 
            ?>
        </div>
    </div>

<?php include ('partials/footer.php');?>