<?php include ('partials/menu.php'); ?>
    <!-- MAIN CONTENT SECTION STARTS-->
    <div class="main-content">
        <div class="wrapper">
        <!--<label for=""> Main content goes here</label> -->
            <!--<strong>DASHBOARD</strong>  ETIQUETA ENFASIS EN TEXTO-->
            <h1 class="text-center">PANEL DE CONTROL</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login']; //Displaying session Message
                    unset($_SESSION['login']); //Removing Session Message
                }
            ?>
            <br><br>
            <div class="container-data">
                <div class="col-4 text-center">
                    <?php 
                        $sql="SELECT * FROM tbl_category"; //SQL queyry
                        $res=mysqli_query($con,$sql);
                        $count=mysqli_num_rows($res);
                    ?>
                    <br/>
                    <h1><?php echo $count;?></h1>
                    <!--<h3>Categories</h3>-->
                    <h3>Categorías Totales</h3>
                </div>
                <div class="col-4 text-center">
                    <?php 
                        $sql1="SELECT * FROM tbl_food"; //SQL queyry
                        $res1=mysqli_query($con,$sql1);
                        $count1=mysqli_num_rows($res1);
                    ?>
                    <br/>
                    <h1><?php echo $count1;?></h1>                    
                    <!--<h3>Foods</h3>-->
                    <h3>Productos Totales</h3>
                </div>
                <div class="col-4 text-center">
                    <?php 
                        $sql2="SELECT * FROM tbl_order"; //SQL queyry
                        $res2=mysqli_query($con,$sql2);
                        $count2=mysqli_num_rows($res2);
                    ?>
                    <br/>
                    <h1><?php echo $count2;?></h1>
                    <h3>Pedidos Totales</h3>
                    <!--<h3>Total Orders</h3>-->
                </div>
                <div class="col-4 text-center">
                    <?php 
                        $sql3="SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'"; //SQL queyry
                        $res3=mysqli_query($con,$sql3);
                        $row3=mysqli_fetch_assoc($res3);
                        $total_revenue=$row3['Total'];
                    ?>
                    <br/>
                    <h1><?php echo $total_revenue;?>€</h1>
                    <!--<h3>Revenues</h3>-->
                    <h3>Ingresos Totales</h3>
                </div>
            </div>
            <!-- EVITAR SUPERPOSICION CON FLOAT --> 
            <div class="clearFix"></div>
        </div>
    </div>

    <?php include ('partials/footer.php'); ?>