   <?php $asset = '/yeschef/assets/indice'; ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="<?=$asset?>/css/estilosNosotros.css"> 
 <div class="cabeceraCuerpo">
      <div class="linea">
          <div class="barraGrisSuperior"></div>
      </div>
       <div class="cabecera">
           <img class="imagenCabecera" src="<?=$asset?>/img/logo.png">
       </div>
   </div>
   
   <div class="mensaje">
      <div class="contenidoMensaje">
       <label class="letraLato900" style="font-size: 120%; color: #dc3500; margin: 0; ">¿Necesitas ayuda?</label>
          <label class="letraLato" style="color: #666666; font-size: 90%; margin: -5px 0 0 10px;">Si tienes dudas en cuanto a:</label>
       </div>
   </div>
   
   <div class="listaTexto letraLato"> 
       <ul>
              <li>Contenido</li>
              <li>Uso de la plataforma</li>
              <li>No es lo que esperabas</li>
              <li>Saber mas acerca de Yes Chef</li>
          </ul>
   </div>
   
    <div class="letraLato" style="position: relative; width: 100%; display: grid; justify-content: center; text-align: center; margin-top: 10px;">
            <label style="margin: 0px; font-size: 80%; color: #cccccc;">Escribe a nuestro equipo de atención al cliente.</label>
            <label style="margin: 0px; font-size: 80%; color: #cccccc;">Ellos siempre tienen ganas de compartir anécdotas </label>
            <label style="margin: 0px; font-size: 80%; color: #cccccc;">y echarse unas risas contigo</label>
   </div>
   
   <div class="parte2" style=" margin-top: 1em;">
       <div class="formularioRegistro">
           <form class="formulario">
             
              <div class="contenedorAjustarEnmedio ">
               <div class="campoRegistroSIZE"><img class="iconoInputIzquerda" src="<?=$asset?>/img/ICONOS/CORREODEGRADADO24.png">
               <input type="text" class="campoRegistro" placeholder="Nombre"></div>
               </div>
               
               <div class="contenedorAjustarEnmedio ">
               <div class="campoRegistroSIZE"><img class="iconoInputIzquerda" src="<?=$asset?>/img/ICONOS/CANDADODEGRADADO24.png">
               <input  class="campoRegistro" placeholder="Correo"></div>
               </div>
               
               <div class="contenedorAjustarEnmedio ">
               <div class="campoRegistroSIZE"><img class="iconoInputIzquerda" src="<?=$asset?>/img/ICONOS/CANDADODEGRADADO24.png">
               <input  class="campoRegistro" placeholder="Telefono"></div>
               </div>
               
               <div class="contenedorAjustarEnmedio letraLato">
               <div class="campoRegistroSIZE"><img class="iconoInputCampoTexto" src="<?=$asset?>/img/ICONOS/CorreoDEGRADADO24.png">
               <textarea class="datosComentarios" placeholder="Escribe tu comentario"></textarea>
               </div>
               </div> 

               <div class="contenedorAjustarEnmedio" style="margin-bottom: 10%;">
                    <button type="submit" class="botonEnviar ">INICIAR SESION</button>
                </div>
                  
           </form>
       </div>
   </div> 