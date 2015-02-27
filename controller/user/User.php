<?php

class User {
    
    private $id;
    private $entity;
    private $firstname;
    private $lastname;
    private $email;
    private $address;
    private $phone;
    private $pasword;
    private $projects;
    
    // constructor used when creating a new user account
    public function __construct($entity, $firstname, $lastname, $email, $address, $phone, $password){
        $this->entity = $entity;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->password = $password;
    }
    
    // constructor used to recover user data
    public function __construct($id){
        $this->id = $id;
        $response = $database->query('select * from `User` where `user_id` = '.$id);
        // TODO concider multiple projects per users
        //$projects = $database->query('select `entity` from `User` where `id` = '.$id);
        
        $data = $response->fetch();
        
        $this->entity = $data['user_entity'];
        $this->firstname = $data['user_first_name'];
        $this->lastname = $data['user_last_name'];
        $this->email = $data['user_email'];
        $this->address = $data['user_address'];
        $this->phone = $data['user_phone'];
        $this->password = $data['user_password']; // TODO still encrypted
        //$this->projects = $database->fetch();
    }
    
    // The setters are in case the user wants to change his personnal informations
    
    // the id attribute doesn't have a setter
    public function getId(){
        return $this->id;
    }
    
    public function getEntity(){
        return $this->entity;
    }
    public function setEntity($entity){
        $this->entity = $entity;
    }
    
    public function getFirstname(){
        return $this->firstname;
    }
    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }
    
    public function getLastname(){
        return $this->lastname;
    }
    public function setLastname($lastname){
        $this->lastname = $lastname;
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getAddress(){
        return $this->address;
    }
    public function setAddress($address){
        $this->address = $address;
    }
    
    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    
    // the password attribute doesn't have a getter
    public function checkPassword($password){
        if ( $this->password == $password ){
            return true;
        }
        return false;
    }
    public function setNewPassword($oldPass, $newPass){
        if ( $this->password == $oldPass ){
            $this->password = $newPass;
        }
    }
    /*public function setPassword($password){
        $this->password = $password;
    }*/
}