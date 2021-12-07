<?php include ('partials/menu.php');?>
<!-- MAIN CONTENT SECTION STARTS-->
<div class="main-content">
        <div class="wrapper">
            <h1>GESTIÓN PEDIDO</h1>
            <br/></br/>

            <?php 
                if(isset($_SESSION['update-order'])){
                    echo $_SESSION['update-order']; //Displaying session Message
                    unset($_SESSION['update-order']); //Removing Session Message
                }
            ?>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Fecha pedido</th>
                    <th>Estado</th>
                    <th>Nombre del cliente</th>
                    <th>Contacto</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Funciones</th>
                </tr>

                <?php
                    //preparing query
                    $sql_order = "SELECT * FROM tbl_order ORDER BY id DESC";
                    //Executing query
                    $res_order = mysqli_query($con, $sql_order);

                    //Checking query 
                    if($res_order==TRUE){
                        //Count rows we have in database 
                        $count_orders = mysqli_num_rows($res_order);

                        //checking the row's number
                        if($count_orders>0){ //we have data in database
                            
                            $sn=1; // Create an variable an assign a value

                            //create an array with the data 
                            while ($rows = mysqli_fetch_assoc($res_order)){
                                
                                //Using loop for getting the data from array 
                                //get individual data
                                $id=$rows['id'];
                                $food_name=$rows['food'];
                                $food_price= $rows['price'];
                                $food_qty=$rows['qty'];
                                $food_totalPrice=$rows['total'];
                                $food_date=$rows['order_date'];
                                $food_status=$rows['status'];
                                $customer_name=$rows['customer_name'];
                                $customer_contact=$rows['customer_contact'];
                                $customer_email=$rows['customer_email'];
                                $customer_addres=$rows['customer_adress'];//displaying values on the table 
                ?>
                                <tr>
                                    <td><?php echo $sn++;?></td> <!-- Cada vuelta de bucle se incrementa-->
                                    <td><?php echo $food_name;?></td>
                                    <td><?php echo $food_price;?></td>
                                    <td><?php echo $food_qty;?></td>
                                    <td><?php echo $food_totalPrice;?></td>
                                    <td><?php echo $food_date;?></td>

                                    <td>
                                        <?php //known if the order is Ordered, On delivery
                                            if($food_status=="Ordered"){
                                                echo "<label> $food_status</label>";    
                                            }elseif($food_status=="On-Delivery"){
                                                echo "<label style='color:orange;'>$food_status</label>";
                                            }elseif($food_status=="Delivered"){
                                                echo "<label style='color:green;'>$food_status</label>";
                                            }elseif($food_status=="Cancelled"){
                                                echo "<label style='color:red;'>$food_status</label>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $customer_name;?></td>
                                    <td><?php echo $customer_contact;?></td>
                                    <td><?php echo $customer_email;?></td>
                                    <td><?php echo $customer_addres;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id;?>" class="btn-secondary">Modificar</a>                                        
                                    </td>
                                </tr>                                
                                <?php
                            }
                        }else{//we have not data in database
                            ?>
                            <tr>
                                <td colspan="12"> <div class="error">  </div></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </table>
            <!-- EVITAR SUPERPOSICION CON FLOAT --> 
            <div class="clearFix"></div>
        </div>
    </div>
<?php include ('partials/footer.php');?>