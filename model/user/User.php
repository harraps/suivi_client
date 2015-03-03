<?php

class User {
    
    private $_id;
    private $_entity;
    private $_firstname;
    private $_lastname;
    private $_email;
    private $_address;
    private $_phone;
    private $_password; // /!\ cyphered password /!\
    
    public function __construct( array $data){
        $this->hydrate($data);
    }
    
    public function hydrate( array $data ){
        $this->hmatch($data, 'setId', 'user_id');
        $this->hmatch($data, 'setEntity', 'user_entity');
        $this->hmatch($data, 'setFirstName', 'user_first_name');
        $this->hmatch($data, 'setLastName', 'user_last_name');
        $this->hmatch($data, 'setEmail', 'user_email');
        $this->hmatch($data, 'setAddress', 'user_address');
        $this->hmatch($data, 'setPhone', 'user_phone');
        $this->hmatch($data, 'setPassword', 'user_password');
    }
    private function hmatch(array $data, $method, $attribute){
        if (isset($data[$attribute])){
            if( method_exists($this, $method) ){
                $this->$method($data[$attribute]);
            }
        }
    }
    
    public function equals(User $user){
        if(
            ($this->_entity == $user->_entity) &&
            ($this->_firstname == $user->_firstname) &&
            ($this->_lastname == $user->_lastname) &&
            ($this->_email == $user->_email) &&
            ($this->_address == $user->_address) &&
            ($this->_phone == $user->_phone)
        ){
            return true;
        }
        return false;
    }
    
    // since we can create an empty object, we check that this object contains data where needed
    public function areTypesCorrect(){
        if(
            is_int($this->_id) &&
            is_string($this->_entity) &&
            is_string($this->_firstname) &&
            is_string($this->_lastname) &&
            is_string($this->_email) &&
            ( is_string($this->_address) || ($this->_address == null) ) &&
            ( is_string($this->_phone) || ($this->_phone == null) )
        ){
            if( strpos($this->_email,'@') !== false ){
                return true;
            }
        }
        return false;
    }
    
    // The setters are in case the user wants to change his personnal informations
    
    // the id attribute doesn't have a setter
    public function getId(){
        return $this->_id;
    }
    public function setId($id){
        $id = (int) $id;
        if( $id > 0 ){
            $this->_id = $id;
        }
    }
    
    public function getEntity(){
        return $this->_entity;
    }
    public function setEntity($entity){
        if( is_string($entity) ){
            $this->_entity = $entity;
        }else{
            throw new Exception('Parameter not of the correct type, should be string.');
        }
    }
    
    public function getFirstName(){
        return $this->_firstName;
    }
    public function setFirstName($firstname){
        if( is_string($firstname) ){
            $this->_firstName = $firstname;
        }else{
            throw new Exception('Parameter not of the correct type, should be string.');
        }
    }
    
    public function getLastName(){
        return $this->_lastname;
    }
    public function setLastName($lastname){
        if( is_string($lastname) ){
            $this->_lastname = $lastname;
        }else{
            throw new Exception('Parameter not of the correct type, should be string.');
        }
    }
    
    public function getEmail(){
        return $this->_email;
    }
    public function setEmail($email){
        if( is_string($email) ){
            // we check that the email contains atleast a '@'
            if(strpos($email,'@') !== false){
                $this->_email = $email;
            }else{
                throw new Exception('Not valid email, needs a "@".');
            }
        }else{
            throw new Exception('Parameter not of the correct type, should be string.');
        }
    }
    
    public function getAddress(){
        return $this->_address;
    }
    public function setAddress($address){
        if( is_string($address) ){
            $this->_address = $address;
        }else{
            throw new Exception('Parameter not of the correct type, should be string.');
        }
    }
    
    public function getPhone(){
        return $this->_phone;
    }
    public function setPhone($phone){
        if( is_string($phone) ){
            $this->_phone = $phone;
        }else{
            throw new Exception('Parameter not of the correct type, should be string.');
        }
    }
    
    // return the cyphered password
    public function getPassword(){
        return $this->_password;
    }
    public function setPassword($password){
        if( is_string($password) ){
            $this->_password = $password;
        }else{
            throw new Exception('Parameter not of the correct type, should be string.');
        }
    }
    public function checkPassword($password){
        $cyph_pass = sha1($password);
        if ( $this->_password == $cyph_pass ){
            return true;
        }
        return false;
    }
    public function setNewPassword($oldPass, $newPass){
        $cyph_oldPass = sha1($oldPass);
        if ( $this->_password == $cyph_oldPass ){
            $cyph_newPass = sha1($newPass);
            $this->setPassword($cyph_newPass);
        }
    }
    
    /*public function getProjects(){
        $data = $database->query('select * from `Project` where `user_id` = '.$this->_id);
        $projects = array();
        while ($data->fetch()){
            $project = new Project();
            $project->setAll(
                $data['project_id'],
                $data['project_name']
            );
            $projects[] = $project;
        }
        return $projects;
    }*/
}