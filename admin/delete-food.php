<?php
    //including constan files
    include('../config/constants.php');

    //echo "delete food";
    // check if the id and the image_name is set or not

    if(isset($_GET['id']) AND  isset($_GET['image_name'])){
        //get the value and delete 
        //echo "Get the value and delete";
        $id=$_GET['id'];
        $file_name=$_GET['image_name'];

        //remove physical image file avalaible 
        if($file_name != ""){

            //Image avalaible --> Remove it 
            $path="../images-videos/food/".$file_name;

            //Remove the image 
            $remove=unlink($path);

            //if failed to remove image then add an error message and stop the process
            
            if($remove==false){
                //set the session message 
                $_SESSION['remove-file']= "<div class='error'> Failed to remove food image </div></br>";
                //redirect to manage category-page
                header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process
                die();
            }
            
        }
        //delete data from database

        //2. Create SQL Query to Delete Admin 
        $sql_food="DELETE FROM tbl_food WHERE id=$id";

        //3. EXecute query 
        $res_food = mysqli_query($con, $sql_food);

        // check the query is executed 
        if ($res_food==true){
            //query successfully deleted category
            //echo "Category deleted";
            $_SESSION['delete-food']= "<div class='success'> Producto Eliminado</div><br/>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }else{

            //failed deleted category
            $_SESSION['delete-food']= "<div class='error'> Error al eliminar producto. Intentelo más tarde. </div><br/>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }//redirect to manage admin-- > showing properly mesage 

    }else{
        //redirect to manage category page
        $_SESSION['not-authorized']= "<div class='error'> Acceso no autorizado </div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>