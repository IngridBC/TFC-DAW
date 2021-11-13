<?php
    //Including constants.php file 
    include ('../config/constants.php');

    //1. Get the admin ID for deleting 
    $id= $_GET['id'];

    //2. Create SQL Query to Delete Admin 
    $sql="DELETE FROM tbl_admin WHERE id=$id";

    //3. EXecute query 
    $res = mysqli_query($con, $sql);

    // check the query is executed 
    if ($res==true){
        //query successfully deleted admin
        //echo "Admin deleted";
        $_SESSION['delete']= "<div class='success'> Usuario eliminado.</div></br>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }else{
        //failed deleted admin
        $_SESSION['delete']= "<div class='error'> Error. No pudo eliminar usuario. </div></br>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }//redirect to manage admin-- > showing properly mesage 
?>