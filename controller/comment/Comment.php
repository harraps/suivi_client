<?php

class Comment {

    private $id;
    private $user;
    private $demand;
    private $content;
    private $date_;

    // constructor used when creating a new user account
    public function __construct($user, $demand, $content, $date_){
        $this->user = $user;
        $this->demand = $demand;
        $this->content = $content;
        $this->date_ = $date_; 
    }

    // constructor used to recover user data
    public function __construct($id){
        $this->id = $id;
        $response = $database->query('select * from `Comment` where `comment_id` = '.$id);
        // TODO concider multiple users per project
        //$projects = $database->query('select `entity` from `User` where `id` = '.$id);

        $data = $response->fetch();

        //$this->user = $data['user_name']; TODO
        //$this->demand = $data[''];
        $this->content = $data['comment_content'];
        $this->date_ = $data['comment_date'];
    }

    // The setters are in case the user wants to change his personnal informations

    // the id attribute doesn't have a setter
    public function getId(){
        return $this->id;
    }

    public function getUser(){
        return $this->user;
    }

    public function getDemand(){
        return $this->demand;
    }

    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content = $content;
    }
    
    public function getDate(){
        return $this->date_;
    }
}