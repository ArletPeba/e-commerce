<?php
namespace app\Models;

class EmployeesModel extends Models{

    public function selectEmployees(){
        
        $result = $this->db->select('employees',['[><]offices'=>['officeCode'=> 'officeCode']],
        ['employeeNumber','lastName','firstName','extension','email','reportsTo,jobTitle,city','offices.city']
        );

        if(!is_null($this->db->error()[1]))
        {
            return array('error'=>true, 'description'=>$this->db->error()[2]);
        } else if (empty($result)){
            return array('notfound' => true, 'description' => 'The result is empty');
        }
        return array(
            'success' =>true,
            'description' => 'The employees were found',
            'employees' => $result
        );

    }

    public function insertEmployees($employee){
        $result = $this->db->insert('employees',[
            'employeeNumber'=>$employee['employeeNumber'],
            'lastName'=>$employee['lastName'],
            'firstName'=>$employee['firstName'],
            'extension'=>$employee['extension'],
            'email'=>$employee['email'],
            'officeCode'=>$employee['officeCode'],
            'reportsTo'=>$employee['reportsTo'],
            'jobTitle'=>$employee['jobTitle']
        ]);
        
        if (!is_null($this->db->error()[1])){
            return array(
                'succes' => false,
                'description' => $this->db->error()[2]
            );
        }
        return array(
            'succes' => true,
            'description' =>'The employee was inserted'
        );
    }
    public function modificarEmployees($employee){
        $result = $this->db->update('employees',[
            'lastName'=>$employee['lastName']],
            ['employeeNumber'=>$employee['employeeNumber']]
        );
        if (!is_null($this->db->error()[1])){
            return array(
                'succes' => false,
                'description' => $this->db->error()[2]
            );
        }
        return array(
            'succes' => true,
            'description' =>'The employee was modified'
        );
    }

    public function loguin($employee){
        $email=$employee['email'];
        $password=md5($employee['password']);
       
        $result = $this->db->pdo->prepare('SELECT * FROM employees WHERE email = :email');
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->execute();
        $result->fetchAll(\PDO::FETCH_ASSOC);
        if(empty($result)){
            return array(
                'error' => true,
                'description' => 'dirección incorrecta'
            );
        }
        $pass = $this->db->pdo->prepare('SELECT * FROM employees WHERE password=:password');
        $pass->bindParam(':password', $password, \PDO::PARAM_STR);
        $pass->execute();
        $pass->fetchAll(\PDO::FETCH_ASSOC);
        if(empty($pass)){
            return array(
                'error' => true,
                'description' => 'contraseña incorrecta'
            );
        }
        $token = $this->jwt->encode($email,$this->settings['jwt']['key']);
        return array(
            'success' => true,
            'description' => 'Acceso correcto',
            'token' => $token
        );

    }

    
}
?>