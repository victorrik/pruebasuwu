 
<section class="content-header mt-2">

    <div class="row mt-2 mb-1">
        <div class="col-9"   > 
            <h2 class="letramiperfil">
                Configuración de Perfil
                <span class="letrasubperfil" id="subtituloperfil">
                    <?=$contenido['subtitulo']?>
                </span> 

            </h2>

        </div>
        <div class="col-3 alinearderecha" > 

            <h6 class="  " style="margin-top: 10px;"> Avance General 30%</h6>

            <h6 class="letrasconfig "style="margin-top: 10px;">
                <a href="<?=base_url('/miperfil')?>">Mi perfil</a>> Configuración 
            </h6>
        </div>
    </div>
</section>


<!-- Main content -->
<section class="content margencontenido"  >
    <div class="row lineaseparado mt-3">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-sm-6 col-lg "  >
                            <a id="link0"   href="<?=base_url('/configuracion/informacionpersonal')?>"  >  
                                <button   id="0" data-identificador="0"  class="<?=($this->uri->segment(2)==='informacionpersonal')?'botontopedicionactivo':'botontopedicion'?>" name="nombreboton"   >Información Personal</button> 
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg "  >
                            <a id="link1"   href="<?=base_url('/configuracion/experienciaprofesional')?>"  >
                                <button   id="1" data-identificador="1"  class="<?=($this->uri->segment(2)==='experienciaprofesional')?'botontopedicionactivo':'botontopedicion'?>" name="nombreboton"   >Experiencia Profesional</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg "  >
                            <a id="link2"   href="<?=base_url('/configuracion/practicasprofesionales')?>"  >
                                <button   id="2" data-identificador="2"  class="<?=($this->uri->segment(2)==='practicasprofesionales')?'botontopedicionactivo':'botontopedicion'?>" name="nombreboton"   >Prácticas Profesionales</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg "  > 
                            <a id="link3"   href="<?=base_url('/configuracion/fichamedica')?>"  > 
                                <button   id="3" data-identificador="3"  class="<?=($this->uri->segment(2)==='fichamedica')?'botontopedicionactivo':'botontopedicion'?>" name="nombreboton"   >Ficha Médica</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg "  >
                            <a id="link4"   href="<?=base_url('/configuracion/reconocimientos')?>"  >
                                <button   id="4" data-identificador="4"  class="<?=($this->uri->segment(2)==='reconocimientos')?'botontopedicionactivo':'botontopedicion'?>" name="nombreboton"   >Reconocimientos</button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-lg "  >
                            <a id="link5"   href="<?=base_url('/configuracion/formacionacademica')?>"  >
                                <button   id="5" data-identificador="5"  class="<?=($this->uri->segment(2)==='formacionacademica')?'botontopedicionactivo':'botontopedicion'?>" name="nombreboton"   >Formación Académica</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg "  >
                            <a id="link6"   href="<?=base_url('/configuracion/educacioncontinua')?>"  >
                                <button   id="6" data-identificador="6"  class="<?=($this->uri->segment(2)==='educacioncontinua')?'botontopedicionactivo':'botontopedicion'?>" name="nombreboton"   >Educación Continua</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg "  >
                            <a id="link7"   href="<?=base_url('/configuracion/idiomas')?>"  >
                                <button   id="7" data-identificador="7"  class="<?=($this->uri->segment(2)==='idiomas')?'botontopedicionactivo':'botontopedicion'?>" name="nombreboton"   >Idiomas</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg "  >
                            <a id="link8"   href="<?=base_url('/configuracion/masdemi')?>"  >
                                <button   id="8" data-identificador="8"  class="<?=($this->uri->segment(2)==='masdemi')?'botontopedicionactivo':'botontopedicion'?>" name="nombreboton"   >¿Quieres Saber Más de Mí?</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg "  >
                            <a id="link9"   href="<?=base_url('/configuracion/albumprofesional')?>"  >
                                <button   id="9" data-identificador="9"  class="<?=($this->uri->segment(2)==='albumprofesional')?'botontopedicionactivo':'botontopedicion'?>" name="nombreboton"   >Albúm Profesional</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?=$contenido['porcentaje']?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Avance por Seccion <?=$contenido['porcentaje']?> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="bd-example d-block w-100" id="contenidoedicion"  >
                    <?=$contenido['contenido']?>
                </div>
            </div>
        </div>
    </div>

    
</section>

<div class="modal fade" id="modalpagina" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static"  aria-hidden="true"  >
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content"> 
            <div class="modal-header">
                <h5 class="modal-title" id="titulando" style="margin-top: 0px; margin: auto;">Mensaje del sistema</h5> 
            </div>
            <div class="modal-body" id="">
                <div class="container" style="text-align: center;">
                    <h6 style="margin-top: 0px;">Se han detectado cambios en la página. ¿Desea salir sin guardar? Los cambios realizados se perderán.</h6>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-3">
                        <a href="" class="btn  "  id="btnsalir" data-dismiss="" style="color: white; background-color: red" onclick="salir()"> Salir
                        </a>
                    </div>
                    <div class="col">
                        <button type="button" class="btn  "  data-dismiss="modal" style="color: white; background-color: #239dff"  >Seguir en el Módulo</button> 
                    </div>
                </div> 
                
            </div>
        </div>
    </div>
</div> 
<input type="number" name="" id="inputchangepage" value="1" hidden="">
<script type="text/javascript">

    $(window).on("change", function(){
     if ($("#inputchangepage").val() == 1) {
        $("#inputchangepage").val(2);
    }
});   
    $(document).ready(function() 
    {     
      $("button[name='nombreboton']").click(function(event) 
      { 
         if ($("#inputchangepage").val() == 2) {
            event.preventDefault();
            $("#btnsalir").attr("href",$("#link"+$(this).data("identificador")).attr("href"))
            $('#modalpagina').modal('show' );
        }            

    }); 
  }); 

</script>