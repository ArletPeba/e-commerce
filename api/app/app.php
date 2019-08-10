<?php
    require $contexto_app . '/vendor/autoload.php';
    //agregar la configuración de la aplicación
    $settings = require $contexto_app . '/app/settings.php';  
    
    if ($env == 'production'){
        $settings['displayErrorDetails'] = false;
    }

    $app = new \Slim\App(
        array('settings' => $settings)
    ); //creación de la instancia de Slim

    //container de slim
    $container = $app->getContainer();

    //Providers
    $providers = $contexto_app .'/app/providers/*.php';
    foreach (glob($providers) as $filename) require $filename;
    
    //routes
    $routes = $contexto_app .'/app/routes/*.php';
    foreach (glob($routes) as $filename) require $filename;

    $app->run();
?>