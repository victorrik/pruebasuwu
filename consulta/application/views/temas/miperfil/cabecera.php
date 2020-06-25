 
 <?php error_reporting(0); ?>
        <header class="main-header">
                <!-- Logo -->
                <a href="<?=base_url('dashboard')?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">
                        <img src="<?=assetmiperfil()?>/img/yeschef.png">
                    </span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        <img   src="<?=assetgeneral()?>/img/YESCHEFLOGO2.png"> 
                    </span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="padding-left: 0px;">
                                <div class="salida">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <g>
                                                    <path class="icoinfo" d="M32,41.15l-7.92-6.93L1.43,53.63c0.82,0.76,1.93,1.24,3.16,1.24h54.81c1.22,0,2.33-0.48,3.15-1.24
                                                    L39.92,34.21L32,41.15z"/>
                                                    <path class="icoinfo" d="M62.57,10.37c-0.82-0.77-1.93-1.24-3.16-1.24H4.59c-1.22,0-2.33,0.48-3.15,1.25L32,36.57L62.57,10.37z"/>
                                                    <polygon class="icoinfo" points="-0.01,13.15 -0.01,51.14 22.09,32.36            "/>
                                                    <polygon class="icoinfo" points="41.91,32.36 64.01,51.14 64.01,13.14            "/>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" style="">
                            <a class="nav-link " href="<?=base_url('login/logout')?>" style="padding-left: 0px;margin-right: 20px;">
                                <img src="<?=assetmiperfil()?>/img/ICONOS/SALIR_100.png" class="cerrasesion">
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="contimgusprincipal image">
                            <img src="<?php if($_SESSION["fotoperfil"] != ""){ echo $_SESSION["fotoperfil"]; }else { echo assetmiperfil().'/img/yeschef.png';} ?>" class="imgusprincipal img-circle" alt="Yes chef" style="border-radius: 50%; height: 135px;">
                        </div>
                        <div class="info">
                            <a href="#">
                                <i class="fa fa-circle text-success"></i>
                                <?=$_SESSION["elname"]?>
                            </a>
                        </div>
                    </div>
                    <!-- search form -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu tree" data-widget="tree">
                        <li class="treeview " id="dashboard">
                            <a href="#" class="enlineaiconos sidemenuactivo">
                                <i class="dashbico">
                                   <span> <svg version="1.1" id="Capa_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">  
                            <g> 
                                <path class="plandent" d="M0,0v100.4h100.4V0H0z M94.7,94.7H5.8V5.8h88.9V94.7z"></path> 
                                <path class="plandent" d="M30,51c11.1,0,20.2-9,20.2-20.2s-9-20.2-20.2-20.2s-20.2,9-20.2,20.2S18.9,51,30,51z M30,16.5
                                    c7.9,0,14.4,6.5,14.4,14.4S38,45.3,30,45.3s-14.4-6.5-14.4-14.4S22.1,16.5,30,16.5z"></path> 
                                <rect x="57.2" y="14.8" class="plandent" width="29.6" height="5.8"></rect> 
                                <rect x="57.2" y="24.3" class="plandent" width="29.6" height="5.8"></rect> 
                                <rect x="14.8" y="56.8" class="plandent" width="72.4" height="5.8"></rect> 
                                <rect x="14.8" y="67.5" class="plandent" width="72.4" height="5.8"></rect> 
                                <rect x="14.8" y="77.4" class="plandent" width="72.4" height="5.8"></rect>
                            </g>
                            </svg></span>
                        </i>
                            <span>Dashboard</span>
                        </a> 
                    </li>
                        <li class="treeview ">
                            <a href="#" class="enlineaiconos ">
                                <i class="plandentico"><span>
                                    <svg version="1.1" id="Capa_1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                                   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"
                                   style="enable-background:new 0 0 100 100;" xml:space="preserve">  
                                <g>
                                    <linearGradient id="degragadadoicolat" gradientUnits="userSpaceOnUse" x1="0" y1="50.2075" x2="100" y2="50.2075">
                                        <stop  offset="0" style="stop-color:#FE2400"/>
                                        <stop  offset="0.2044" style="stop-color:#FE2009"/>
                                        <stop  offset="0.5441" style="stop-color:#FE1423"/>
                                        <stop  offset="0.975" style="stop-color:#FF014C"/>
                                        <stop  offset="0.9944" style="stop-color:#FF004E"/>
                                    </linearGradient>
                                    <path class="plandent" d="M0,0.4V100h100V0.4H0z M28.3,6.1h43.4v9H28.3V6.1z M94.3,94.3H5.7V6.1h16.8v14.7h54.9V6.1h16.8V94.3z"/> 
                                    <rect x="31.1" y="43.7" class="plandent" width="52.5" height="4.9"/> 
                                    <rect x="31.1" y="58.4" class="plandent" width="52.5" height="4.9"/> 
                                    <rect x="31.1" y="29" class="plandent" width="52.5" height="4.9"/> 
                                    <rect x="31.1" y="73.1" class="plandent" width="52.5" height="4.9"/> 
                                    <path class="plandent" d="M20.9,25.7c-2.9,0-5.3,2.4-5.3,5.3c0,2.9,2.4,5.3,5.3,5.3s5.3-2.4,5.3-5.3C26.2,28.1,23.8,25.7,20.9,25.7z
                                    M20.9,34.7c-2,0-3.7-1.6-3.7-3.7s1.7-3.7,3.7-3.7s3.7,1.6,3.7,3.7S22.9,34.7,20.9,34.7z"/> 
                                    <path class="plandent" d="M20.9,41.2c-2.9,0-5.3,2.4-5.3,5.3c0,2.9,2.4,5.3,5.3,5.3s5.3-2.4,5.3-5.3C26.2,43.6,23.8,41.2,20.9,41.2z
                                    M20.9,50.2c-2,0-3.7-1.6-3.7-3.7c0-2,1.7-3.7,3.7-3.7s3.7,1.6,3.7,3.7C24.6,48.6,22.9,50.2,20.9,50.2z"/> 
                                    <path class="plandent" d="M20.9,55.9c-2.9,0-5.3,2.4-5.3,5.3s2.4,5.3,5.3,5.3s5.3-2.4,5.3-5.3S23.8,55.9,20.9,55.9z M20.9,64.9
                                    c-2,0-3.7-1.6-3.7-3.7c0-2,1.7-3.7,3.7-3.7s3.7,1.6,3.7,3.7C24.6,63.3,22.9,64.9,20.9,64.9z"/> 
                                    <path class="plandent" d="M20.9,70.6c-2.9,0-5.3,2.4-5.3,5.3s2.4,5.3,5.3,5.3s5.3-2.4,5.3-5.3S23.8,70.6,20.9,70.6z M20.9,79.6
                                    c-2,0-3.7-1.6-3.7-3.7s1.7-3.7,3.7-3.7s3.7,1.6,3.7,3.7S22.9,79.6,20.9,79.6z"/>
                                </g>
                            </svg>
                                </span></i>
                            <span>Plan de entrenamiento y desarrollo  </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=" ">
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Práctica profesional
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Formación laboral
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Entrenamiento corporativo
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Estadía internacional
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Doble titulación
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Bolsa de empleo
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#" class="enlineaiconos">
                            <i class="gastroenciico">
                                <span><svg version="1.1" id="Capa_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="10 0 95 95" style="enable-background:new 0 0 100 100;" xml:space="preserve">  
                                <g>  
                                    <path class="gastroenci" d="M91.1,0.4H8.9v82.1h7.4v17.1l9-8.1l8.5,8.5V82.5h57.2V0.4z M29.1,88.6L25.5,85l-4.5,4v-6.5h8.1V88.6z
                                    M86.3,77.8H13.7V5.1h72.7V77.8z"></path> 
                                    <rect x="23.1" y="9.5" class="gastroenci" width="4.7" height="63.9"></rect> 
                                    <path class="gastroenci" d="M49.7,47c0.5,0,0.9-0.2,1.2-0.4c0.8-0.7,1-1.9,0.3-2.8c-1.1-1.4-2.4-3.6-2.4-4.5c0-1.1-0.9-2-2-2
                                    c-1.1,0-2,0.9-2,2c0,2.8,2.8,6.3,3.3,7C48.5,46.7,49.1,47,49.7,47z"></path> 
                                    <path class="gastroenci" d="M64.9,47c0.6,0,1.1-0.3,1.5-0.7c0.6-0.7,3.3-4.2,3.3-7c0-1.1-0.9-2-2-2c-1.1,0-2,0.9-2,2
                                    c0,0.9-1.3,3.1-2.4,4.5c-0.7,0.8-0.6,2.1,0.3,2.8C64,46.8,64.5,47,64.9,47z"></path> 
                                    <path class="gastroenci" d="M57.3,47c1.1,0,2-0.9,2-2v-5.7c0-1.1-0.9-2-2-2c-1.1,0-2,0.9-2,2V45C55.3,46.1,56.2,47,57.3,47z"></path> 
                                    <path class="gastroenci" d="M41,43.5l0,13.8c0,1.3,0.5,2.5,1.4,3.5c0.9,0.9,2.2,1.4,3.5,1.4h22.7c2.7,0,4.9-2.2,4.9-4.9V43.5
                                    c3.5-2.1,5.7-5.8,5.7-9.9c0-6.3-5.2-11.5-11.5-11.5c-0.4,0-0.9,0-1.4,0.1c-2.4-2.5-5.6-3.9-9.1-3.9c-3.4,0-6.7,1.4-9.1,3.9
                                    c-0.5-0.1-1-0.1-1.4-0.1c-6.3,0-11.5,5.2-11.5,11.5C35.3,37.7,37.5,41.5,41,43.5z M45.7,26.1c-0.6,1.5-0.9,3-0.9,4.6
                                    c0,1.1,0.9,2,2,2c1.1,0,2-0.9,2-2c0-4.7,3.8-8.5,8.5-8.5s8.5,3.8,8.5,8.5c0,1.1,0.9,2,2,2c1.1,0,2-0.9,2-2c0-1.6-0.3-3.2-0.9-4.6
                                    c3.7,0.5,6.5,3.7,6.5,7.5c0,3-1.8,5.7-4.5,6.9c-0.1,0-0.2,0.1-0.3,0.1c-0.2,0.2-0.5,0.4-0.6,0.6c-0.2,0.2-0.3,0.5-0.3,0.8
                                    c0,0.1,0,0.2,0,0.3v8.4H45l0-8.3c0-0.1,0-0.2,0-0.3c0-0.3-0.1-0.6-0.3-0.8c-0.2-0.2-0.4-0.4-0.6-0.6c-0.1-0.1-0.2-0.1-0.3-0.1
                                    c-2.8-1.2-4.5-3.9-4.5-6.9C39.2,29.7,42.1,26.6,45.7,26.1z M45.2,58c-0.2-0.2-0.3-0.4-0.3-0.7l0-2.7h24.7v2.7c0,0.5-0.4,1-1,1H45.9
                                    C45.7,58.3,45.4,58.2,45.2,58z"></path>
                                </g>
                            </svg></span></i>
                            <span>Gastro enciclopedia</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=" ">
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Ingredientes
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Historia de platos
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Chefs históricos
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Higiene
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Especialidades
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Educación financiera gastronómica
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Biblioteca de tesis
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Mundo de recetas
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Gastro cuaderno
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#" class="enlineaiconos">
                            <i class="eduydesaico"><span>
                                <svg version="1.1" id="Capa_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"> 
                            <g> 
                                <path class="eduydesa" d="M0,0.4v56.1v5.9v0.3l19.6,17.8L40.9,100h58.9V0.4H0z M23.5,76.4L8.2,62.5h34.6V94L23.5,76.4z M94.1,94.3H48.8
                                V56.5H5.7V6.1h88.3V94.3z"></path> 
                                <rect x="27.8" y="33.6" class="eduydesa" width="52.3" height="4.8"></rect> 
                                <rect x="27.8" y="48.2" class="eduydesa" width="52.3" height="4.8"></rect> 
                                <rect x="27.8" y="19" class="eduydesa" width="52.3" height="4.8"></rect> 
                                <polygon class="eduydesa" points="69.9,88.4 90.5,59.1 84.9,55.2 64.2,84.5    "></polygon> 
                                <polygon class="eduydesa" points="63.1,91.7 69.5,89 63.8,85.1    "></polygon>
                            </g>
                        </svg>
                            </span></i>
                        <span>Educación y desarrollo de competencias</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=" ">
                            <a href="#" class="flechitaderecharoja">
                                <i class="fa fa-caret-right "></i>
                                Libros
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flechitaderecharoja">
                                <i class="fa fa-caret-right "></i>
                                Películas
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flechitaderecharoja">
                                <i class="fa fa-caret-right "></i>
                                Eventos
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flechitaderecharoja">
                                <i class="fa fa-caret-right "></i>
                                Cenas maridaje
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flechitaderecharoja ">
                                <i class="fa fa-caret-right "></i>
                                Museos
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flechitaderecharoja">
                                <i class="fa fa-caret-right "></i>
                                Recorridos
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#" class="enlineaiconos">
                        <i class="entretenimientoico">
                            <span>
                                <svg version="1.1" id="Capa_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">  
                            <g> 
                                <path class="entretenimiento" d="M-0.5,0.4V100H100V0.4H-0.5z M94.2,94.3H5.3V6.1h88.9V94.3z"></path> 
                                <path class="entretenimiento" d="M27.5,48.4c0.6,0,1.1-0.2,1.5-0.5c1-0.8,1.2-2.3,0.3-3.4c-1.4-1.7-3-4.3-3-5.4c0-1.3-1.1-2.4-2.4-2.4
                                s-2.4,1.1-2.4,2.4c0,3.4,3.4,7.6,4,8.5C26.1,48.1,26.8,48.4,27.5,48.4z"></path> 
                                <path class="entretenimiento" d="M46.2,48.4c0.7,0,1.4-0.3,1.9-0.9c0.7-0.8,4-5.1,4-8.4c0-1.3-1.1-2.4-2.4-2.4c-1.3,0-2.4,1.1-2.4,2.4
                                c0,1.1-1.6,3.7-3,5.4c-0.8,1-0.7,2.5,0.3,3.3C45.1,48.2,45.6,48.4,46.2,48.4z"></path> 
                                <path class="entretenimiento" d="M36.9,48.4c1.3,0,2.4-1.1,2.4-2.4v-6.9c0-1.3-1.1-2.4-2.4-2.4c-1.3,0-2.4,1.1-2.4,2.4v6.9
                                C34.5,47.4,35.5,48.4,36.9,48.4z"></path> 
                                <path class="entretenimiento" d="M17,44.2L17,61c0,1.6,0.6,3.1,1.8,4.2c1.1,1.1,2.6,1.7,4.2,1.7h19.7l1.7,1.6l-3.5,20.2l18.3-9.5l18.3,9.5
                                L74,68.5l14.8-14.3l-20.5-3l-6.2-12.5c1.1-2,1.7-4.2,1.7-6.6c0-7.7-6.3-13.9-14.1-13.9c-0.5,0-1.1,0-1.7,0.1
                                c-2.9-3-6.9-4.8-11.1-4.8c-4.2,0-8.2,1.7-11.1,4.8c-0.6-0.1-1.2-0.1-1.7-0.1c-7.8,0-14.1,6.3-14.1,13.9C10,37.2,12.6,41.8,17,44.2z
                                M22.7,23.1c-0.7,1.8-1.1,3.7-1.1,5.6c0,1.3,1.1,2.4,2.4,2.4c1.3,0,2.4-1.1,2.4-2.4c0-5.7,4.7-10.3,10.4-10.3
                                c5.8,0,10.4,4.6,10.4,10.3c0,1.3,1.1,2.4,2.4,2.4c1.3,0,2.4-1.1,2.4-2.4c0-1.9-0.4-3.8-1.1-5.6c4.5,0.6,8,4.5,8,9.1
                                c0,0.4,0,0.8-0.1,1.3l-2.6,5.2c-0.8,0.8-1.8,1.5-2.8,1.9c-0.1,0.1-0.3,0.1-0.4,0.2c-0.3,0.2-0.6,0.4-0.7,0.7
                                c-0.2,0.3-0.3,0.6-0.4,0.9c0,0.1,0,0.3,0,0.4l0,4.5l-2,4l-11.5,1.7H21.8l0-10.1c0-0.1,0-0.2,0-0.4c-0.1-0.4-0.2-0.7-0.4-1
                                c-0.2-0.3-0.4-0.5-0.7-0.7c-0.1-0.1-0.2-0.1-0.3-0.2c-3.4-1.5-5.6-4.8-5.6-8.4C14.8,27.6,18.2,23.7,22.7,23.1z M23,62.2
                                c-0.3,0-0.6-0.1-0.8-0.3c-0.2-0.2-0.3-0.5-0.3-0.8l0-3.3h11.3l4.6,4.5H23z M76.4,58.2l-8.6,8.3l2,11.8l-10.7-5.6l-10.7,5.6l2-11.8
                                l-8.6-8.3l11.9-1.7l5.3-10.7l5.3,10.7L76.4,58.2z"></path>
                            </g>
                        </svg>
                            </span>
                    </i>
                    <span>Entretenimiento gastronómico</span>
                </a>
                <ul class="treeview-menu">
                    <li class=" ">
                        <a href="#" class="flechitaderecharoja">
                            <i class="fa fa-caret-right "></i>
                            Educación continua
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flechitaderecharoja">
                            <i class="fa fa-caret-right "></i>
                            Para los amantes de las competencias
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flechitaderecharoja">
                            <i class="fa fa-caret-right "></i>
                            Súper catálogo de universidades.
                        </a>
                    </li>
                </ul>
                        </li>
                        <li class="treeview">
                            <a href="#" class="enlineaiconos">
                                <i class="comprasico">
                                   <span>
                                        <svg version="1.1" id="Capa_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">  
                                    <path class="compras" d="M0.4,0v100h100V0H0.4z M6.2,94.3V5.7h82.3c-3.1,2-7.1,5.6-10.2,11.8c-1.2,2.4-2.6,4.2-4.2,5.7l-5.6-5.6
                                    l-22.3,7.4L13.5,57.9l25.9,25.9L72.2,51l7.4-22.3l-1.5-1.5c1.9-1.8,3.8-4.2,5.3-7.1C87.5,12,93,9.6,94.7,9v85.3H6.2z M61.6,31.5
                                    c0.2,1.5,1.4,2.5,2.8,2.5c0.1,0,0.2,0,0.4,0c0.2,0,2.9-0.4,6.2-1.9c0,1.5-0.6,2.9-1.7,4c-2.2,2.2-5.9,2.2-8.1,0
                                    c-2.2-2.2-2.2-5.9,0-8.1c1.9-1.9,4.8-2.2,7-0.9c-2.3,1-4,1.2-4.1,1.2C62.6,28.5,61.5,29.9,61.6,31.5z M53.3,51.7
                                    c-0.1,1.5-0.8,3-2.1,4.3l-3.4-3.4c0.7-0.7,1.1-1.4,1.2-2c0.1-0.7-0.1-1.2-0.6-1.7c-0.4-0.4-0.9-0.7-1.5-0.6c-0.5,0-1,0.3-1.5,0.8
                                    c-0.5,0.5-0.8,1-0.8,1.6s0.2,1.3,0.5,2.2c0.4,0.9,0.7,1.8,1,2.6c0.3,0.8,0.4,1.7,0.5,2.4c0,0.8-0.1,1.5-0.3,2.2
                                    c-0.3,0.7-0.7,1.4-1.4,2.1c-1.2,1.2-2.5,1.7-3.9,1.7c-1.5,0-2.9-0.6-4.3-1.7l-2,2l-1.6-1.6l2.1-2.1c-1.3-1.6-1.9-3.3-1.9-4.9
                                    c0.1-1.6,0.8-3.2,2.2-4.6l3.4,3.4c-0.8,0.8-1.2,1.5-1.3,2.3c-0.1,0.7,0.2,1.4,0.9,2.1c0.5,0.5,1,0.7,1.5,0.7c0.5,0,1-0.3,1.5-0.7
                                    c0.5-0.5,0.8-1.1,0.9-1.7c0-0.6-0.1-1.3-0.5-2.3c-0.4-0.9-0.7-1.8-1-2.7c-0.3-0.8-0.4-1.6-0.5-2.4c0-0.8,0.1-1.5,0.3-2.2
                                    c0.3-0.7,0.7-1.4,1.4-2.1c1.1-1.1,2.5-1.7,4-1.7c1.5,0,3,0.6,4.4,1.8l2.1-2.1l1.6,1.6l-2.2,2.2C52.9,48.6,53.4,50.1,53.3,51.7z"></path>
                                </svg>
                                   </span>
                            </i>
                            <span>Módulo de compras</span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=" ">
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Proveedores
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flechitaderecharoja">
                                    <i class="fa fa-caret-right "></i>
                                    Artículos y productos
                                </a>
                            </li>
                        </ul>
                    </li> 
                </ul>
                    </section>
            </aside><div class="content-wrapper">