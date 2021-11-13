<?php include ('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Actualizar Perfil</h1>

            </br>
            <?php 
            //1. Get the ID of Selected Admin
                $id=$_GET['id'];

            //2.Create SQL query
                $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            //Execute Query
                $res = mysqli_query($con, $sql);

            //Check query is executed or not
                if($res == true){
                    //check data is avalaible 
                    $count = mysqli_num_rows($res);
                    
                    //check if we have data or not 
                    if($count==1){
                        //Get details//echo "admin advalaible";
                        $row = mysqli_fetch_assoc($res);

                        //getting the data from the form 
                        $full_name = $row ['full_name'];
                        $username = $row['username'];

                    }else{
                        //redirect to manage admin
                        header('location'.SITEURL.'admin/manage-admin.php');
                    }
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td><label> Nombre:</label></td>
                        <td><input type="text" name="full_name" value="<?php echo $full_name;?>"></td>
                    </tr>
                    <tr>
                        <td><label>Usuario:</label></td>
                        <td><input type="text" name="username" value="<?php echo $username;?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Actualizar" class="btn-update">
                        </td> 
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php 
    if(isset($_POST['submit'])){

        //echo "Button clicked";
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        
        //create SQL Query to Update Admin
        $sql2 = "UPDATE tbl_admin SET full_name='$full_name', username='$username' WHERE id='$id'";

        //execute the query 
        $res2=mysqli_query($con,$sql2);
        // check the query is executed 

        if ($res2==true){
            //query successfully deleted admin
            //echo "Admin deleted";
            $_SESSION['update']= "<div class='success'> Perfil actualizado</div> </br>";
            header('location:'.SITEURL.'admin/manage-admin.php');

        }else{

            //failed deleted admin
            $_SESSION['update']= "<div class='error'> Error al actualizar perfil. </div> </br>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }//redirect to manage admin-- > showing properly mesage 
?>

<?php include ('partials/footer.php'); ?>