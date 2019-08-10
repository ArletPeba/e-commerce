<?php
namespace app\Models;

 class CustomersModel extends Models{

    public function selectCustomers(){
        
        $result = $this->db->select('customers',
        ['customerNumber','customerName','contactLastName','contactFirstName','phone',
        'addressLine1','addressLine2','city','state','postalCode','country','salesRepEmployeeNumber','creditLimit']);

        if(!is_null($this->db->error()[1]))
        {
            return array('error'=>true, 'description'=>$this->db->error()[2]);
        } else if (empty($result)){
            return array('notfound' => true, 'description' => 'The result is empty');
        }
        return array(
            'success' =>true,
            'description' => 'The employees were found',
            'customers' => $result
        );


    }

    public function insertCustomers($customer){
        $result = $this->db->insert('customers',['customerNumber'=>$customer['customerNumber'],
        'customerName'=>$customer['customerName'],
        'contactLastName'=>$customer['contactLastName'],
        'contactFirstName'=>$customer['contactFirstName'],
        'phone'=>$customer['phone'],
        'addressLine1'=>$customer['addressLine1'],
        'addressLine2'=>$customer['addressLine2'],
        'city'=>$customer['city'],
        'state'=>$customer['state'],
        'postalCode'=>$customer['postalCode'],
        'country'=>$customer['salesRepEmployeeNumber'],
        'salesRepEmployeeNumber'=>$customer['salesRepEmployeeNumber'],
        'creditLimit'=>$customer['creditLimit']
    ]);
        
        if (!is_null($this->db->error()[1])){
            return array(
                'succes' => false,
                'description' => $this->db->error()[2]
            );
        }
        return array(
            'succes' => true,
            'description' =>'The customer was inserted'
        );
    }
    public function modificarCustomers($customer,$id){
        $result = $this->db->update('customers',
        ['customerName'=>$customer['customerName'],
        'contactLastName'=>$customer['contactLastName'],
        'contactFirstName'=>$customer['contactFirstName'],
        'phone'=>$customer['phone'],
        'addressLine1'=>$customer['addressLine1'],
        'addressLine2'=>$customer['addressLine2'],
        'city'=>$customer['city'],
        'state'=>$customer['state'],
        'postalCode'=>$customer['postalCode'],
        'country'=>$customer['salesRepEmployeeNumber'],
        'salesRepEmployeeNumber'=>$customer['salesRepEmployeeNumber'],
        'creditLimit'=>$customer['creditLimit']],['customerNumber'=>$id]
        );

        if (!is_null($this->db->error()[1])){
            return array(
                'succes' => false,
                'description' => $this->db->error()[2]
            );
        }
        return array(
            'succes' => true,
            'description' =>'The customer was modified'
        );
        echo $result->rowCount();
    }
}
?>