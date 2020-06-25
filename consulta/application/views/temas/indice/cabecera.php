
   <!-- barra de navegacion superior -->
        <nav class="barraNavegacion navbar fixed-top navbar-expand-lg justify-content-between ajusteBarraOtrosNavegadores">
            <img class="navbar-brand logoCBRA" src="<?=assetindice()?>/img/ICONOS/SVG/YESCHEFLOGO2.png" onclick = "location='<?=base_url()?>'">
           
             <button class="navbar-toggler" type="button" data-toggle= "collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expandde="false" aria-label="Toggle navigation ">
                <img src="<?=assetindice()?>/img/ICONOS/SVG/MENU.svg" style="width: 34px;">
             </button>
                 
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      
                       <ul class="navbar-nav mr-auto">
                           
                            <li class="nav-item active">
                                <a class="nav-link hvr-bounce-to-top letrasCabecera" href="<?=base_url()?>/#experiencias">NOSOTROS<span class="sr-only"></span></a>
                            </li>

                            <li class="nav-item">
                               <a class="nav-link hvr-bounce-to-top letrasCabecera" href="<?=base_url()?>/#contacto">SERVICIOS<span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-bounce-to-top letrasCabecera" href="<?=base_url()?>/#servicios">EXPERIENCIAS<span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link hvr-bounce-to-top letrasCabecera" href="#">ARTÍCULOS Y NOTICIAS<span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-bounce-to-top letrasCabecera" href="<?=base_url()?>/#formu">CONTACTO<span class="sr-only"></span></a>
                            </li>
                        </ul>
                         <div class="form-inline">
                              
                                  <button class="boton2CBRA letraLatoMedia " type="submit" onclick = "location='<?=base_url('/Crearcuenta')?>'" >REGÍSTRATE</button>
                                  <button class="botonCBRA letraLatoMedia " type="submit" onclick = "location='<?=base_url('/Login')?>'">INICIAR SESIÓN</button>
                              
                            </div>
                    </div>
        </nav>

