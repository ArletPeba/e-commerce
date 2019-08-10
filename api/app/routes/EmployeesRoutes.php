<?php
$app->get('/employees','EmployeesController:selectEmployees');
//$app->POST('/employees','EmployeesController:insertEmployees');
$app->PUT('/employees','EmployeesController:modificarEmployees');
$app->POST('/employees', 'EmployeesController:loguin');
?>