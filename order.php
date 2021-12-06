<?php include('user/partials-front/menu-user.php');?>
<?php 
    //get the id if the food is set or not 
    if(isset($_GET['food_id'])){
        $food_id=$_GET['food_id'];

        $sql_order = "SELECT * FROM tbl_food WHERE id=$food_id";
                
        //Executing query
        $res_order = mysqli_query($con, $sql_order);

            //count the rows 
        $count_order = mysqli_num_rows($res_order);

            //check data is avalaible 
        if($count_order==1){
             //data available
            $row_order=mysqli_fetch_assoc($res_order);

            //Get data 
            $title = $row_order['title'];
            $price = $row_order['price'];
            $file_name = $row_order['image_name'];
        }else{
            //food not avalaible
             header('location:'.SITEURL);
        }
    
    }else{
        //redirect home page
        header('location:'.SITEURL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->

    
    <section class="food-search">
        <div class="container-order">
                <h1 class="text-center title-order">Rellene el formulario para tramitar el pedido.</h1>
            <form action="" method="POST" class="order">
                <div class="product-sel">
                    <fieldset>
                        <legend class="text-center">Producto Seleccionado</legend>
                        <div class="order-main">
                            <div class="food-menu-img">
                                <?php
                                    if($file_name != ""){
                                    //display image= image is avalaible
                                ?>
                                    <img src="<?php echo SITEURL;?>images-videos/food/<?php echo $file_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                                    }else{
                                    //if the message is not available
                                        echo "<div class='error'>Image not avalaible. </div>";
                                    }
                                ?>
                            </div>
                        
                            <!-- Value hidden for submitting after with the button submit-->
                            <div class="food-menu-desc">
                                <h3><?php echo $title;?></h3>
                                <input type="hidden" name="food" value="<?php echo $title;?>">
                                <p class="food-price"><?php echo $price;?></p>
                                <input type="hidden" name="price" value="<?php echo $price;?>">

                                <div class="order-label">Cantidad</div>
                                <input type="number" name="qty" class="input-responsive" value="1" required>
                            </div>
                        </div>            
                    </fieldset>
                </div>
                <div class="details-order">
                    <fieldset>
                        <legend class="text-center">Detalles Pedido</legend>
                        <div class="orden-det">
                            <div class="order-label">Nombre Completo</div>
                            <input type="text" name="full-name" placeholder="E.j. Usuario xxxx xxx" class="input-responsive" required>

                            <div class="order-label">Número télefono</div>
                            <input type="tel" name="contact" placeholder="E.j. 9843xxxxxx" class="input-responsive" required>

                            <div class="order-label">Email</div>
                            <input type="email" name="email" placeholder="E.j. usuario@gmail.com" class="input-responsive" required>

                            <div class="order-label">Dirección</div>
                            <textarea name="address" col="5" rows="5" placeholder="E.j. Calle, Ciudad, Código Postal" class="input-responsive" required></textarea>
                        </div>
                        <div class="but-or">
                            <input type="submit" name="submit" value="Confirmar pedido" class=" text-center button-order">
                        </div>
                    </fieldset>
                    <br>
                </div>
            </form>
            <?php
                if(isset($_POST['submit'])){
                    //get the data from the inputs
                    $order_food= $_POST['food'];
                    $order_price= $_POST['price'];
                    $order_qty= $_POST['qty'];
                    
                    $total_price=($order_price*$order_qty);
                    $order_date= date("Y-m-d h:i:sa");// order date

                    //echo $order_date;
                    //die ();
                    $status= "Ordered"; // Ordered, On Delivery, Delivered, Cancelled
                    $customer_name=$_POST['full-name'];
                    $customer_contact=$_POST['contact'];
                    $customer_email=$_POST['email'];
                    $customer_adress=$_POST['address'];

                    //create query and save it
                    $sql_insert= "INSERT INTO tbl_order SET food='$order_food', price=$price, qty=$order_qty, total=$total_price, 
                    order_date='$order_date', status='$status', customer_name='$customer_name', customer_contact='$customer_contact', 
                    customer_email='$customer_email', customer_adress='$customer_adress'";

                    //echo $sql_insert; 
                    //die();
                    //execute query
                    $res_insert= mysqli_query($con,$sql_insert);

                    //check if the query is executed succesfully
                    if($res_insert==true){
                        $_SESSION['order']="<div class='success text-center'> Food ordered succesfully. </div>";
                        header('location:'.SITEURL);
                    }else{
                        $_SESSION['order']="<div class='error text-center'> Food ordered succesfully. </div>";
                        header('location:'.SITEURL);
                    }  
                }
?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php include('user/partials-front/footer-user.php');?>