<?php
$app->get('/products','ProductsController:selectProducts');
$app->POST('/products','ProductsController:insertProducts');
$app->PUT('/products{product}','ProductsController:modificarProducts');
?>