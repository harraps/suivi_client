<?php

/*require 'User.php';
require 'Project.php';
require 'Comment.php';*/

class Demand {

    private $_id;
    private $_title;
    private $_content;
    private $_user_id;
    private $_project_id;
    private $_date_creation;
    private $_date_wished;
    private $_date_test;
    private $_date_test_valid;
    private $_date_prod;
    private $_date_prod_valid;

    public function __construct( array $data){
        $this->hydrate($data);
    }

    public function hydrate( array $data ){
        $this->hmatch($data, 'setId', 'demand_id');
        $this->hmatch($data, 'setTitle', 'demand_title');
        $this->hmatch($data, 'setContent', 'demand_content');
        $this->hmatch($data, 'setUser', 'user_id');
        $this->hmatch($data, 'setProject', 'project_id');
        $this->hmatch($data, 'setDateCreation', 'demand_date_creation');
        $this->hmatch($data, 'setDateWished', 'demand_date_wished');
        $this->hmatch($data, 'setDateTest', 'demand_date_test');
        $this->hmatch($data, 'setDateTestValidation', 'demand_date_test_validation');
        $this->hmatch($data, 'setDateProduction', 'demand_date_production');
        $this->hmatch($data, 'setDateProductionValidation', 'demand_date_production_validation');
    }
    private function hmatch(array $data, $method, $attribute){
        if (isset($data[$attribute])){
            if( method_exists($this, $method) ){
                $this->$method($data[$attribute]);
            }
        }
    }
    
    public function equals(Demand $demand){
        if(
            ($this->_title == $demand->_title) &&
            ($this->_content == $demand->_content) &&
            ($this->_user_id == $demand->_user_id) &&
            ($this->_project_id == $demand->_project_id) &&
            ($this->_date_creation == $demand->_date_creation)
            // we don't take account of the other dates because they are likely to change often
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

    public function getTitle(){
        return $this->_title;
    }
    public function setTitle($title){
        if( is_string($title) ){
            $this->_title = $title;
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
    
    public function getUser(){
        return $this->_user_id;
    }
    public function setUser($id){
        $id = (int) $id;
        if( $id > 0 ){
            $this->_user_id = $id;
        }
    }
    
    public function getProject(){
        return $this->_project_id;
    }
    public function setProject($id){
        $id = (int) $id;
        if( $id > 0 ){
            $this->_project_id = $id;
        }
    }
    
    public function getDateCreation(){
        return $this->_date_creation;
    }
    public function setDateCreation( $date_creation ){
        if( $this->validatedate($date_creation) ){
            $this->_date_creation = $date_creation;
        }else{
            throw new Exception('Parameter not of the correct type, should be date.');
        }
    }
    
    public function getDateWished(){
        return $this->_date_wished;
    }
    public function setDateWished( $date_wished ){
        if( $this->validatedate($date_wished) ){
            $this->_date_wished = $date_wished;
        }else{
            throw new Exception('Parameter not of the correct type, should be date.');
        }
    }
    
    public function getDateTest(){
        return $this->_date_test;
    }
    public function setDateTest( $date_test ){
        if( $this->validatedate($date_test) ){
            $this->_date_test = $date_test;
        }else{
            throw new Exception('Parameter not of the correct type, should be date.');
        }
    }
    
    public function getDateTestValidation(){
        return $this->_date_test_valid;
    }
    public function setDateTestValidation( $date_test_valid ){
        if( $this->validatedate($date_test_valid) ){
            $this->_date_test_valid = $date_test_valid;
        }else{
            throw new Exception('Parameter not of the correct type, should be date.');
        }
    }
    
    public function getDateProduction(){
        return $this->_date_prod;
    }
    public function setDateProduction( $date_prod ){
        if( $this->validatedate($date_prod) ){
            $this->_date_prod = $date_prod;
        }else{
            throw new Exception('Parameter not of the correct type, should be date.');
        }
    }
    
    public function getDateProductionValidation(){
        return $this->_date_prod_valid;
    }
    public function setDateProductionValidation( $date_prod_valid ){
        if( $this->validatedate($date_prod_valid) ){
            $this->_date_prod_valid = $date_prod_valid;
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