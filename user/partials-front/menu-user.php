<?php include('config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"> </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->
    <style>
        <?php include 'css/user.css';?> 
    </style>
    
    <title>Menu-user</title>
</head>
<body>
    <header class="header">
        <a href="<?php echo SITEURL;?>" class="brand">Bakery Co</a>
        <div class="menu-btn" style="background-image: url(<?php echo SITEURL;?>images-videos/lista.png);"></div>
        <div class="navigation">
            <div class="navigation-items">
                <a href="<?php echo SITEURL;?>">Inicio</a>
                <a href="<?php echo SITEURL;?>nosotros.php">Sobre nosotros</a>
                <a href="<?php echo SITEURL;?>carta.php">Carta</a>
                <a href="<?php echo SITEURL;?>contacto.php">Contacto</a>
            </div>
        </div>
    </header>
    <section class="home">
        <video class="video-slide active" src="<?php echo SITEURL;?>images-videos/pxl.mp4" autoplay muted loop></video>
        <video class="video-slide" src="<?php echo SITEURL;?>images-videos/pr1.mp4" autoplay muted loop></video>
        <video class="video-slide" src="<?php echo SITEURL;?>images-videos/pr2.mp4" autoplay muted loop></video>
        <video class="video-slide" src="<?php echo SITEURL;?>images-videos/pr3.mp4" autoplay muted loop></video>
        <video class="video-slide" src="<?php echo SITEURL;?>images-videos/pr4.mp4" autoplay muted loop></video>

        <div class="content active">
            <h1>PANADERÍA <br><span>PASTELERÍA</span></h1> 
            <p>En Bakery Co nuestra principal misión es crear productos de gran calidad.<br/>
                Mantener un servicio al cliente con gran esmero.<br/>
                Y por supuesto estar comprometidos con nuestra comunidad.                
            </p>
            <a href="<?php echo SITEURL;?>nosotros.php">Leer más</a>
        </div>
        <div class="content">
            <h1>PRODUCTOS <br><span>ARTESANOS</span></h1> 
            <p>Ofrecemos productos tradicionales con las mejores materias primas.<br/>
                Cuidamos desde el origen hasta el destino final de nuestros productos<br/>
                Garantizamos la calidad y el cuidado medioambiental de este.                
            </p>
            <a href="<?php echo SITEURL;?>carta.php">Leer más</a>
        </div>
        <div class="content">
            <h1>COMPROMISO <br><span>SOCIAL</span></h1> 
            <p>Comprometidos con la comunidad brindamos la oportunidad de unir a través del paladar<br/>
                Crear productos para degustar en compañía<br/>
                Creemos firmemente en un futuro junto a nuestros consumidores.                
            </p>
            <a href="">Leer más</a>
        </div>
        <div class="content">
            <h1>TALENTO <br><span>INNOVADOR</span></h1> 
            <p>En Bakery Co creemos que el talento se construye con el esfuerzo.<br/>
                Nuestros empleados se esmeran arduamente y dan lo mejor de cada uno <br/>
                Transmitimos este talento en la elaboración de nuestros productos.                 
            </p>
            <a href="">Leer más</a>
        </div>
        <div class="content">
            <h1>PRODUCTOS <br><span>PERSONALIZADOS</span></h1> 
            <p>Damos la oportunidad a nuestros clientes de conocernos a través de sus gustos<br/>
                Proponemos la oportunidad de personalizar nuestros productos acorde peticiones<br/>
                Y por supuesto estamos abiertos a incluir estas peticiones en nuestra carta.                
            </p>
            <a href="<?php echo SITEURL;?>order.php">Leer más</a>
        </div>

        <div class="media-icons">
            <a href="https://es-es.facebook.com/"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
        </div>
        <div class="slider-navigation">
            <div class="nav-btn active"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
        </div>
    </section>