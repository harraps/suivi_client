<?php

class UserManager {

    private $_db;

    public function __construct(PDO $db){
        $this->setDatabase($db);
    }

    public function add(User $user){
        $q = $this->_db->prepare(
            'INSERT INTO `User` SET '
            .'`user_isAdmin` = :isAdmin, '
            .'`user_entity` = :entity, '
            .'`user_first_name` = :firstname, '
            .'`user_last_name` = :lastname, '
            .'`user_email` = :email, '
            .'`user_address` = :address, '
            .'`user_phone` = :phone, '
            .'`user_password` = :password '
        );
        $q->bindValue(':isAdmin', $user->getIsAdmin());
        $q->bindValue(':entity', $user->getEntity());
        $q->bindValue(':firstname', $user->getFirstname());
        $q->bindValue(':lastname', $user->getLastname());
        $q->bindValue(':email', $user->getEmail());
        $q->bindValue(':address', $user->getAddress());
        $q->bindValue(':phone', $user->getPhone());
        $q->bindValue(':password', $user->getPassword());
        $q->execute();
    }

    public function delete($user_id){
        
        // we remove the user from both the User table and the UserProject table
        $this->_db->exec('DELETE FROM `UserProject` WHERE `user_id` = '.$user_id);
        $this->_db->exec('DELETE FROM `Comment` WHERE `user_id` = '.$user_id);
        $q = $this->_db->query('SELECT `demand_id` FROM `Demand` WHERE `user_id` = '.$user_id);
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $this->_db->exec('DELETE FROM `Comment` WHERE `demand_id` = '.$data['demand_id']);
        }
        $this->_db->exec('DELETE FROM `Demand`  WHERE `user_id` = '.$user_id);
        $this->_db->exec('DELETE FROM `User`    WHERE `user_id` = '.$user_id);
    }

    public function get($id){
        $id = (int) $id;
        $q = $this->_db->query('SELECT * FROM `User` WHERE `user_id` = '.$id);
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new User($data);
        }
    }
    
    // recover an user using his email
    public function getByEmail($email){
        if( is_string($email) ){
            $q = $this->_db->query('SELECT * FROM `User` WHERE `user_email` = "'.$email.'"');
            if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
                return new User($data);
            }
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
            .'`user_isAdmin` = :isAdmin, '
            .'`user_entity` = :entity, '
            .'`user_first_name` = :firstname, '
            .'`user_last_name` = :lastname, '
            .'`user_email` = :email, '
            .'`user_address` = :address, '
            .'`user_phone` = :phone, '
            .'`user_password` = :password '
            .'WHERE `user_id` = :id'
        );
        $q->bindValue(':isAdmin', $user->getIsAdmin());
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

}