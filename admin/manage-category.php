<?php include ('partials/menu.php');?>
<!-- MAIN CONTENT SECTION STARTS-->
<div class="main-content">
        <div class="wrapper">
            <h1>GESTIÓN CATEGORÍA</h1>            
            <br/> <br/>
            <?php
                if(isset($_SESSION['add-category'])){//checking the category is set or not 
                    echo $_SESSION['add-category']; //Displaying category Message if set
                    unset($_SESSION['add-category']); //Removing category Message
                }

                if(isset($_SESSION['remove-file'])){//checking the file is set or not 
                    echo $_SESSION['remove-file']; //Displaying file Message if set
                    unset($_SESSION['remove-file']); //Removing category Message
                }

                if(isset($_SESSION['delete-category'])){
                    echo $_SESSION['delete-category']; //Displaying session Message
                    unset($_SESSION['delete-category']); //Removing Session Message
                }

                if(isset($_SESSION['no-category-found'])){
                    echo $_SESSION['no-category-found']; //Displaying session Message
                    unset($_SESSION['no-category-found']); //Removing Session Message
                }

                if(isset($_SESSION['update-category'])){
                    echo $_SESSION['update-category']; //Displaying session Message
                    unset($_SESSION['update-category']); //Removing Session Message
                }

                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload']; //Displaying session Message
                    unset($_SESSION['upload']); //Removing Session Message
                }

                if(isset($_SESSION['failed-remove'])){
                    echo $_SESSION['failed-remove']; //Displaying session Message
                    unset($_SESSION['failed-remove']); //Removing Session Message
                }

            ?>
            <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary"> Añadir Categoría</a>
            <br/><br/>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Funciones</th>                    
                </tr>
                <?php
                    //preparing query
                    $sql = "SELECT * FROM tbl_category";
                    //Executing query
                    $res = mysqli_query($con, $sql);

                    //Checking query 
                    if($res==TRUE){
                        //Count rows we have in database 
                        $count = mysqli_num_rows($res);

                        //checking the row's number
                        if($count>0){ //we have data in database
                            
                            $sn=1; // Create an variable an assign a value

                            //create an array with the data 
                            while ($rows = mysqli_fetch_assoc($res)){
                                
                                //Using loop for getting the data from array 
                                //get individual data
                                $id=$rows['id'];
                                $title=$rows['title'];
                                $file_name= $rows['image_name'];
                                $feat=$rows['featured'];
                                $act=$rows['active'];//displaying values on the table                                 
                                ?>

                                <tr>
                                    <td><?php echo $sn++;?></td> <!-- Cada vuelta de bucle se incrementa-->
                                    <td><?php echo $title;?></td>
                                    <td>
                                        <?php 
                                            //check the image is avalaible or not 
                                            if($file_name != ""){//display image                                                
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images-videos/category/<?php echo $file_name; ?>" width="100px" >
                                        <?php

                                            }else{
                                                //if the message is not available
                                                echo "<div class='error'>Imagen no añadida. </div> </br>";
                                            }
                                        
                                            //echo $file_name; 
                                        ?>
                                    </td>
                                    <td><?php echo $feat;?></td>
                                    <td><?php echo $act;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id;?>" class="btn-secondary"> Actualizar</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $file_name;?>" class="btn-danger"> Eliminar</a>
                                    </td>
                                </tr>
                                <?php
                            }

                        }else{//we have not data in database
                                ?>
                            <tr>
                                <td colspan="6"> <div class="error"> No category added </div></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                
            </table>
            <!-- EVITAR SUPERPOSICION CON FLOAT --> 
            <div class="clearFix"></div>
        </div>
    </div>

<?php include ('partials/footer.php');?>