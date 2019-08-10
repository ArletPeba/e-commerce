<?php
    header ('Access-Control-Allow-Credentials: true');//(CORS)
    header ('Access-Control-Allow-Origin: *'); //Quien solicita
    header ('Access-Control-Allow-Methods: GET, POST, PUT, DELETE,OPTIONS');//Métodos que puede utilizar
    header ('Access-Control-Allow-Headers: X-API-KEY,Origin, X-Requested-With, Content-Type, Accept,Access-Control-Allow-Method, Authorization');//Tipo de contenido (xml, json, etc)
    
            session_start();

            //directorio d ela aplicación
            $contexto_app = __DIR__;
           // var_dump($contexto_app); die(); //Para ver errores y/o resultados

            //Establecer el entorno de la app
            $env = 'development'; //production or development

            //agregar la configuración de la App
            require $contexto_app . '/app/app.php';


?>