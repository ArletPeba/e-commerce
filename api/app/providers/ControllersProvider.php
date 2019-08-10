<?php
//Se agregan los controllers al contexto de la app (container)
$container ['userController'] = function($container){
    return new app\Controllers\userController($container);
};

$container['EmployeesController'] = function($container){
return new app\Controllers\EmployeesController($container);
};

$container['ProductsController'] = function($container){
    return new app\Controllers\ProductsController($container);
    };

 $container['CustomersController'] = function($container){
        return new app\Controllers\CustomersController($container);
 };
 $container['OfficesController'] = function($container){
        return new app\Controllers\OfficesController($container);
 };
 $container['OrderController'] = function($container){
       return new app\Controllers\OrderController($container);
};
        
?>