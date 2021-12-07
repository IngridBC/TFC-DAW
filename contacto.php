<?php include('user/partials-front/menu-user.php');?>

<div class="contact-section">
    <div class="brand text-center">
        <h2>¡Más cerca de ti de lo que te imaginas!</h2>
        <p>Para disfrutar de un agradable momento y crear un inolvidable recuerdo. <br>
            Estamos en la calle Mayor *, Alcorcón.
        </p>
    </div>
    <div class="format-contact">
        <div class="form-inf">
            <form action=""  method="POST">
                <div class="bigger info-contact"><label  for="">Nombre</label></div>
                <input type="text" name="name" placeholder="Nombre" required>
                <div><label class="bigger info-contact" for="">Email</label></div>
                <input type="text" name="email" placeholder="usuario@gmail.com" required>
                <div><label class="bigger info-contact" for="">Comentario</label></div>
                <textarea name="message"  placeholder="Mensaje" id="" cols="5" rows="8"></textarea>
                <input type="submit" name="submit" value="Enviar mensaje" class="button-contact">
            </form>
        </div>
        <div class="map-space">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3040.8937620574393!2d-3.829808285002785!3d40.34470266794158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd418eb44fa0424f%3A0xe3f31389b141e12b!2sC.%20Mayor%2C%20Alcorc%C3%B3n%2C%20Madrid!5e0!3m2!1ses!2ses!4v1638573795876!5m2!1ses!2ses" 
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <div class="social text-center">
        <a href="https://es-es.facebook.com/"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
        <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
    </div>
</div>

<?php

    if(isset($_POST['submit'])){

        //get the data from the inputs

        $name_contact= $_POST['name'];
        $email_contact= $_POST['email'];
        $message= $_POST['message'];

        $mailTo="ingrilo.08@gmail.com";
        $mailFrom=$email_contact;
        $subject=wordwrap($message, 25, "\r\n");
        
        $headers="From: ".$mailFrom;
        $txt="You have received an e-mail from ".$mailFrom.".\n\n".$message;

        $mail=mail($mailTo,$subject,$txt,$headers);
        if($mail){
            echo "<script> alert ('Correo enviado.' ); </script>";
        }else{
            echo "<script> alert ('Correo no enviado.' ); </script>";
        }
    }    
?>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('user/partials-front/footer-user.php');?>