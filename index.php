<?php

require 'includes/app.php';
incluirTemplate('header',$inicio = true);

?>

    <main class="contenedor seccion">
        <h1>Más sobre Nosotros</h1>

        <div class="iconos-nosotros">


            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti libero laborum non beatae adipisci
                    modi, incidunt sit corrupti iste maxime molestiae amet facilis doloremque commodi voluptatem nostrum
                    facere esse exercitationem?</p>
            </div>


            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti libero laborum non beatae adipisci
                    modi, incidunt sit corrupti iste maxime molestiae amet facilis doloremque commodi voluptatem nostrum
                    facere esse exercitationem?</p>
            </div>


            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti libero laborum non beatae adipisci
                    modi, incidunt sit corrupti iste maxime molestiae amet facilis doloremque commodi voluptatem nostrum
                    facere esse exercitationem?</p>
            </div>

        </div>

    </main><!--FIN DE MAIN-->


    <section class="seccion contenedor">

        <h2> Casas y Depas en Venta</h2>

       <?php
       $limite = 3;
       include 'includes/templates/anuncios.php';
       ?>


        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>

        </div>


    </section>

    <!--Imagen de presentación -->


    <section class="imagen-contacto">

        <h2>Encuentra la casa de tus sueños</h2>
        <p> Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad
        </p>
        <a href="contacto.php" class="boton-amarillo-block"> Contactános</a>

    </section>



    <!--bLOG-->

        <div class=" contenedor seccion seccion-inferior">
            <section class=" blog">
                <h3> Nuestro Blog</h3>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srset="/build/img/blog1.webp" type=" image/webp">

                            <source srset="/build/img/blog1.jpg" type=" image/jpg">
                            <img loading="lazy" src="/build/img/blog1.jpg" alt="Texto Entrada Blog">
                        </picture>

                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.php"> 
                            <h4> Terraza en el techo de tu casa</h4>
                            <p class="informacion-meta">Escrito el: <span> 20/10/2024</span> por: <span> Admin</span></p>

                            <p>
                                Consejos para construir una terraza en el techo de tu casa con las mejores materiales
                                y ahorrando dinero.
                            </p>
                        </a>

                    </div>

                </article>



    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srset="/build/img/blog2.webp" type=" image/webp">
    
                <source srset="/build/img/blog2.jpg" type=" image/jpg">
                <img loading="lazy" src="/build/img/blog2.jpg" alt="Texto Entrada Blog">
            </picture>
    
        </div>
    
        <div class="texto-entrada">
            <a href="entrada.php">
                <h4> Guía para la decoración de tu Hogar</h4>
                <p class="informacion-meta" >Escrito el: <span> 20/10/2024</span> por: <span> Admin</span></p>
    
                <p>
                    Maximiza el espacio en tu hogar con esta guia, aprende a combinar
                     muebles y colores para darle vida a tu espacio.
                </p>
            </a>
        </div>
    
           </article>

            </section>


<section class="testimoniales">
    <h3>Testimoniales</h3>

    <div class="testimonial">

        <blockquote>
            El personal se comportó de una escelente forma, muy buena atención y la casa que me
            ofrecieron cumple con todas mis expectativas.
        </blockquote>
        <p>- Jefferson Alquinga</p>
    </div>
</section>
        </div>


    <!--Fin de Nuestro blog-->

   


<?php
incluirTemplate('footer');
?>