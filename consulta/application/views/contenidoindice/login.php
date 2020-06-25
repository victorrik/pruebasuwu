<link rel="stylesheet" href="<?=assetmiperfil()?>/css/bootstrap.css">
<script src="<?=assetindice()?>/js/accionesVisuales/botones.js"></script>  
<!-- cuerpo------------------------------------------------------------ -->
<img class="gorroFondo" src="<?=assetindice()?>/img/ICONOS/SVG/GORROCHEF.svg">
<section>
   <div class="cabeceraCuerpo">
      <div class="linea">
         <div class="barraGrisSuperior"></div>
      </div>
      <div class="cabecera">
         <img class="imagenCabecera" src="<?=assetmiperfil()?>/img/yeschef.png">

      </div>
   </div>

   <!-- -------------------------------------- -->
   <form action="" class="formRecuperar" method="post" id="formRecuperar" onsubmit="return false">
      <div class="formulario">
        <div class="contenidoFormulario">
          <div class="cabeceraForm">
            <p class="letraLato900 letraCabeceraTitule">Recupera tu contraseña</p>
            <p class="letraLato letraCabeceraSub">Introduzca sus datos</p>
          </div>
          <div class="cuerpoForm">
            <div class="campoForm letraLato" id="campoCorreo">
              <label for="inp" class="inp">
                <img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/CORREO DEGRADADO.svg">
                <input type="email" id="correoR" name="correoR" placeholder="&nbsp;">
                <span class="label" id="labelCorreoR">Correo</span>
                <span class="border"></span>
              </label>
            </div>
            <small id="smalR" style="color: red; display: none; width: 16em; text-align: center;">Correo no valido</small>            
            <small id="smsRevisacorreo" style="color: red; font-weight: 700; font-size: 14px; display: none;">Prueba</small>

             <button type="" id="botonEnviarCorreo" class="botonEnviar" onclick="enviarVerificacionCorreo()">ENVIAR</button>
             <button type="" class="botonEnviar" onclick="volverInicio()">ATRÁS</button>
              <div class="spinner-border text-danger" id="espinerR" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
      </div>
    </div>
   </form>
   <!-- --------------------------------------- -->
   <form action="" class="formlogin" method="post" id="formlogin" onsubmit="return false">
      <div class="formulario">
        <div class="contenidoFormulario">
          <div class="cabeceraForm">
            <p class="letraLato900 letraCabeceraTitule">¿Ya tienes una cuenta?</p>
            <p class="letraLato letraCabeceraSub">Introduzca sus datos</p>
          </div>
          <div class="cuerpoForm">
            <div class="campoForm letraLato" id="campoCorreo">
              <label for="inp" class="inp">
                <img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/CORREO DEGRADADO.svg">
                <input type="email" id="correo" name="correo" placeholder="&nbsp;">
                <span class="label" id="labelCorreo">Correo</span>
                <span class="border"></span>
              </label>
            </div>
            <div class="campoForm letraLato">
              <label for="inp" class="inp">
                <img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/CANDADO DEGRADADO.svg">
                <i id="imgContraseña" class="fas fa-eye ojoContraseña" onclick="mostrarContraseña2()"></i>
                <input type="password" id="contrasena" name="contra" placeholder="&nbsp;">
                <span class="label" id="labelContra">Contraseña</span>
                <span class="border"></span>
              </label>
               <input type="text" id="latitud" name="latitud" hidden="" value="">
                <input type="text" id="longitud" name="longitud" hidden="" value="">
            </div>
            <small id="smal" style="color: red; display: none; width: 16em; text-align: center;">Las contraseñas no coinciden</small>
            
            <a id="labelRec" class="AVISO" style="color: #dc3500; font-size: 15px; display: contents;" onclick="modoRecuperarContra()">¿Recuperar tu contraseña?</a>
            

             <button type="" class="botonEnviar" onclick="iniciosesion()">INICIAR SESIÓN</button>
              <div class="spinner-border text-danger" id="espiner" role="status" style="display: none;">
               <span class="sr-only">Loading...</span>
          </div>

        </div>
      </div>
    </div>
   </form>
   <!-- --------------------------------------- -->

   <!-- --------------------------------------- -->
</section>
<script type="text/javascript">

  $( "#labelCorreoR" ).click(function() {
    $("#correoR").focus();
  });

  $( "#labelContra" ).click(function() {
    $("#contrasena").focus();
  });

  $( "#labelCorreo" ).click(function() {
    $("#correo").focus();
  });

  function saberContraseña () {
  var data  = $("#formRecuperar").serialize();
  var url = "<?=base_url('/login/iniciosesion')?>";
  }

  $("#correoR").change(function() {
    $("#smalR").css("display","none");
  });


   function iniciosesion() { 
   
    var data  = $("#formlogin").serialize();
    var url = "<?=base_url('/login/iniciosesion')?>";
     $("#smal").css("display","none");
   
    if ($("#contrasena").val() != "" && $("#correo").val() != "") {
   $("#espiner").css("display","block");
    $("#botoncrear").css("display","none");
      $.ajax({ 
      type: 'ajax',
      method: 'post',
      url: url,
      async: false, 
      dataType: 'text',
      data: data})
       .done(function(response){  
        if (response == 1) {
          location.href = "<?=base_url('/dashboard')?>";
          $("#espiner").css("display","none");
          $("#botoncrear").css("display","block");
        }
        if(response == 2){
         $("#smal").css("display","block");
         $("#smal").html("La contraseña no coincide");
         $("#espiner").css("display","none");
         $("#botoncrear").css("display","block");
         $("#contrasena").addClass("hvr-buzz-out");
         equivocacion();
        }
        if(response == 3){
         $("#smal").css("display","block");
         $("#smal").html("El correo esta incorrecto");
         $("#espiner").css("display","none");
         $("#botoncrear").css("display","block");
         $("#correo").addClass("hvr-buzz-out");
        }
        if (response == 4) {
            $("#labelRec").css("display","none");
        $("#smal").css("display","block");
         $("#smal").html("La cuenta no está activada, revisa tu correo y sigue las indicaciones <a style='text-decoration:underline;' onclick='reenviarAlta()'>(Reenviar correo de confirmación).</a>");
         $("#espiner").css("display","none");
         $("#botoncrear").css("display","block");
         $("#correo").addClass("hvr-buzz-out");
        }
        if (response == 5) {
          console.log('bloqueado!!!');
          $("#smal").css("display","block");

          $("#correo").css("display","none");
          $("#contrasena").css("display","none");

           $("#smal").html("Se ha bloqueado tu cuenta <a style='font-weight: 700;' onclick='reenviarAlta()'>Enviar correo de activación</a>");

           $("#espiner").css("display","none");
           $("#botoncrear").css("display","block");
           
           $("#labelRec").css("display","none");
           $("#correo").addClass("hvr-buzz-out");
        }
      }) ;
    }
    else{
      $("#smal").css("display","block");
      $("#smal").html("Por favor llene los campos");
    }
   
   }

   function enviarRecuperar () {
      var url = "<?=base_url('/login/recuperarCuenta')?>";
      var data  = $("#formRecuperar").serialize();

         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url:url,
            data:data,
            async: false,
   
            success: function(response){ 
              $("#smalR").css("display","none");
              $("#smsRevisacorreo").css("display","block");
              $("#smsRevisacorreo").html("Se ha enviado un correo con las indicaciones para recuperar tu contraseña.");
              $("#botonEnviarCorreo").css("display","none");
              $("#campoCorreo").css("display","none");

            },
            error: function () {
              $("#smalR").html("Favor de volver a intentarlo");

            }
         }) ;
   }

   function equivocacion () {
      var url = "<?=base_url('/login/equivocado')?>";
      var data  = $("#formlogin").serialize();

         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url:url,
            data:data,
            async: false,
   
            success: function(response){
              console.log('Contraseña incorrecta')
            },
            error: function () {
              $("#smalR").html("Favor de volver a intentarlo");

            }
         }) ;
   }

   function enviarsmsalta () {
      var url = "<?=base_url('/login/reenvirAlta')?>";
      var data  = $("#formlogin").serialize();

         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url:url,
            data:data,
            async: false,
   
            success: function(response){ 
              $("#smalR").css("display","none");
              $("#smsRevisacorreo").css("display","block");
              $("#smsRevisacorreo").html("Revisa la bandeja de entrada o tu bandeja de correo no deseado");
              $("#botonEnviarCorreo").css("display","none");
              $("#campoCorreo").css("display","none");

            },
            error: function () {
              $("#smalR").html("Favor de volver a intentarlo");

            }
         }) ;
   }

  

   function enviarVerificacionCorreo() {
    var data  = $("#formRecuperar").serialize();
    var url = "<?=base_url('/login/verificarCorreo')?>";
         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url:url,
            data:data,
            async: false,
   
            success: function(response){ 
              if(response != 1) {
               
                $("#smalR").css("display","block");
                $("#smalR").html("El correo no existe");
              }else {
                enviarRecuperar();
              }
              
            },
            error: function () {
              alert("Ocurrio un error inesperado")

            }
         }) ;
   }

   function reenviarAlta() {
    var data  = $("#formlogin").serialize();
    var url = "<?=base_url('/login/verificarCorreoAlta')?>";
         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url:url,
            data:data,
            async: false,
   
            success: function(response){ 
              if(response != 1) {
               
                $("#smal").css("display","content");
                $("#smal").html("El correo no existe");
              }else {
                enviarsmsalta();
              }
              
            },
            error: function () {
              alert("Ocurrio un error inesperado")

            }
         }) ;
   }
   
   function modoRecuperarContra () {
    //$("#cuerpoFormulario").css({"display":"none"});
    $("#formlogin").addClass("desvanecerLogin");

    $("#formRecuperar").addClass("aparecerRecuperar");
    $("#formRecuperar").removeClass("formRecuperar");
   }

  function volverInicio () {
    $("#formlogin").removeClass("desvanecerLogin");


    $("#formRecuperar").addClass("formRecuperar");
    $("#formRecuperar").removeClass("aparecerRecuperar");
  }

   $( "#correo" ).change(function() {
      $("#correo").removeClass("hvr-buzz-out");
    });

   $( "#contrasena" ).change(function() {
      $("#contrasena").removeClass("hvr-buzz-out");
    });
   
</script>
<script type="text/javascript">
   getLocation()
   
   
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition, showError);
  } else { 
   console.log("Geolocation is not supported by this browser.")
  }
}

function showPosition(position) {
console.log(position.coords.latitude);  
 console.log(position.coords.longitude);
 var x = position.coords.longitude;
 x = x.toString().length;
  

 $("#latitud").val(position.coords.latitude);
 $("#longitud").val(position.coords.longitude);
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
    console.log("User denied the request for Geolocation.")
     
      break;
    case error.POSITION_UNAVAILABLE:
    console.log("Location information is unavailable.") 
      break;
    case error.TIMEOUT:
    console.log("The request to get user location timed out.")
   
      break;
    case error.UNKNOWN_ERROR:
    console.log("An unknown error occurred.") 
      break;
  }
}
</script>