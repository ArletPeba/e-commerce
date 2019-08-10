<?php
namespace app\Controllers;

class ProductsController extends Controllers{

    function selectProducts($request, $response){
            
        $message=$this->ProductsModel->selectProducts();
        
        return json_encode($message);
    }

    function insertProducts($request,$response){
        $product = $request->getParsedBody();  //Contiene el array
        //var_dump($product);die();
       $message=$this->ProductsModel->insertProducts($product);
       return json_encode($message);
    }

    function modificarProducts($request,$response){
        $product = $request->getParsedBody();  //Contiene el array
        //var_dump($product);die();
       $message=$this->ProductsModel->modificarProducts($product);
       return json_encode($message);
    }

}
?>