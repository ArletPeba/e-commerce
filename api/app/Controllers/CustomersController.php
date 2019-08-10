<?php
    namespace app\Controllers;

    class CustomersController extends Controllers{

        function selectCustomers($request, $response){
            
            $message=$this->CustomersModel->selectCustomers();
            
            return json_encode($message);
        }

        function insertCustomers($request,$response){
            $customer = $request->getParsedBody();//Contiene el array
            //var_dump($customer);die();
           $message=$this->CustomersModel->insertCustomers($customer);
           return json_encode($message);
        }
        function modificarCustomers($request,$response){
            $customer = $request->getParsedBody();//Contiene el array
            $id=$request->getAttribute(['id']);
            //var_dump($customer);die();
           $message=$this->CustomersModel->modificarCustomers($customer,$id);
           return json_encode($message);
        }
    }
?>