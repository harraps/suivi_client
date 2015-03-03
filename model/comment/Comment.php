<?php

class Comment {

    private $_id;
    private $_user_id;
    private $_demand_id;
    private $_content;
    private $_date;

    public function __construct( array $data ){
        $this->hydrate($data);
    }
    
    public function hydrate( array $data ){
        $this->hmatch($data, 'setId', 'comment_id');
        $this->hmatch($data, 'setUser', 'user_id');
        $this->hmatch($data, 'setDemand', 'demand_id');
        $this->hmatch($data, 'setContent', 'comment_content');
        $this->hmatch($data, 'setDate', 'comment_date');
    }
    private function hmatch(array $data, $method, $attribute){
        if( isset( $data[$attribute] ) ){
            if( method_exists($this, $method) ){
                $this->$method( $data[$attribute] );
            }
        }
    }
    
    public function equals(Comment $comment){
        if(
            ($this->_user_id == $comment->_user_id) &&
            ($this->_demand_id == $comment->_demand_id) &&
            ($this->_content == $comment->_content) &&
            ($this->_date == $comment->_date)
        ){
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

    public function getUser(){
        return $this->_user_id;
    }
    public function setUser($id){
        $id = (int) $id;
        if( $id > 0 ){
            $this->_user_id = (int) $id;
        }
    }

    public function getDemand(){
        return $this->_demand_id;
    }
    public function setDemand($id){
        $id = (int) $id;
        if( $id > 0 ){
            $this->_demand_id = $id;
        }
    }

    public function getContent(){
        return $this->_content;
    }
    public function setContent($content){
        if( is_string($content) ){
            $this->_content = $content;
        }
    }
    
    public function getDate(){
        return $this->_date;
    }
    public function setDate($date = null){
        if( $date == null ){
            $date = date("Y-m-d");
        }
        if( $this->validateDate($date) ){
            $this->_date = $date;
        }else{
            throw new Exception('Parameter not of the correct type, should be date.');
        }
    }
    
    private function validateDate($date, $format = 'Y-m-d'){
        if( is_string($date) && is_string($format) ){
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
        }else{
            throw new Exception('Parameters not of the correct type, should be string.');
        }
    }
}