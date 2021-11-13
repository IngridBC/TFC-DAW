<?php include('../config/constants.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>LOGIN- BAKERY SYSTEM</title>
</head>
<body>
    <div class="login-container">
        <div class="login">       
                <?php
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login']; //Displaying session Message
                        unset($_SESSION['login']); //Removing Session Message
                    }
                    if(isset($_SESSION['no-login-message'])){
                        echo $_SESSION['no-login-message']; //Displaying session Message
                        unset($_SESSION['no-login-message']); //Removing Session Message
                    }
                ?>
            <div class="space-login">
                <div class="login-icon"> <img src="../images/user.png" alt=""></div>
                <div class="title-login"><h1 class="title-sect text-center">ACCESO </h1><h3 class="title-sect text-center">Bakery Co</h3></div>
                
                <!-- Login form starts here--> 
                <form action="" method="POST" class="text-center">                    
                    <input class="input-info" type="text" name="username" placeholder="Usuario">                    
                    <input class="input-info" type="password" name="password" placeholder="Contraseña">
                    <input class="button-login" type="submit" name="submit" value="Login" class="btn-signUp">
                    <br>
                </form>
                <!-- Login form ends here--> 
                <div class="label-login text-center"> <label> Bakery Co.&#169 Property </label></div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        //1. GEt the data from the form 

        //$username = $_POST['username'];
        //$password = md5($_POST['password']);
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $raw_password=md5($_POST['password']);
        $password=mysqli_real_escape_string($con, $raw_password);

        //2. SQL check the user and password exist 
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. EXECUTE QUERY 
        $res = mysqli_query($con,$sql);

        //4. Counts rows to check if the user exists 
        $count = mysqli_num_rows($res);

        if($count==1){
            //user avalaible 
            //Login with the user and password 
            $_SESSION['login']= "<div class='success'>Acceso permitido.</div><br/>";
            $_SESSION['user']= $username;// to ckeck when the user is logged and not and she logout
            //Redirect user to home page Dashboard
            header('location:'.SITEURL.'admin/');
        }else{
            //User not avalaible  
            //Login with the user and password 
            $_SESSION['login']= "<label class='error text-center'> Usuario/Contraseña no coinciden. </label>";
            //Redirect user to home page Dashboard
            header('location:'.SITEURL.'admin/login.php');  
        }
    }
?>