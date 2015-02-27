<?php

class Project {

    private $id;
    private $name;
    private $users;
    private $demands;

    // constructor used when creating a new user account
    public function __construct($name){
        $this->name = $name;
    }

    // constructor used to recover user data
    public function __construct($id){
        $this->id = $id;
        $response = $database->query('select * from `Project` where `project_id` = '.$id);
        // TODO concider multiple users per project
        //$projects = $database->query('select `entity` from `User` where `id` = '.$id);

        $data = $response->fetch();

        $this->name = $data['project_name'];
        //$this->users = $database->fetch();
    }

    // The setters are in case the user wants to change his personnal informations

    // the id attribute doesn't have a setter
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getUsers(){
        return $this->users;
    }
    public function getUser($id){ // TODO
        return $this->users[$id];
    }
    public function addUser($user){ // TODO
        $this->users += $user;
    }

    public function getDemands(){
        return $this->demands;
    }
    public function getDemand($id){ // TODO
        return $this->demands[$id];
    }
    public function addDemand($demand){ // TODO
        $this->demands += $demand;
    }
}