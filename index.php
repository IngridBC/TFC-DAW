<?php include('user/partials-front/menu-user.php');?>
    <?php
        if(isset($_SESSION['order'])){
            echo($_SESSION['order']);
            unset($_SESSION['order']);
        }
    ?>
<!-- CAtegories Section Starts Here -->
    <div class="category-section">
        <div class="tittle text-center"><h1>Nuestros Productos</h1></div>
            <div class="contain-cat">

            <?php
                //showing the categories
                //preparing query
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Executing query
                $res = mysqli_query($con, $sql);

                //Checking query 
                if($res==TRUE){
                    //Count rows we have in database 
                    $count = mysqli_num_rows($res);

                    //checking the row's number
                    if($count>0){ //we have data in database

                        //create an array with the data 
                        while ($rows = mysqli_fetch_assoc($res)){
                            
                            //Using loop for getting the data from array 
                            //get individual data
                            $id=$rows['id'];
                            $title=$rows['title'];
                            $file_name= $rows['image_name'];
                            
                            //displaying values on the div
                            ?>
                            <!-- the php file and the url passing for getting the food of a specific category-->
                            <a href="<?php echo SITEURL;?>carta.php?category_id=<?php echo $id;?>">
                                <div class="box-3 float-container">

                                    <?php
                                        //check whether the image is avalaiblle or not 
                                        if($file_name != ""){
                                            //display image 
                                            ?>
                                                <img src="<?php echo SITEURL;?>images-videos/category/<?php echo $file_name;?>" alt="Pizza" class="img-responsive img-curve">
                                            <?php
                                        }else{
                                            //if the message is not available
                                            echo "<div class='error'>Image not avalaible. </div>";
                                        }
                                    ?>
                                    <h3 class="float-text text-center"><?php echo $title;?></h3>
                                </div>
                            </a>
                            <?php
                        }
                    }else{
                        echo "<div class='error'> Category not found </div>";
                    }
                }    
            ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Categories Section Ends Here -->

    <!-- counter section starts  -->
<!--
    <div class="counter-up text-center">
        <div class="content-counter">
            <div class="box-counter">
                <div class="icon-counter"><i class="fa fa-history"></i></div>
                <div class="time-counter" data-target="5"><h4>0</h4></div>
                <div class="text-counter"><h6>Años de Experiencia</h6></div>
            </div>
            <div class="box-counter">
                <div class="icon-counter"><i class="fa fa-gift"></i></div>
                <div class="time-counter" data-target="548"><h4>0  </h4> </div>
                <div class="text-counter"><h6>Pedidos hechos con éxito</h6></div>
            </div>
            <div class="box-counter">
                <div class="icon-counter"><i class="fa fa-user"></i></div>
                <div class="time-counter" data-target="536"><h4>536</h4></div>
                <div class="text-counter"><h6>Clientes satisfechos</h6></div>
            </div>
            <div class="box-counter">
                <div class="icon-counter"><i class="fas fa-utensils"></i></div>
                <div class="time-counter" data-target="30"><h4>30</h4></div>
                <div class="text-counter"><h6>Variedades de Productos.</h6></div>
            </div>
        </div>
    </div>
            -->
    <!-- about us section starts  -->
    <div class="aboutUs-section">
        <div class="tittle text-center"><h1>Sobre nosotros</h1></div>
        <div class="containerUs">
            
            <div class="contentUs">
                <div class="article">
                    <p class="info-us">
                        Bakery Co nació como proyecto creativo de la mano de Natalia Canon. 
                        <br/>
                        Con un lema personal:
                        <br/>
                        <i class="bigger">"A través del horneado se transmite lo que las palabras no pueden"</i>
                    </p>
                    <div class="button">
                        <a href="<?php echo SITEURL;?>nosotros.php">Más sobre nosotros</a>
                    </div>
                </div>
            </div>
            <div class="image-aboutUs">
                <img src="../food-bakery/images-videos/logo.png" alt="">
            </div>
            
        </div>
        <div class="social text-center">
                <a href="https://es-es.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
        </div>  
    </div>
    <!-- about us section ends  -->

    <!-- testimonials section ends  -->
    
    <div class="testimony-section">
        <div class="title-testimony"><h2 class=" text-center">Nuestros clientes nos recomiendan</h2></div>
         <div class="slider owl-carousel">
            <div class="card">
                <p>De los mejores postres que he probado. 
                    <br>Totalmente los recomiendo</p>
                <div class="title-card">Helena Castro</div>
                <div class="sub-title">Cliente</div>
            </div>
            <div class="card">
                <p>Novedades todos los meses. 
                    <br>siempre hay algo nuevo por probar</p>
                <div class="title-card">Pablo Gil</div>
                <div class="sub-title">Cliente</div>
            </div>
            <div class="card">
                <p>Ha sido uno de los mejores sitios en los que he estado.
                    Volveré a ir nuevamente.
                </p>
                <div class="title-card">Cristina fernandéz</div>
                <div class="sub-title">Cliente</div>
            </div>
            <div class="card">
                <p>Me ha gustado el sitio y todo lo que venden.
                    Repetiré de nuevo.
                </p>
                <div class="title-card">Manuel López</div>
                <div class="sub-title">Cliente</div>
            </div>
         </div>       
    </div>    

    <!-- testimonials section ends  -->

    <!-- contact button section ends  -->
    <div class="contact-inf text-center">
        <div class="button">
            <a href="<?php echo SITEURL;?>contacto.php">Conocenos</a>
        </div>
    </div>
    <!-- contact button section ends  

<?php include('user/partials-front/footer-user.php');?>