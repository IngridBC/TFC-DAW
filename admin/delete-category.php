<?php
    //including constan files
    include('../config/constants.php');

    //echo "delete";
    // check if the id and the image_name is set or not

    if(isset($_GET['id']) AND  isset($_GET['image_name'])){
        //get the value and delete 
        //echo "Get the value and delete";
        $id=$_GET['id'];
        $file_name=$_GET['image_name'];

        //remove physical image file avalaible 
        if($file_name != ""){

            //Image avalaible --> Remove it 
            $path="../images-videos/category/".$file_name;

            //Remove the image 
            $remove=unlink($path);

            //if failed to remove image then add an error message and stop the process
            
            if($remove==false){
                //set the session message 
                $_SESSION['remove-file']= "<div class='error'> Error al eliminar imagen de categoría </div></br>";
                //redirect to manage category-page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();

            }            
        }
        //delete data from database
        //2. Create SQL Query to Delete Admin 
        $sql="DELETE FROM tbl_category WHERE id=$id";

        //3. EXecute query 
        $res = mysqli_query($con, $sql);

        // check the query is executed 
        if ($res==true){
            //query successfully deleted category
            //echo "Category deleted";
            $_SESSION['delete-category']= "<div class='success'> Categoría eliminada. </div><br/>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }else{

            //failed deleted category
            $_SESSION['delete-category']= "<div class='error'> Error al eliminar la categoría. </div><br/>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        //redirect to manage admin-- > showing properly mesage 

    }else{
        //redirect to manage category page
        //$_SESSION['delete']= "<div class='success'> Admin deleted successuly</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>