<?php
namespace app\Controllers;

class OfficesController extends Controllers{

    /*function selectOffices($request, $response){
            
        $message=$this->OfficesModel->selectOffices();
        
        return json_encode($message);
    }*/

    function selectOfficesId($request, $response){
       // $office = $request->getParsedBody();
        $id=$request->getAttribute('id');
        $message=$this->OfficesModel->selectOfficesId($id);
        return json_encode($message);
    }

    function insertOffices($request,$response){
        $office = $request->getParsedBody();  //Contiene el array
        //var_dump($product);die();
       $message=$this->OfficesModel->insertOffices($office);
       return json_encode($message);
    }

    function modificarOffices($request,$response){
        $office = $request->getParsedBody();
        $id=$request->getAttribute(['officeCode']);
       $message=$this->OfficesModel->modificarOffices($office,$id);
      //  $message=$this->OfficesModel->modificarOffices($office);
        return json_encode($message);
    }

}
?>