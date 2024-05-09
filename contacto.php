
<?php

require 'includes/app.php';
incluirTemplate('header');

?>

    <main class="contenedor">
        <h1>CONTACTO</h1>

        <picture> 
            <source srcset="/build/img/destacada3.webp" type="image/webp">
            <source srcset="/build/img/destacada3.jpg" type="image/jpg">
            <img loading ="lazy" src="/build//img/destacada3.jpg" alt="Imagen Contacto"> 

        </picture>

        <h2> Llene el formulario de Contacto</h2>

        <form class="formulario"> 
            <fieldset>
                <legend> Información Personal</legend>
                <label for="nombre">Nombre</label> 
                <input type="text" placeholder="Tu nombre" id="nombre"> 

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email"> 

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono"> 

                <label for="mensaje">Mensaje:</label>
                <textarea  id="mensaje"></textarea>
                
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>
                <label for="opciones">Vende o Compra:</label>
                <select id="opciones">
                    <option value="" desabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto">
           
                </fieldset> 

                <fieldset>
                    <legend>Información sobre la propiedad</legend>
                    <p>Como desea ser contactado</p>
                    <div class="forma-contacto">
                        <label for ="contactar-telefono">Teléfono</label>
                        <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                        <label for="contactar-email">E-mail</label>
                        <input name="contacto" type="radio" value="email" id="contactar-email"> 

                    </div>

                    <a> Si eligió teléfono, elija la fecha y la hora</a>

                    <label for="fecha">Fecha:</label>
                    <input  type="date" id="fecha">

                    <label for="hora">Hora:</label>
                    <input type="time" id="hora">

                </fieldset>

            </fieldset>



<input type="submit" value="Enviar" class="boton-verde"
        </form>

    </main><!--FIN DE MAIN-->

<?php
incluirTemplate('footer');
?>