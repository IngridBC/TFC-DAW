<?php include('user/partials-front/menu-user.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container-search">
            <?php
                // Get the search keyword
                $food_search = $_POST['search'];

                //print_r($food_search); //checking array
                //die();
            ?>
            <!-- The tittle will be the food searched --> 
            <h2>Búsqueda productos "<a href="#" class="text-search"><?php echo $food_search;?></a>"</h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container-food">
            
            <?php
                //SQL Query to get foods based on search keyword 
                $sql_buscar= "SELECT * FROM tbl_food WHERE title LIKE '%$food_search%' OR description LIKE '%$food_search%'";

                //Searching on database
                $res_consulta=mysqli_query($con, $sql_buscar);

                //count rows on database
                $count= mysqli_num_rows($res_consulta);

                if($count>0){

                    //food avalaible 
                    while($rows_food=mysqli_fetch_assoc($res_consulta)){
                        
                        //Get details  //get individual data
                        $id=$rows_food['id'];
                        $title=$rows_food['title'];
                        $price=$rows_food['price'];
                        $description=$rows_food['description'];
                        $file_name= $rows_food['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                    //check whether the image is avalaiblle or not 
                                        if($file_name != ""){
                                            //display image 
                                            ?>
                                                <img src="<?php echo SITEURL;?>images-videos/food/<?php echo $file_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                            <?php
                                        }else{
                                                //if the message is not available
                                                echo "<div class='error'>Image not avalaible. </div>";
                                        }
                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price"><?php echo $price;?></p>
                                    <p class="food-detail"><?php echo $description;?></p>
                                    <br/>

                                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="button-order">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                }else{
                    echo "<div class='error'> Food not found </div>";
                }
            ?>
            <div class="clearfix"></div>            
        </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('user/partials-front/footer-user.php');?>