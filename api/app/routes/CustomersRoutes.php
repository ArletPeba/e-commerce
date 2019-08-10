<?php
$app->get('/customers','CustomersController:selectCustomers');
$app->POST('/customers','CustomersController:insertCustomers');
$app->PUT('/customers/{id}','CustomersController:modificarCustomers');
?>