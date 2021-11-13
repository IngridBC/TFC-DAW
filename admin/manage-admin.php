<?php include ('partials/menu.php'); ?>
    <!-- MAIN CONTENT SECTION STARTS-->
    <div class="main-content">
        <div class="wrapper">
        
            <h1>GESTIÓN PERFIL</h1>
            <br/><br/>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add']; //Displaying session Message
                    unset($_SESSION['add']); //Removing Session Message
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete']; //Displaying session Message
                    unset($_SESSION['delete']); //Removing Session Message
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update']; //Displaying session Message
                    unset($_SESSION['update']); //Removing Session Message
                }

                if(isset($_SESSION['user-not-found'])){
                    echo $_SESSION['user-not-found']; //Displaying session Message
                    unset($_SESSION['user-not-found']); //Removing Session Message
                }

                if(isset($_SESSION['pwd-not-match'])){
                    echo $_SESSION['pwd-not-match']; //Displaying session Message
                    unset($_SESSION['pwd-not-match']); //Removing Session Message
                }

                if(isset($_SESSION['changed-pwd'])){
                    echo $_SESSION['changed-pwd']; //Displaying session Message
                    unset($_SESSION['changed-pwd']); //Removing Session Message
                }
            ?>

            <div><a href="add-admin.php" class="btn-primary"> Añadir Usuario</a></div>
            <br/><br/>
            <table class="tbl-full">
                <tr>
                    <th>N.</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Funciones</th>
                </tr>
                
                <!-- DISPLAYING THE ADMIN ON THE DATABASE-->
                <?php 
                    //preparing query
                    $sql = "SELECT * FROM tbl_admin";
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
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //displaying values on the table 
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td> <!-- Cada vuelta de bucle se incrementa-->
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-update">Cambiar contraseña</a>
                                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary"> Actualizar</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger"> Eliminar</a>
                                    </td>
                                </tr>
                                <?php
                            }

                        }else{//we have not data in database
                            ?>
                            <tr>
                                <td colspan="3"> <div class="error"> Administrador no añadido </div></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </table>
            
            <!-- EVITAR SUPERPOSICION CON FLOAT  
            <div class="clearFix"></div> -->
        </div>
    </div>

<?php include ('partials/footer.php');?>