 <!-- cuerpo------------------------------------------------------------ -->
 <!-- cuerpo------------------------------------------------------------ -->
 <link rel="stylesheet" href="<?=assetmiperfil()?>/css/bootstrap.css"> 
 <img class="gorroFondo" src="<?=assetindice()?>/img/ICONOS/SVG/GORROCHEF.svg">
 <div class="cabeceraCuerpo">
  <div class="linea">
    <div class="barraGrisSuperior"></div>
  </div>
  <div class="cabecera">
   <img class="imagenCabecera" src="<?=assetmiperfil()?>/img/yeschef.png">
 </div>
</div>

<div class="mensaje">
 <div class="contenidoMensaje">
   <p>
     <label class="AVISO letraLato900" style="color: #dc3500; font-size: 25px;">¿No tienes una cuenta?</label>
   </p>
   <p style="margin: -1.5em;">
     <label class="AVISO letraLato" style="color: #666666; margin: 0; font-size: 15px;">Regístrate y obtén ofertas exclusivas para clientes</label>
     
   </p>
 </div>
</div>

<div class="parte2">

 <div class="formularioRegistro">
   <form class="formulario" action="<?=base_url('/crearcuenta/registro')?>" method="post" id="formcrearcuenta">

    <div class="AVISO contenedorAjustarEnmedio letraLato">
     <div class="campoRegistroSIZE"><img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/NOMBRE.svg">
       <input type="text" name="nombre" class="campoRegistro" placeholder="Nombre" required></div>
     </div>

     <div class="AVISO contenedorAjustarEnmedio letraLato">
       <div class="campoRegistroSIZE"><img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/APELLIDO PATERNO.svg">
         <input type="text" name="apellidopaterno" class="campoRegistro" placeholder="Apellido paterno" required></div>
       </div>

       <div class="AVISO contenedorAjustarEnmedio letraLato">
         <div class="campoRegistroSIZE"><img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/APELLIDO MATERNO.svg">
           <input type="text" name="apellidomaterno" class="campoRegistro" placeholder="Apellido materno" required></div>
         </div>

         <div class="AVISO contenedorAjustarEnmedio letraLato">

          <div class="campoRegistroSIZE" style="width: 250px;"><img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/APELLIDO MATERNO.svg">
           <input type="date" name="fechanacimiento" class="campoRegistro" placeholder="Fecha nacimiento" id="fecha" required style="width: 70%; padding: 0; padding-left: 38px;">
         </div>

         <img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/SEXO.svg" style="margin-left: 43px;">
         <div class="custom-select" style="width:130px;background: transparent;">
          <select  name="sexo"> 
            <option>Sexo</option>
            <option value="2">Hombre</option>
            <option value="1">Mujer</option>
          </select>
        </div>
      </div>

      <div class="AVISO contenedorAjustarEnmedio letraLato">
       <div class="campoRegistroSIZE"><img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/CORREO DEGRADADO.svg">
         <input type="email" name="correo" class="campoRegistro" placeholder="Correo" id="correo" required></div>
       </div>

       <div class="AVISO contenedorAjustarEnmedio letraLato">
         <div class="campoRegistroSIZE"><img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/CANDADO DEGRADADO.svg">
           <input type="password" name="contra" id="contra" class="campoRegistro" placeholder="Contraseña" required></div>
           <i id="imgContraseña" class="fas fa-eye ojoContraseña" onclick="mostrarContraseña()"></i>
         </div>

         <div class="AVISO contenedorAjustarEnmedio letraLato">
           <div class="campoRegistroSIZE"><img class="iconoInputIzquerda" src="<?=assetindice()?>/img/ICONOS/SVG/CANDADO GRIS.svg">
             <input type="password" id="rcontra" class="campoRegistro" placeholder="Confirmar contraseña" required></div> 

           </div>
           <div class="contenedorAjustarEnmedio">
             <small id="smal" style="color: red; display: none;">Las contraseñas no coinciden</small>
           </div>
           <div class="contenedorAjustarEnmedio " style="margin-top: 5%;">
             <label class="AVISO letraLato" style="width: 70%; text-align: center; font-size: 90%; color: #4d4d4d;">
               Al hacer click en el botón "Crear cuenta" está de acuerdo con nuestros <a class="letraLato900" style="color: #dc3500">Términos y condiciones</a>
             </label>
           </div> 

           <div class="contenedorAjustarEnmedio" id="" style="margin-bottom: 10%;">
            <div class="spinner-border text-danger" id="espiner" role="status" style="display: none;">
              <span class="sr-only">Loading...</span>
            </div>
            <button type="button" id="botoncrear" onclick="registro()" class="AVISO botonEnviar botonAccion">CREAR CUENTA</button>
          </div>
          <div class="contenedorAjustarEnmedio animated bounceInUp delay-1s" id="zonaBoton" style="display: none;">
            <div class="contenedor" style="width: 28em;height: 12em; background-image: linear-gradient(to right,#ff004e,#fe2400); justify-content: center;text-align: center;padding: 20px 27px;border-radius: 9px;font-weight: 600; box-shadow: 0px 10px #888888;" onload=" ">
              <label style="color: white; text-align: center; font-size: 17px; font-weight: 800;">¡Gracias por unirte a Yes-Chef! </label>
              <label style="color: white; text-align: center; font-size: 17px;">Acabamos de enviarte un mensaje para que actives tu cuenta al correo registrado como:</label>
              <label style="color: white; text-decoration:underline; text-align: center; font-size: 17px; font-weight: 700;" id="mensajeCorreo"></label>
              <label style="color: white;  text-align: center; font-size: 17px; width: 100%; " id="tiempo">Redireccionando página en 0</label>
            </div>
          </div>
        </form>
      </div>
      
    </div>

    <div class="ayudita"></div>
    <!---------------------------------->
<script type="text/javascript">

function saberCorreo () {
  var maspuntos = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
          var result = $("#correo").val().match(maspuntos);
          if(result == null) {
            return false;
         }else {
            $("#smal").css("display","none");
            //$("#correo").val("");
            $("#correo").css("border-color","#e6e6e6");
            return true;
         }
         return true;
}




var contador = 10;

function ver () {
  setTimeout('mandarLogin()',5000);
  var myVar = setInterval(myTimer, 1000);
}

function myTimer() {
  $("#tiempo").html("Redireccionando página en " + contador);
  if(contador>=0){
    contador--;
  }
}

function mandarLogin () {
  location.href ='<?=base_url('/Login')?>';
}

function enviarRecuperar () {
  var data  = $("#formcrearcuenta").serialize();
  var url = "<?=base_url('/crearcuenta/enviarVerificacionCuenta')?>";

         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url:url,
            data:data,
            async: false,
   
            success: function(response){ 
              $("#smal").css("display","none");
              $("#smal").html("Se ha enviado un correo de confirmación de cuenta a tu correo electrónico, revisa tu bandeja de entrada");
              $("#espiner").css("display","none");
              $("#botoncrear").css("display","block");

              $(".AVISO").css("display","none");
              $("#zonaBoton").css("display","block");
              $("#mensajeCorreo").html($("#correo").val());
              setTimeout('mandarLogin()',10000);
              var myVar = setInterval(myTimer, 1000);
            },
            error: function () {
              $("#smal").html("Favor de volver a intentarlo");
            }
         }) ;
   }


 function registro() {
  var data  = $("#formcrearcuenta").serialize();
  var url = $("#formcrearcuenta").attr('action');

  $("#smal").css("display","none");
  if(saberCorreo() && $("#contra").val() === $("#rcontra").val()){
    $("#espiner").css("display","block");
    $("#botoncrear").css("display","none");

    var saberanio = $("#fecha").val();
    var anio = saberanio.split('-',1);

    var fecha = new Date();
    var ano = fecha.getFullYear();

    var menor = ano - anio;
    var anoLimite = ano - 200;

    if(menor >= 14 && anio > anoLimite ){
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: url,
        async: false, 
        dataType: 'text',
        data: data})
      .done(function(response){
        if (response == 1) {
          //location.href = "<?=base_url('/configuracion/informacionpersonal')?>";
          enviarRecuperar();
        }
        if(response == 3){
         $("#smal").css("display","block");
         $("#smal").html("La cuenta ya existe");
         $("#espiner").css("display","none");
        $("#botoncrear").css("display","block");
        }
        if(response == 4){
         $("#smal").css("display","block");
         $("#smal").html("La contraseña no puede contener espacios en blanco");
         $("#espiner").css("display","none");
         $("#botoncrear").css("display","block");
        }
        if(response == 5){
         $("#smal").css("display","block");
         $("#smal").html("La contraseña debe contener al menos 8 caracteres");
         $("#espiner").css("display","none");
         $("#botoncrear").css("display","block");
        }

    if(response == "" || response == " ") {
    $("#smal").css("display","block");
    $("#espiner").css("display","none");
    $("#botoncrear").css("display","block");
    $("#smal").html("Rellena todos los campos");
  }

      }); 
    }else if (anio < anoLimite) {
       $("#smal").css("display","block");
         $("#smal").html("Excedes la edad limite");
         $("#espiner").css("display","none");
    $("#botoncrear").css("display","block");

    } else {
      $("#smal").css("display","block");
         $("#smal").html("Debes ser mayor a 14 años para entrar");
         $("#espiner").css("display","none");
    $("#botoncrear").css("display","block");
    }

    
  } else if (saberCorreo() == false) {
    $("#smal").css("display","block");
            $("#smal").html("Escribe un correo valido");

            //$("#correo").val("");
            $("#correo").css("border-color","red");
  } else{
    $("#smal").css("display","block");
    $("#smal").html("Las contraseñas no coinciden");
  }
}
</script>
    <script >
            var x, i, j, selElmnt, a, b, c;
            /*look for any elements with the class "custom-select":*/
            x = document.getElementsByClassName("custom-select");
            for (i = 0; i < x.length; i++) {
              selElmnt = x[i].getElementsByTagName("select")[0];
              /*for each element, create a new DIV that will act as the selected item:*/
              a = document.createElement("DIV");
              a.setAttribute("class", "select-selected ");
              a.style.backgroundImage="none";
              a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
              x[i].appendChild(a);
              /*for each element, create a new DIV that will contain the option list:*/
              b = document.createElement("DIV");
              b.setAttribute("class", "select-items select-hide");
              for (j = 1; j < selElmnt.length; j++) {
          /*for each option in the original select element,
          create a new DIV that will act as an option item:*/
          c = document.createElement("DIV");
          c.innerHTML = selElmnt.options[j].innerHTML;
          c.addEventListener("click", function(e) {
              /*when an item is clicked, update the original select box,
              and the selected item:*/
              var y, i, k, s, h;
              s = this.parentNode.parentNode.getElementsByTagName("select")[0];
              h = this.parentNode.previousSibling;
              for (i = 0; i < s.length; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                  s.selectedIndex = i;
                  h.innerHTML = this.innerHTML;
                  y = this.parentNode.getElementsByClassName("same-as-selected");
                  for (k = 0; k < y.length; k++) {
                    y[k].removeAttribute("class");
                  }
                  this.setAttribute("class", "same-as-selected v");
                  break;
                }
              }
              h.click();
            });
          b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
          });
      }
      function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
          if (elmnt == y[i]) {
            arrNo.push(i)
          } else {
            y[i].classList.remove("select-arrow-active");
          }
        }
        for (i = 0; i < x.length; i++) {
          if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
          }
        }
      }
      /*if the user clicks anywhere outside the select box,
      then close all select boxes:*/
      document.addEventListener("click", closeAllSelect);
</script>
