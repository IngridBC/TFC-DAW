<?php include ('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>AÑADIR PRODUCTO</h1>
            </br></br> 

            <?php 

                if(isset($_SESSION['upload'])){//checking the category is set or not 
                    echo $_SESSION['upload']; //Displaying category Message if set
                    unset($_SESSION['upload']); //Removing category Message
                }
            ?>

            <!-- showing food form starts-->
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">

                    <tr>
                        <td><label>Título:</label></td>
                        <td><input type="text" name="title" placeholder="Título producto"></td>
                    </tr>
                    <tr>
                        <td><label>Descripción:</label></td>
                        <td><textarea name="description_food" cols="30" rows="5" placeholder="Descripción producto"></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Precio:</label></td>
                        <td><input type="number" aria-labelledby="price" name="price" ></td>
                    </tr>
                    <tr>
                        <td><label>Seleccionar Imagen:</label></td>
                        <td><input type="file" aria-labelledby="image" name="image" ></td>
                    </tr>

                    <tr>
                        <td><label>Categoría:</label></td>
                        <td>
                            <select name="category_food"> 

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

                                        $id = $row['id'];
                                        $title = $row['title'];
                            ?>
                            <option value="<?php echo $id; ?>"><?php echo $title;?></option>
                            <?php
                                    }
                                }else{
                            ?> 
                            <option value="0"> Categoría no encontrada</option>
                            <?php
                                }
                            ?>                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Featured:</label></td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td><label>Active:</label></td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Añadir" class="btn-update"> 
                        </td>
                    </tr>
                </table>

            </form>

        <?php
            //check if the button submit
            if(isset($_POST['submit'])){

                $title = $_POST['title'];
                $description_value = $_POST['description_food'];
                $price_value = $_POST['price'];
                $category_value = $_POST['category_food'];
                
                if (isset($_POST['featured'])){
                    $featured = $_POST['featured'];// get the value clicked
                }else{
                    //Set the value defeated
                    $featured="No";
                }

                // same with Active option 
                if (isset($_POST['active'])){
                    $active = $_POST['active'];// get the value clicked    
                }else{
                //Set the value defeated
                    $active ="No";
                }

                if (isset($_FILES['image']['name'])){

                    $file_name=$_FILES['image']['name'];

                    if($file_name != ""){
                        
                        //Auto rename the name --> Get firt the extension 
                        $tmp = explode('.', $file_name);
                        $file_extension = end($tmp);

                        //Rename the file folloring Food_category 
                        $file_name="Food_name_".rand(00,99).'.'.$file_extension;

                        $source_path=$_FILES['image']['tmp_name'];
                        $image_folder = "../images-videos/food/";
                        $movefile=move_uploaded_file($source_path, $image_folder .$file_name);

                        if($movefile==false){
                            $_SESSION['upload'] = "<br/><div class='error'> Error actualizando imagen. Intentelo más tarde. </div> <br/>";
                            header("location:".SITEURL.'admin/add-food.php');
                            //Stop the process
                            die();                            
                        }
                    }
    
                }else{
                    //Don't upload image and set space as blankç
                    $file_name = "";
                }
                /*
                echo $title;
                echo "<br/>";
                echo $description_value;
                echo "<br/>";
                echo $price_value;
                echo "<br/>";
                echo $file_name;
                echo "<br/>";
                echo $category_value;
                echo "<br/>";
                echo $featured;
                echo "<br/>";
                echo $active;
                echo "<br/>";
                die();
                */

                //2. sql query to save in database for values 
                $sql2= "INSERT INTO tbl_food SET title='$title', description='$description_value', price=$price_value, image_name='$file_name', category_id=$category_value, featured='$featured', active='$active'";
                
                //echo "$sql2";//die();
                //3. Stablish Connection and Save data into database
                $res2=mysqli_query($con,$sql2);

                //5. checking Query executed and data is inserted or not and displaying the properly message
                if($res2==TRUE){
                    //echo "data inserted";
                    //create a Session Variable to Display Message
                    $_SESSION['add-food'] = "<div class='success'> Producto añadido.</div> <br/>";
                    //Redirect Page
                    header("location:".SITEURL.'admin/manage-food.php');
                }else{
                    //echo "Failed to insert data";
                    $_SESSION['add-food'] = "<div class='error'> Error añadir producto. Intentalo más tarde. </div> <br/>";
                    //Redirect Page
                    
                    header("location:".SITEURL.'admin/manage-food.php');
                }
            }
        ?>
        </div>
    </div>

<?php include ('partials/footer.php'); ?>

