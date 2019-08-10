<?php
    //configurar acceso a la bd
    $db = require $contexto_app . '/app/database/config.php';
    //key de encriptación
    $jwt = array('key' => 'v\EpWR3!c(U>&fHr', 'algorithms' =>('HS256')); //hs256 algoritmo de encriptación
    //configuración de la app
    $settings = array(
        'displayErrorDetails' =>true,
        'determineRouteBeforeAppMiddleware' =>true, //Verificación antes de entrar a la aplicación
        'db' => $db,
        'jwt'=> $jwt
    );
        //se agrega el contexto de la app
        $settings['contexto'] = $contexto_app;
     

    return $settings; // retorna las configuraciones y se las manda a app.php
?>