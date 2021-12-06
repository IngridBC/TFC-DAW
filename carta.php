<?php include('user/partials-front/menu-user.php');?>
    
<!-- fOOD sEARCH Section Starts Here -->
    <section class="">
        
    </section>
    <section class="food-search text-center">
        <div><h1 class="text-center"> Nuestros productos</h1></div>
        <div class="container-search">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
        <div class="container-food">
            <?php
                //showing the food per categories with a limit of 6 
                //preparing query
                $sql_food = "SELECT * FROM tbl_food WHERE active='Yes' ";
                //Executing query
                $res_food = mysqli_query($con, $sql_food);

                //Checking query 
                if($res_food==TRUE){
                    //Count rows we have in database 
                    $count2 = mysqli_num_rows($res_food);

                    //checking the row's number
                    if($count2>0){ //we have data in database

                        //create an array with the data 
                        while ($rows2 = mysqli_fetch_assoc($res_food)){
                            
                            //Using loop for getting the data from array 
                            //get individual data
                            $id=$rows2['id'];
                            $title=$rows2['title'];
                            $price=$rows2['price'];
                            $description=$rows2['description'];
                            $file_name= $rows2['image_name'];
                            
                            //displaying values on the div
                            ?>
                                <div class="food-menu-box">
                                    <div class="food-menu-img">
                                    <?php
                                        //check whether the image is avalaible or not --> food table
                                        if($file_name != ""){
                                            //display image 
                                            ?>
                                            <img src="<?php echo SITEURL;?>images-videos/food/<?php echo $file_name;?>"  class="img-responsive img-curve">
                                            <?php
                                        }else{
                                        //if the message is not available
                                            echo "<div class='error'>Image not avalaible. </div>";
                                        }
                                    ?> 
                                    </div>

                                    <div class="food-menu-desc">
                                        <h4><?php echo $title;?></h4>
                                        <p class="food-price"><?php echo $price;?>€</p>
                                        <p class="food-detail"><?php echo $description;?></p>

                                        <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="button-order">Order Now</a>
                                    </div>
                                </div>
                            <?php
                        }
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