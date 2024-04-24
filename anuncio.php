
<?php
require 'includes/funciones.php';
incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture> 
            <source srcset="/build/img/destacada.webp" type="image/webp">
            <source srcset="/build/img/destacada.jpg" type="image/jpg">
            <img    loading="lazy" src="/build/img/destacada.jpg"  alt="imagen de la propiedad">


        </picture>

        <div class=" resumen-propiedad">
            <p class="precio"> $3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
            
                <li>
                    <img class="icono" loading="lazy"  src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
            
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>
            
            </ul>
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
    </main><!--FIN DE MAIN-->


<?php
incluirTemplate('footer');
?>