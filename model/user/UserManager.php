<?php

class UserManager {

    private $_db;

    public function __construct(PDO $db){
        $this->setDatabase($db);
    }

    public function add(User $user){
        $q = $this->_db->prepare(
            'INSERT INTO `User` SET '
            .'`user_entity` = :entity, '
            .'`user_first_name` = :firstname, '
            .'`user_last_name` = :lastname, '
            .'`user_email` = :email, '
            .'`user_address` = :address, '
            .'`user_phone` = :phone, '
            .'`user_password` = :password '
        );
        $q->bindValue(':entity', $user->getEntity());
        $q->bindValue(':firstname', $user->getFirstname());
        $q->bindValue(':lastname', $user->getLastname());
        $q->bindValue(':email', $user->getEmail());
        $q->bindValue(':address', $user->getAddress());
        $q->bindValue(':phone', $user->getPhone());
        $q->bindValue(':password', $user->getPassword());
        $q->execute();
    }

    public function delete(User $user){
        $this->_db->exec('DELETE FROM `User` WHERE `user_id` = '.$user->getId());
    }

    public function get($id){
        $id = (int) $id;
        $q = $this->_db->query('SELECT * FROM `User` WHERE `user_id` = '.$id);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return new User($data);
    }
    
    public function getByEmail($email){
        if( is_string($email) ){
            $q = $this->_db->query('SELECT * FROM `User` WHERE `user_email` = "'.$email.'"');
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return new User($data);
        }
    }

    public function getList(){
        $users = [];
        $q = $this->_db->query('SELECT * FROM `User` ORDER BY `user_last_name`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $users[] = new User($data);
        }
        return $users;
    }

    public function update(User $user){
        $q = $this->_db->prepare(
            'UPDATE `User` SET '
            .'`user_entity` = :entity, '
            .'`user_first_name` = :firstname, '
            .'`user_last_name` = :lastname, '
            .'`user_email` = :email, '
            .'`user_address` = :address, '
            .'`user_phone` = :phone, '
            .'`user_password` = :password '
            .'WHERE `user_id` = :id'
        );
        $q->bindValue(':entity', $user->getEntity());
        $q->bindValue(':firstname', $user->getFirstname());
        $q->bindValue(':lastname', $user->getLastname());
        $q->bindValue(':email', $user->getEmail());
        $q->bindValue(':address', $user->getAddress());
        $q->bindValue(':phone', $user->getPhone());
        $q->bindValue(':password', $user->getPassword());
        $q->bindValue(':id', $user->getId());
        $q->execute();
    }

    public function setDatabase(PDO $database){
        $this->_db = $database;
    }
    
    public function checkSession($id, $pass){
        $id = (int) $id;
        if( is_string($pass) ){
            $user = $this->get($id);
            if( $pass == $user->getPassword() ){
                return true;
            }
        }
        return false;
    }

}