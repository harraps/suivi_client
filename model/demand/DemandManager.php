<?php

class DemandManager {

    private $_db;

    public function __construct(PDO $db){
        $this->setDatabase($db);
    }

    public function add(Demand $demand){
        $q = $this->_db->prepare(
            'INSERT INTO `Demand` SET '
            .'`demand_title` = :title, '
            .'`demand_content` = :content, '
            .'`user_id` = :user, '
            .'`project_id` = :project, '
            .'`demand_date_creation` = :date_creation, '
            .'`demand_date_wished` = :date_wished, '
            .'`demand_date_test` = :date_test, '
            .'`demand_date_test_validation` = :date_test_valid, '
            .'`demand_date_production` = :date_prod, '
            .'`demand_date_production_validation` = :date_prod_valid '
        );
        $q->bindValue(':title', $demand->getTitle());
        $q->bindValue(':content', $demand->getContent());
        $q->bindValue(':user', $demand->getUser());
        $q->bindValue(':project', $demand->getProject());
        $q->bindValue(':date_creation', $demand->getDateCreation());
        $q->bindValue(':date_wished', $demand->getDateWished());
        $q->bindValue(':date_test', $demand->getDateTest());
        $q->bindValue(':date_test_valid', $demand->getDateTestValidation());
        $q->bindValue(':date_prod', $demand->getDateProduction());
        $q->bindValue(':date_prod_valid', $demand->getDateProductionValidation());
        $q->execute();
    }

    public function delete($demand_id){
        $this->_db->exec('DELETE FROM `Comment` WHERE `demand_id` = '.$demand_id);
        $this->_db->exec('DELETE FROM `Demand`  WHERE `demand_id` = '.$demand_id);
    }

    public function get($id){
        $id = (int) $id;
        $q = $this->_db->query('SELECT * FROM `Demand` WHERE `demand_id` = '.$id);
        // we check that fetch return a line
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Demand($data);
        }
    }

    public function getList(){
        $demands = [];
        $q = $this->_db->query('SELECT * FROM `Demand` ORDER BY `demand_title`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $demands[] = new Demand($data);
        }
        return $demands;
    }
    
    public function getByProjectId($project_id){
        $project_id = (int) $project_id;
        
        $demands = [];
        $q = $this->_db->query('SELECT * FROM `Demand` WHERE `project_id` = '.$project_id.' ORDER BY `demand_title`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $demands[] = new Demand($data);
        }
        return $demands;
    }

    public function update(Demand $demand){
        $q = $this->_db->prepare(
            'UPDATE `Demand` SET '
            .'`demand_title` = :title, '
            .'`demand_content` = :content, '
            .'`user_id` = :user, '
            .'`project_id` = :project, '
            .'`demand_date_creation` = :date_creation, '
            .'`demand_date_wished` = :date_wished, '
            .'`demand_date_test` = :date_test, '
            .'`demand_date_test_validation` = :date_test_valid, '
            .'`demand_date_production` = :date_prod, '
            .'`demand_date_production_validation` = :date_prod_valid '
            .'WHERE `demand_id` = :id '
        );
        $q->bindValue(':title', $demand->getTitle());
        $q->bindValue(':content', $demand->getContent());
        $q->bindValue(':user', $demand->getUser());
        $q->bindValue(':project', $demand->getProject());
        $q->bindValue(':date_creation', $demand->getDateCreation());
        $q->bindValue(':date_wished', $demand->getDateWished());
        $q->bindValue(':date_test', $demand->getDateTest());
        $q->bindValue(':date_test_valid', $demand->getDateTestValidation());
        $q->bindValue(':date_prod', $demand->getDateProduction());
        $q->bindValue(':date_prod_valid', $demand->getDateProductionValidation());
        $q->bindValue(':id', $demand->getId());
        $q->execute();
    }

    public function setDatabase(PDO $database){
        $this->_db = $database;
    }
    
    public function getLink( $user_id, $demand_id ){
        $user_id = (int) $user_id;
        $demand_id = (int) $demand_id;
        $q = $this->_db->query(
            'SELECT `demand_id` '
            .'FROM `UserProject` AS A, `Demand` AS B '
            .'WHERE A.`project_id` = B.`project_id` '
            .' AND A.`user_id` = '.$user_id
            .' AND B.`demand_id` = '.$demand_id
        );
        if( $q->fetch(PDO::FETCH_ASSOC) ){
            return TRUE;
        }
        return FALSE;
    }

}