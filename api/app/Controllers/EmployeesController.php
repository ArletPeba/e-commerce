<?php
    namespace app\Controllers;

    class EmployeesController extends Controllers{

        function selectEmployees($request, $response){
            
            $message=$this->EmployeesModel->selectEmployees();
            
            return json_encode($message);
        }

        function insertEmployees($request,$response){
            $employee = $request->getParsedBody();  //Contiene el array
           // var_dump($employee);die();
           $message=$this->EmployeesModel->insertEmployees($employee);
           return json_encode($message);
        }
        function modificarEmployees($request,$response){
            $employee = $request->getParsedBody();  //Contiene el array
           // var_dump($employee);die();
           $message=$this->EmployeesModel->modificarEmployees($employee);
           return json_encode($message);
        }

        function loguin($request,$response){
            $employee = $request->getParsedBody();  //Contiene el array
           // var_dump($employee);die();
           $message=$this->EmployeesModel->loguin($employee);
           return json_encode($message); 
        }
    }
?>