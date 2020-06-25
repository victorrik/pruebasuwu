<?php

    function consultaUrl($url){//Devuelve el json
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, [ 'Accept: application/json' ] );
        curl_setopt( $curl, CURLOPT_URL, $url );
        $json = curl_exec( $curl );
        curl_close( $curl );
        return  $json ;
    }

    function consultaUrlNoJson($url){//Devuelve el vector
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, [ 'Accept: application/json' ] );
        curl_setopt( $curl, CURLOPT_URL, $url );
        $json = curl_exec( $curl );
        curl_close( $curl );
        $respuestas = json_decode( $json, true );
        return  $respuestas ;
    }

    function eliminarURl($url){
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, [ 'Accept: application/json' ] );
        curl_setopt( $curl, CURLOPT_URL, $url );
        $json = curl_exec( $curl );
        curl_close( $curl );
        $respuestas = json_decode( $json, true );
        return  $respuestas[0]["RESULTADO"] ;
    }

    function agregarURl($url){
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, [ 'Accept: application/json' ] );
        curl_setopt( $curl, CURLOPT_URL, $url );
        $json = curl_exec( $curl );
        curl_close( $curl );
        $respuestas = json_decode( $json, true );
        return  $respuestas[0]["RESULTADO"] ;
    }