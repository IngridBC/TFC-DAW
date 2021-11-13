<?php include ('partials/menu.php'); ?>
    <!-- MAIN CONTENT SECTION STARTS-->
    <div class="main-content">
        <div class="wrapper">
            <h1>AÑADIR CATEGORÍA</h1>
            <br/> <br/>

            <?php
                if(isset($_SESSION['add-category'])){//checking the category is set or not 
                    echo $_SESSION['add-category']; //Displaying category Message if set
                    unset($_SESSION['add-category']); //Removing category Message
                }

                if(isset($_SESSION['upload'])){//checking the category is set or not 
                    echo $_SESSION['upload']; //Displaying category Message if set
                    unset($_SESSION['upload']); //Removing category Message
                }
            ?>

            <!-- Add category form starts-->
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td><label>Título:</label></td>
                        <td><input type="text" name="title" placeholder="category title"></td>
                    </tr>
                    <tr>
                        <td><label>Seleccione Imagen: </label></td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td><label>Featured:</label></td>
                        <td>
                            <input type="radio" name="featured" value="Yes"> Yes
                            <input type="radio" name="featured" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td><label>Active:</label></td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Añadir" class="btn-update"> 
                        </td>
                    </tr>
                </table>
            </form>
            <!-- Add category form ends-->
            <?php
                //CHECK WETHER THE SUBMIT BUTTON IS CLICKED OR NOT 
                if (isset($_POST['submit'])){ //BUTTON CLICKED

                    //1. Get the data from form 
                    $title = $_POST['title'];

                    //Check the value of the bottons is selected
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

                    //check the image is selected //print_r($_FILES['image']);//die();                 
                    if (isset($_FILES['image']['name'])){
                        $file_name=$_FILES['image']['name'];

                        if($file_name != ""){
                            //Auto rename the name --> Get firt the extension 
                            $ext=end(explode('.',$file_name));

                            //Rename the file folloring Food_category 
                            $file_name="Food_category_".rand(00,99).'.'.$ext;

                            $source_path=$_FILES['image']['tmp_name'];
                            $image_folder = "../images/category/";
                            $movefile=move_uploaded_file($source_path, $image_folder .$file_name);

                            if($movefile==false){
                                $_SESSION['upload'] = "<div class='error'>Error añadir imagen. Intentelo de nuevo. </div> <br/>";
                                header("location:".SITEURL.'admin/add-category.php');
                                //Stop the process
                                die();                                
                            }
                        
                        }else{
                            //Don't upload image and set space as blankç
                            $file_name = "";
                        }                    
                    }

                    //2. sql query to save in database 
                    $sql= "INSERT INTO tbl_category SET title='$title', image_name='$file_name', featured='$featured', active='$active'";
                    //echo "$sql";

                    //3. Stablish Connection and Save data into database
                    $res=mysqli_query($con, $sql);

                    //5. checking Query executed and data is inserted or not and displaying the properly message
                    if($res==TRUE){
                        //echo "data inserted";
                        //create a Session Variable to Display Message
                        $_SESSION['add-category'] = "<div class='success'> Categoría añadida.</div> <br/>";
                        //Redirect Page
                        header("location:".SITEURL.'admin/manage-category.php');
                    }else{
                        //echo "Failed to insert data";
                        $_SESSION['add-category'] = "<div class='error'> Error al añadir categoría. Intentelo más tarde. </div> <br/>";
                        //Redirect Page
                        
                        header("location:".SITEURL.'admin/add-category.php');
                    }
                }/*else{//echo "error";//BUTTON NOT CLICKED }*/
            ?>
        </div>
    </div>

<?php include ('partials/footer.php'); ?>