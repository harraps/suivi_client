<?php

class Project {

    private $_id;
    private $_name;
    private $_users_id = array();

    public function __construct( array $data){
        $this->hydrate($data);
    }

    public function hydrate( array $data ){
        $this->hmatch($data, 'setId', 'project_id');
        $this->hmatch($data, 'setName', 'project_name');
        $this->hmatch($data, 'setUsers', 'users_id');
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

    public function getUsers(){
        return $this->_users_id;
    }
    public function setUsers($users_id){
        if( is_array($users_id) ){
            
            // we make sure that the array contains only positive ints
            $results = [];
            foreach( $users_id as &$u ){
                $u = (int) $u;
                if( $u > 0 ){
                    $results[] = $u;
                }
            }
            $this->_users_id = $results;
        }else{
            throw new Exception('Parameter not of the correct type, should be array.');
        }
    }
    public function addUser($user){
        // we check that $user is an User object
        if( is_a($user, "User") ){
            if( !in_array($user->getId(), $this->_users_id) ){
                $this->_users_id[] = $user->getId();
            }
        }else{
            throw new Exception('the object is not a User object.');
        }
    }
    public function addUserById($user_id){
        $user_id = (int) $user_id;
        if( $user_id > 0 ){
            if( !in_array($user_id, $this->_users_id) ){
                $this->_users_id[] = $user_id;
            }
        }
    }
    
    
}