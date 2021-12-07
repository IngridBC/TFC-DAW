<?php include ('partials/menu.php');?>
<?php 

if(isset($_GET['id'])){
    //1. Get the ID of Selected category
    $id=$_GET['id'];

    //2.Create SQL query
    $sql_update = "SELECT * FROM tbl_order WHERE id=$id";

    //Execute Query
    $res_update = mysqli_query($con, $sql_update);

    //check data is avalaible 
    $count_update = mysqli_num_rows($res_update);
    //Check query is executed or not
    
    //check if we have data or not 
    if($count_update==1){

        //Get details
        //echo "category advalaible";
        $row = mysqli_fetch_assoc($res_update);

            //getting the data from the form --> from the associtive array
        $food = $row ['food'];
        $price = $row['price'];
        $qty = $row['qty'];
        $status = $row['status'];
        $customer_name=$row['customer_name'];
        $customer_contact=$row['customer_contact'];
        $customer_email=$row['customer_email'];
        $customer_address=$row['customer_adress'];

    }else{
        //redirect to manage category
        header('location'.SITEURL.'admin/manage-order.php');
    }
    
}else{
    //redirect to manage 
    header('location:'.SITEURL.'admin/manage-order.php');
}
//redirect to manage admin-- > showing properly mesage 
?>

    <div class="main-content">
        <div class="wrapper">
            <h1>ACTUALIZAR PEDIDO</h1>
            </br></br> 
            <form action="" method="POST">
                <table class="tbl-30">      

                    <tr>
                        <td><label>Producto:</label></td>
                        <td><label><b><?php echo $food;?></b></label></td>
                    </tr>
                    <tr>
                        <td><label>Precio:</label></td>
                        <td>€<label><b><?php echo $price;?></b></label></td>
                    </tr>
                    <tr>
                        <td><label>Cantidad:</label></td>
                        <td><input type="number" name="qty" value="<?php echo $qty;?>"></td>
                    </tr>
                    <tr>
                        <td><label>Estatus</label></td>
                        <td>
                            <select name="status" id="status">
                                <option <?php if($status=="Ordered"){echo "selected";}?> value="Ordered">Pedido</option>
                                <option <?php if($status=="On-Delivery"){echo "selected";}?> value="On-Delivery">En preparacion</option>
                                <option <?php if($status=="Delivered"){echo "selected";}?> value="Delivered">Entregado</option>
                                <option <?php if($status=="Cancelled"){echo "selected";}?> value="Cancelled">Cancelado</option>
                            </select>
                        </td>
                    </tr>                    
                    <tr>
                        <td><label>Nombre cliente: </label></td>
                        <td><input type="text" name="customer_name" value="<?php echo $customer_name;?>"></td>
                    </tr>
                    <tr>
                        <td><label>Contacto cliente: </label></td>
                        <td><input type="text" name="customer_contact" value="<?php echo $customer_contact;?>"></td>
                    </tr>
                    <tr>
                        <td><label>Email cliente: </label></td>
                        <td><input type="text" name="customer_email" value="<?php echo $customer_email;?>"></td>
                    </tr>
                    <tr>
                        <td><label>Dirección cliente: </label></td>
                        <td><textarea name="customer_address" id="customer_address" cols="30" rows="5"><?php echo $customer_address;?></textarea></td>
                    </tr>
                    <tr >
                        <td clospan="2">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="hidden" name="price" value="<?php echo $price;?>">
                            <input type="submit" name="submit" value="Modificar" class="btn-secondary">
                        </td>

                    </tr>
                </table>
            </form>

            <?php                
                if(isset($_POST['submit'])){
                    
                    $id=$_POST['id'];
                    $price=$_POST['price'];
                    $qty=$_POST['qty'];
                    $total= ($price*$qty);
                    $status=$_POST['status'];
                    $customer_name=$_POST['customer_name'];
                    $customer_contact=$_POST['customer_contact'];
                    $customer_email=$_POST['customer_email'];
                    $customer_location=$_POST['customer_address'];
                    
                    //echo $status;//die();
                    //2.Create SQL query
                    $sql_change2="UPDATE tbl_order SET qty=$qty, total=$total, status='$status', customer_name='$customer_name', 
                    customer_contact='$customer_contact', customer_email='$customer_email', customer_adress='$customer_location' 
                    WHERE id=$id ";
                    //print_r($sql_change2);
                    //die();
                    //Execute Query
                    $res_change2=mysqli_query($con,$sql_change2);
                    
                    if($res_change2==true){
                        //Get details
                        $_SESSION['update-order']="<div class='success'> Pedido actualizado. </div> <br/>";
                       header('location:'.SITEURL.'admin/manage-order.php');
                       
                       //exit();
                    }else{
                        $_SESSION['update-order']="<div class='error'> Error al actualizar pedido. </div> <br/>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                }                
            ?>
           </div>   
       </div>
<?php include ('partials/footer.php');?>