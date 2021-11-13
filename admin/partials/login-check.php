<?php
    //autorization -acess control
    //Check when the user is logged or not 
    if (!isset($_SESSION['user'])){

        //user is not logged in 
        //redirect to login page with message 
        $_SESSION['no-login-message']= "<div class='error text-center'> Inicie sesión para acceder al panel Admin. </div> <br>";
            //Redirect user to home page Dashboard
        header('location:'.SITEURL.'admin/login.php');          
    }
?>