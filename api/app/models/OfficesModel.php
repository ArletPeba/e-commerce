<?php
namespace app\Models;

class OfficesModel extends Models{
    
/*public function selectOffices(){       
$sth = $this->db->pdo->prepare('select * from offices');
$sth->execute();
$result=$sth->fetchAll();

        if(!is_null($this->db->error()[1]))
        {
            return array('error'=>true, 'description'=>$this->db->error()[2]);
        } else if (empty($result)){
            return array('notfound' => true, 'description' => 'The result is empty');
        }
        return array(
            'success' =>true,
            'description' => 'The offices were found',
            'products' => $result
        );

}*/
    public function selectOfficesId($id){       
        $sth = $this->db->pdo->prepare('select* from offices where officeCode=:officeCode');
        $sth->execute(['officeCode'=>$id]);
        $result=$sth->fetchAll();
        
                if(!is_null($this->db->error()[1]))
                {
                    return array('error'=>true, 'description'=>$this->db->error()[2]);
                } else if (empty($result)){
                    return array('notfound' => true, 'description' => 'The result is empty');
                }
                return array(
                    'success' =>true,
                    'description' => 'The offices were found',
                    'products' => $result
                );
        
            }
    
    /*public function insertOffices($office){
        $result = $this->db->debug()->insert('offices',['officeCode'=>$office['officeCode'],
        'city'=>$office['city'],
        'phone'=>$office['phone'],
        'addressLine1'=>$office['addressLine1'],
        'addressLine2'=>$office['addressLine2'],
        'state'=>$office['state'],
        'country'=>$office['country'],
        'postalCode'=>$office['postalCode'],
        'territory'=>$office['territory'] ]);
        
        if (!is_null($this->db->error()[1])){
            return array(
                'succes' => false,
                'description' => $this->db->error()[2]
            );
        }
        return array(
            'succes' => true,
            'description' =>'The offices was inserted'
        );
        var_dump($result);die();
    }*/

    public function insertOffices($office){

    $result=$this->db->pdo->prepare('INSERT INTO `offices` (`officeCode`, `city`, `phone`, `addressLine1`, `addressLine2`, `state`, `country`, `postalCode`, `territory`) 
    VALUES (:code, :cit, :tel,:dir1,:dir2,:estado,:pais,:cp,:terr)');
    $result->bindParam(':code',$office['officeCode']);
    $result->bindParam(':cit',$office['city'],\PDO::PARAM_STR);
    $result->bindParam(':tel',$office['phone'],\PDO::PARAM_STR);
    $result->bindParam(':dir1',$office['addressLine1'],\PDO::PARAM_STR);
    $result->bindParam(':dir2',$office['addressLine2'],\PDO::PARAM_STR);
    $result->bindParam(':estado',$office['state'],\PDO::PARAM_STR);
    $result->bindParam(':pais',$office['country'],\PDO::PARAM_STR);
    $result->bindParam(':cp',$office['postalCode'],\PDO::PARAM_STR);
    $result->bindParam(':terr',$office['territory'],\PDO::PARAM_STR);
    
    $result->execute();
    if (!is_null($this->db->error()[1])){
        return array(
            'succes' => false,
            'description' => $this->db->error()[2]
        );
    }
    return array(
        'succes' => true,
        'description' =>'The offices was inserted'
    );
    }

    public function modificarOffices($office,$id){
   /* $result=$this->db->pdo->prepare('UPDATE `offices` SET `city`=:cit,`phone`:tel,`addressLine1`=:dir1,`addressLine2`=:dir2,`state`=:estado,`country`=:pais,`postalCode`=:cp,`territory`=:terr WHERE `officeCode`=:code');
    // $result->bindParam(':code',$office['officeCode']);
    $result->bindParam(':code',$id['officeCode']);
    $result->bindParam(':cit',$office['city'],\PDO::PARAM_STR);
    $result->bindParam(':tel',$office['phone'],\PDO::PARAM_STR);
    $result->bindParam(':dir1',$office['addressLine1'],\PDO::PARAM_STR);
    $result->bindParam(':dir2',$office['addressLine2'],\PDO::PARAM_STR);
    $result->bindParam(':estado',$office['state'],\PDO::PARAM_STR);
    $result->bindParam(':pais',$office['country'],\PDO::PARAM_STR);
    $result->bindParam(':cp',$office['postalCode'],\PDO::PARAM_STR);
    $result->bindParam(':terr',$office['territory'],\PDO::PARAM_STR);
    $result->execute();
        
    if (!is_null($this->db->error()[1])){
        return array(
            'succes' => false,
            'description' => $this->db->error()[2]
        );
    }
    return array(
        'succes' => true,
        'description' =>'The offices was modified'
    );*/

    $result = $this->db->pdo->prepare('UPDATE offices SET
    city = :city,
    phone = :phone,
    addressLine1 = :addressLine1,
    addressLine2 = :addressLine2,
    state = :state,
    country = :country,
    postalCode = :postalCode,
    territory = :territory
    WHERE officeCode = :officeCode');
    $result->bindParam(':officeCode', $id['officeCode'], \PDO::PARAM_STR);
    $result->bindParam(':city', $office['city'], \PDO::PARAM_STR);
    $result->bindParam(':phone', $office['phone'], \PDO::PARAM_STR);
    $result->bindParam(':addressLine1', $office['addressLine1'], \PDO::PARAM_STR);
    $result->bindParam(':addressLine2', $office['addressLine2'], \PDO::PARAM_STR);
    $result->bindParam(':state', $office['state'], \PDO::PARAM_STR);
    $result->bindParam(':country', $office['country'], \PDO::PARAM_STR);
    $result->bindParam(':postalCode', $office['postalCode'], \PDO::PARAM_STR);
    $result->bindParam(':territory', $office['territory'], \PDO::PARAM_STR);
    $result->execute();
    if(!is_null($this->db->error()[1])){
        return array(
            'success' => false,
            'description' => $this->db->error()[2]
        );
    }
    return array(
        'success' => true,
        'description' => 'The office was updated'
    );
    }


    
        /*$result = $this->db->update('offices',['officeCode'=>$office['officeCode'],
        'city'=>$office['city'],
        'phone'=>$office['phone'],
        'addressLine1'=>$office['addressLine1'],
        'addressLine2'=>$office['addressLine2'],
        'state'=>$office['state'],
        'country'=>$office['country'],
        'postalCode'=>$office['postalCode'],
        'territory'=>$office['territory']]);
        
        if (!is_null($this->db->error()[1])){
            return array(
                'succes' => false,
                'description' => $this->db->error()[2]
            );
        }
        return array(
            'succes' => true,
            'description' =>'The offices was modified'
        );
    }*/
}
?>