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
    <div class="login">
        <h1 class="text-center">LOGIN</h1>
            <br/><br/>

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
            <!-- Login form starts here--> 
            <form action="" method="POST" class="text-center">
                <label for="">Username:</label> <br>
                <input type="text" name="username" placeholder="Enter username"><br><br>
                <label for="">Password:</label><br>
                <input type="password" name="password" placeholder="Enter password"><br><br>
                <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
                <br>
            </form>
            <!-- Login form ends here--> 
        <p class="text-center"> Created by - <a href="#">INGRID BUITRAGO</a></p>
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
            $_SESSION['login']= "<div class='success'> Login Succesful.</div><br>";
            $_SESSION['user']= $username;// to ckeck when the user is logged and not and she logout
            //Redirect user to home page Dashboard
            header('location:'.SITEURL.'admin/');
        }else{
            //User not avalaible  
            //Login with the user and password 
            $_SESSION['login']= "<div class='error text-center'> Username or Password do not match. </div> <br>";
            //Redirect user to home page Dashboard
            header('location:'.SITEURL.'admin/login.php');  
        }
    }
?>