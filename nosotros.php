
<?php

require 'includes/app.php';
incluirTemplate('header');

?>

    <main class="contenedor seccion">
        
        <h1>Conoce sobre Nosotros</h1>


        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="/build/img/nosotros.webp" type="image/webp">
                    <source srcset="/build/img/nosotros.jpg" type="image/jpg">
                    <img loading="lazy" src="/build/img/nosotros.jpg" alt="Sobre Nosotros">

                </picture>

            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima nulla nostrum aliquam, officia
                    ullam vel earum architecto accusamus, magni non soluta aperiam vero impedit repellat laborum placeat
                    inventore neque! Similique. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil rem id
                    temporibus corrupti ipsa. Fugit excepturi sint placeat non saepe? In, fuga libero. Minus velit
                    laboriosam recusandae quaerat quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam
                    ipsam quibusdam, in ducimus dolore harum nemo quo possimus facere perferendis, distinctio nihil sunt
                    architecto quam, nisi similique eum cumque aliquid.
                </p>

                <P>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo aliquam assumenda blanditiis nulla
                    inventore suscipit modi dolores similique? Debitis magnam distinctio officia excepturi et cum. Quae
                    provident architecto laudantium. Asperiores!. Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Praesentium eum quo pariatur sequi? Voluptate quasi, consectetur aut aliquam, eveniet fuga
                    veniam exercitationem nam, amet atque maxime quae nisi distinctio id.
                </P>

            </div>

        </div>
        </div>
    </main><!--FIN DE MAIN-->

<section class="contenedor">
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

</section><!--FIN DE MAIN-->

<?php
incluirTemplate('footer');
?>