<?php include ('partials/menu.php');?>
<!-- MAIN CONTENT SECTION STARTS-->
<div class="main-content">
    <div class="wrapper">
        <h1>GESTIÓN PRODUCTOS</h1>            
        <br/> <br/>

        <?php
            if(isset($_SESSION['add-food'])){//checking the food is set or not 
                echo $_SESSION['add-food']; //Displaying food Message if set
                unset($_SESSION['add-food']); //Removing food Message
            }

            if(isset($_SESSION['delete-food'])){
                echo $_SESSION['delete-food']; 
                unset($_SESSION['delete-food']); 
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload']; 
                unset($_SESSION['upload']); 
            }

            if(isset($_SESSION['failed-remove'])){
                echo $_SESSION['failed-remove']; 
                unset($_SESSION['failed-remove']); 
            }

            if(isset($_SESSION['not-authorized'])){
                echo $_SESSION['not-authorized']; 
                unset($_SESSION['not-authorized']); 
            }

            if(isset($_SESSION['update-food'])){
                echo $_SESSION['update-food']; //Displaying session Message
                unset($_SESSION['update-food']); //Removing Session Message
            }
        ?>
        <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary"> Añadir productos</a>
        <br/> <br/>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Título</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Funciones</th>        
            </tr>
                
            <?php
                //preparing query
                $sql_food = "SELECT * FROM tbl_food";
                //Executing query
                $res_food = mysqli_query($con, $sql_food);

                //Checking query 
                if($res_food==TRUE){
                //Count rows we have in database 
                    $count = mysqli_num_rows($res_food);

                    //checking the row's number
                    if($count>0){ //we have data in database                            
                        $sn=1; // Create an variable an assign a value
                        //create an array with the data 
                        while ($rows = mysqli_fetch_assoc($res_food)){
                            //Using loop for getting the data from array 
                            //get individual data
                            $id=$rows['id'];
                            $title=$rows['title'];
                            $price=$rows['price'];
                            $file_name= $rows['image_name'];
                            $feat=$rows['featured'];
                            $act=$rows['active'];
                        ?>
                <tr>
                    <td><?php echo $sn++;?></td> <!-- Cada vuelta de bucle se incrementa-->
                    <td><?php echo $title;?></td>
                    <td>€<?php echo $price;?></td>
                    <td>
                        <?php //check the image is avalaible or not 
                            if($file_name != ""){//display image 
                        ?>
                        <img src="<?php echo SITEURL;?>images/food/<?php echo $file_name;?>" width="100px" >
                        <?php
                            }else{//if the message is not available
                                echo "<div class='error'>Imagen no añadida. </div>";
                            }  //echo $file_name; 
                        ?>
                    </td>                                    
                    <td><?php echo $feat;?></td>
                    <td><?php echo $act;?></td>
                    <td>
                        <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>" class="btn-secondary"> Actualizar</a>
                        <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $file_name;?>" class="btn-danger"> Eliminar</a>
                    </td>
                </tr>
                <?php
                }
                }else{//we have not data in database
                ?>
                <tr>
                    <td colspan="7"> <div class="error"> Producto no añadido </div></td>
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