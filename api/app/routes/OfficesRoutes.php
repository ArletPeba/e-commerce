<?php
$app->get('/offices/{id}','OfficesController:selectOfficesId');
$app->POST('/offices','OfficesController:insertOffices');
$app->PUT('/offices','OfficesController:modificarOffices');
?>