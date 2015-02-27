<?php

class Demand {

    private $id;
    private $title;
    private $content;
    private $user;
    private $project;
    private $date_creation;
    private $date_wished;
    private $date_test;
    private $date_test_valid;
    private $date_prod;
    private $date_prod_valid;
    private $comments;

    // constructor used when creating a new user account
    public function __construct($title, $content, $user, $project, $date_wished){
        $this->title = $title;
        $this->content = $content;
        $this->user = $user;
        $this->project = $project;
        $this->date_creation = date("Y-m-d");
        $this->date_wished = $date_wished;
    }

    // constructor used to recover user data
    public function __construct($id){
        $this->id = $id;
        $response = $database->query('select * from `Demand` where `demand_id` = '.$id);
        // TODO concider multiple users per project
        //$projects = $database->query('select `entity` from `User` where `id` = '.$id);

        $data = $response->fetch();

        $this->title = $data['demand_title'];
        $this->content = $data['demand_content'];
        $this->user = $data['demand_user'];
        $this->project = $data['demand_project'];
        $this->date_creation = $data['demand_date_creation'];
        $this->date_wished = $data['demand_date_wished'];
        $this->date_test = $data['demand_date_test'];
        $this->date_test_valid = $data['demand_date_test_validation'];
        $this->date_prod = $data['demand_date_production'];
        $this->date_prod_valid = $data['demand_date_production_validation'];
        //$this->comments = $database->fetch();
    }

    // The setters are in case the user wants to change his personnal informations

    // the id attribute doesn't have a setter
    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }

    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content = $content;
    }
    
    public function getUser(){
        return $this->user;
    }
    
    public function getProject(){
        return $this->project;
    }
    
    public function getDateCreation(){
        return $this->date_creation;
    }
    
    public function getDateWished(){
        return $this->date_wished;
    }
    public function setDateWished($date_wished){ // TODO vérifier l'utilité
        $this->date_wished = $date_wished;
    }
    
    public function getDateTest(){
        return $this->date_test;
    }
    public function setDateTest(){
        $this->date_test = date("Y-m-d");
    }
    public function setDateTest($date_test){
        $this->date_test = $date_test;
    }
    
    public function getDateTestValidation(){
        return $this->date_test_valid;
    }
    public function setDateTestValidation(){
        $this->date_test_valid = date("Y-m-d");
    }
    public function setDateTestValidation($date_test_valid){
        $this->date_test_valid = $date_test_valid;
    }
    
    public function getDateProduction(){
        return $this->date_prod;
    }
    public function setDateProduction(){
        $this->date_prod = date("Y-m-d");
    }
    public function setDateProduction($date_prod){
        $this->date_prod = $date_prod;
    }
    
    public function getDateProductionValidation(){
        return $this->date_prod_valid;
    }
    public function setDateProductionValidation(){
        $this->date_prod_valid = date("Y-m-d");
    }
    public function setDateProductionValidation($date_test_valid){
        $this->date_prod_valid = $date_test_valid;
    }
    
    public function getComments(){
        return $this->comments;
    }
    public function getComment($id){ // TODO
        return $this->comments[$id];
    }
    public function addComment($comment){ // TODO
        $this->comments += $comment;
    }
}