<?php include ('partials/menu.php'); ?>
    <!-- MAIN CONTENT SECTION STARTS-->
    <div class="main-content">
        <div class="wrapper">
            <h1>AÑADIR USUARIO</h1>
            <br/><br/>

            <?php
                if(isset($_SESSION['add'])){//checking the sesion is set or not 
                    echo $_SESSION['add']; //Displaying session Message if set
                    unset($_SESSION['add']); //Removing Session Message
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td> <label> Nombre completo: </label></td>
                        <td> <input type="text" name="full_name" placeholder="Enter your name"> </td>
                    </tr>
                    <tr>
                        <td><label>Usuario:</label></td>
                        <td> <input type="text" name="username" placeholder="Enter your username"> </td>
                    </tr>
                    <tr>
                        <td><label>Contraseña:</label></td>
                        <td> <input type="password" name="password" placeholder="Enter your password"> </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Añadir" class="btn-update"> 
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php include ('partials/footer.php');?>

<?php
    //PROCESS THE VALUE OF THE FORM AND SAVE IT IN DATABASE
    //CHECK WETHER THE SUBMIT BUTTON IS CLICKED OR NOT 

    if (isset($_POST['submit'])){ //BUTTON CLICKED
        //1. Get the data from form 
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encrypted md5

        //2. sql query to save in database 
        $sql="INSERT INTO tbl_admin SET full_name='$full_name', username='$username', password='$password'";
        //echo "$sql";

        //3. Stablish Connection and Save data into database        
        //4. EXECUTING QUERY
        $res = mysqli_query($con, $sql); // or die(mysqli_error())

        //5. checking Query executed and data is inserted or not and displaying the properly message
        if($res==TRUE){
            //echo "data inserted";
            //create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'> Usuario añadido correctamente.</div></br>";
            //Redirect Page
            header("location:".SITEURL.'admin/manage-admin.php');
        }else{
            //echo "Failed to insert data";
            $_SESSION['add'] = "<div class='error'> Error al añadir Usuario. Intentalo más tarde. </div></br>";
            //Redirect Page
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }else{
        //echo "error";//BUTTON NOT CLICKED 
    }
?>