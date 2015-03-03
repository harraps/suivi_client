<?php

/*require 'User.php';
require 'Demand.php';
require 'Comment.php';*/

class Project {

    private $_id;
    private $_name;

    public function __construct( array $data){
        $this->hydrate($data);
    }

    public function hydrate( array $data ){
        $this->hmatch($data, 'setId', 'project_id');
        $this->hmatch($data, 'setName', 'project_name');
    }
    private function hmatch(array $data, $method, $attribute){
        if (isset($data[$attribute])){
            if( method_exists($this, $method) ){
                $this->$method($data[$attribute]);
            }
        }
    }
    
    public function equals(Project $project){
        if( $this->_name == $project->_name ){
            return true;
        }
        return false;
    }
    
    public function getId(){
        return $this->_id;
    }
    public function setId($id){
        $id = (int) $id;
        if( $id > 0 ){
            $this->_id = $id;
        }
    }

    public function getName(){
        return $this->_name;
    }
    public function setName($name){
        if( is_string($name) ){
            $this->_name = $name;
        }else{
            throw new Exception('Parameter not of the correct type, should be string.');
        }
    }

    /*public function getUsers(){
        $response = $database->query('select * from `User` where `project_id` = '.$this->_id);
        $users = array();
        while ($data = $response->fetch()){
            $user = new User();
            $user->setAll(
                $data['user_id'],
                $data['user_entity'],
                $data['user_first_name'],
                $data['user_last_name'],
                $data['user_email'],
                $data['user_address'],
                $data['user_phone']
            );
            $users[] = $user;
        }
        return $users;
    }
    public function addUser($user){
        // we check that $user is an User object
        if( get_class($user) == "User" ){
            // we check that data in the user object is valid
            if( $user->areTypesCorrect() ){
                // we check that the user isn't already attributed to the project
                $user_test = new User();
                $user_test->setFromId($this->_user_id);
                if( !$user.equals($user_test) ){
                    // TODO
                }else{
                    throw new Exception('User already asigned to the project.');
                }
            }else{
                throw new Exception('User object contains invalid data.');
            }   
        }else{
            throw new Exception('the object is not a User object.');
        }
    }*/

    /*public function getDemands(){
        $response = $database->query('select * from `Demand` where `project_id` = '.$this->_id);
        $demands = array();
        while ($data = $response->fetch()){
            $demand = new Demand();
            $demand->setAll(
                $data['demand_id'],
                $data['demand_title'],
                $data['demand_content'],
                $data['user_id'],
                $data['project_id'],
                $data['demand_date_creation'],
                $data['demand_date_wished'],
                $data['demand_date_test'],
                $data['demand_date_test_validation'],
                $data['demand_date_production'],
                $data['demand_date_production_validation']
            );
            $demands[] = $demand;
        }
        return $demands;
    }
    public function addDemand($demand){ // TODO
        $this->_demands += $demand;
    }*/
}