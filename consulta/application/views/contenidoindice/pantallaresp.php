<html>
<head>
    <style type='text/css'>

        .tarjeta {
            /*
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            */
        }

        .contenido {
            justify-content: center;
            justify-items: center;
            /*display: grid;*/
        }

        .cabecera {
            /*background-color: #57b9ff;*/
            padding: 33px 0;
            justify-content: center;
            justify-items: center;
            width: 100%;
            display: inline-grid;
        }

        .cabecera img {
            width: 18em;
        }

        .subCabecera {
            background-color: #ff6a00;
            justify-content: center;
            justify-items: center;
            width: 100%;
            padding: 22px 0;
            display: flex;
            justify-content: center;
        }

        .subCabecera h3 {
            color: white;
        }

        .cuerpo {
            justify-content: center;
            justify-items: center;
        }

        .cuerpo .centro {
            background-color: red;
            width: 24em;
            padding: 30px 0;
            text-align: center;
            margin-top: 20px;
            opacity: 0.5;
        }

        @media (max-width: 420px) {
            .cuerpo .centro {
                background-color: red;
                width: 74%;
                padding: 30px 0;
                text-align: center;
                margin-top: 20px;
                opacity: 0.5;
            }
        }

        .centro p {
            color: white;
            font-size: 15px;
            padding: 0px 20px;
        }

        .boton {
            margin-top: 60px;
            width: 8em;
            height: 2.5em;
            border: none;
            border-radius: 10px;
            background-color: white;
            font-weight: 700;
        }

        a {
            font-style: none;
            text-decoration: none;
            color: black;
            font-weight: 700;
        }

        .imagen2 {
            position: fixed;
            width: 44%;
            display: flex;
            opacity: 0.2;
            top: 34vh;
            left: 63%;
            z-index: -1;
        }

        @media (max-width: 420px) {
            .imagen2 {
                position: fixed;
                width: 88%;
                display: flex;
                opacity: 0.2;
                top: 44vh;
                left: 58%;
                z-index: -1;
            }
        }

        .imagen1 {
            position: fixed;
            width: 50%;
            display: flex;
            opacity: 0.2;
            top: 26vh;
            right: 53%;
            z-index: -1;
        }

        @media (max-width: 420px) {
            .imagen1 {
                position: fixed;
                width: 112%;
                display: flex;
                opacity: 0.2;
                top: 38vh;
                right: 26%;
                z-index: -1;
            }
        }

    </style>
</head>
<body>
    <div class="tarjeta" align="center">
        <div class="contenido">
            <div class="cabecera">
                <img src="<?=assetindice()?>/img/LOGONUEVO2.png">
            </div>
            <div class="subCabecera">
                <h3>Nuevo usuario creado</h3>
            </div>
            <div class="cuerpo">
                <div class="centro">
                    <p style="font-weight: 700;">Bienvenido al sistema internacional gastronómico YesChef</p>
                    <p style="font-weight: 500; margin-top: 60px;">Haz creado una nueva cuenta, da click en el siguiente botón para ser redirigido al inicio de sesión </p>
                    <a href="https://yeschef.nibirusystem.com/Login"><button class="boton">LOGIN</button></a>
                </div>
            </div>
                <!-- <img class="imagen1" src="<?=assetindice()?>/img/ICONOS/SVG/MUNDOCHEF.svg"> -->
        </div>
    </div>
                <img class="imagen2" src="<?=assetindice()?>/img/ICONOS/SVG/GORROCHEF.svg"> 
                <img class="imagen1" src="<?=assetindice()?>/img/ICONOS/SVG/MUNDOAZUL.png"> 
</body>
</html>