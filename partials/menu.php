<?php 
    include('../config/constants.php'); 
    include('login-check.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakery Website - Home Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>  
    
    <!-- MENU SECTION START-->
    <div class="menu text-center"> 
        <!-- SE AÑADE LA SEGUNDA CLASE PARA AÑADIR LOS ESTILOS-->
        <div class="wrapper">
           <!-- <label for=""> Menu goes here</label> -->
            <ul class="menuOption">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Categorías</a></li>
                <li><a href="manage-food.php">Productos</a></li>
                <li><a href="manage-order.php">Pedidos</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div> 

