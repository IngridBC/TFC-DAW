<?php include ('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Cambiar Contraseña</h1>
            </br>
            <?php
                if(isset($_GET['id'])){
                    //1. Get the ID of Selected Admin
                    $id=$_GET['id'];
                }
            ?>
            <form action="" method="POST">

                <table class="tbl-30">
                <tr>
                    <td>New password:</td>
                    <td><input type="password" name="new_password" placeholder="New password"></td>
                </tr>
                <tr>
                    <td>Confirm password:</td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Cambiar contraseña" class="btn-secondary">
                    </td> 
                </tr>
                </table>
            </form>
        </div>
    </div>

<?php
    if(isset($_POST['submit'])){
        
        //1. Getting data from the form 
        //echo "Button clicked";
        $id = $_POST['id'];
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //2. Checking if the user with the ID and current password exists or not
        $sql = " SELECT * FROM tbl_admin WHERE id=$id ";//AND password='$current_password'";

        //3. EXecute query 
        $res = mysqli_query($con, $sql);
        
        // check the query is executed 
        if ($res==true){

            //checking the data is avalaible
            $count=mysqli_num_rows($res);

            if($count==1){  
                //USER EXISTS AND PASSWORD CAN BE CHANGED
               //echo "User Found";

                //Check the new password and confirm password match
                if($new_password==$confirm_password){
                    //update password 
                    //echo "password match";
                    $sql2 = "UPDATE tbl_admin SET password ='$new_password' WHERE id='$id'";

                     //EXecute query 
                    $res2 = mysqli_query($con, $sql2);

                     // check the query is executed or not
                    if($res2==true){
                        //Display correct message 
                        $_SESSION['changed-pwd']= "<div class='success'> Contraseña cambiada </div>";
                        //Redirect user to admin page 
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }else{
                        //Display error message
                        $_SESSION['changed-pwd']= "<div class='error'> Error al cambiar contraseña </div>";
                        //Redirect user to admin page 
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }

                }else{
                    //create new session. SET MESSAGE AND REDIRECT TO ADMIN PAGE
                    $_SESSION['pwd-not-match']= "<div class='error'> No coinciden las contraseñas </div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }else{

            //USER DOESN'T EXIST AND PASSWORD CAN BE CHANGED. SET MESSAGE AND REDIRECT TO ADMIN PAGE
                $_SESSION['user-not-found']= "<div class='error'> Usuario no disponible </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
            //query successfully deleted admin
            //echo "Admin deleted";
        }
        //redirect to manage admin-- > showing properly mesage 
    }        
?>  
<?php include ('partials/footer.php'); ?>

