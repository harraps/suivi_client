<?php

class CommentManager {
    
    private $_db;
    
    public function __construct(PDO $db){
        $this->setDatabase($db);
    }

    public function add(Comment $comment){
        $q = $this->_db->prepare(
            'INSERT INTO `Comment` SET '
            .'`user_id` = :user, '
            .'`demand_id` = :demand, '
            .'`comment_content` = :content, '
            .'`comment_date` = :date '
        );
        $q->bindValue(':user', $comment->getUser(), PDO::PARAM_INT);
        $q->bindValue(':demand', $comment->getDemand(), PDO::PARAM_INT);
        $q->bindValue(':content', $comment->getContent());
        $q->bindValue(':date', $comment->getDate());
        $q->execute();
    }

    public function delete($comment_id){
        $this->_db->exec('DELETE FROM `Comment` WHERE `comment_id` = '.$comment_id);
    }

    public function get($id){
        $id = (int) $id;
        $q = $this->_db->query('SELECT * FROM `Comment` WHERE `comment_id` = '.$id);
        // we check that fetch return a line
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            return new Comment($data);
        }
    }

    public function getList(){
        $comments = [];
        $q = $this->_db->query('SELECT * FROM `Comment` ORDER BY `comment_date`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $comments[] = new Comment($data);
        }
        return $comments;
    }
    
    public function getByDemandId($demand_id){
        $demand_id = (int) $demand_id;

        $comments = [];
        $q = $this->_db->query('SELECT * FROM `Comment` WHERE `demand_id` = '.$demand_id.' ORDER BY `comment_date`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function update(Comment $comment){
        $q = $this->_db->prepare(
            'UPDATE `Comment` SET '
            .'`user_id` = :user, '
            .'`demand_id` = :demand, '
            .'`comment_content` = :content, '
            .'`comment_date` = :date '
            .'WHERE `comment_id` = :id '
        );
        $q->bindValue(':user', $comment->getUser(), PDO::PARAM_INT);
        $q->bindValue(':demand', $comment->getDemand(), PDO::PARAM_INT);
        $q->bindValue(':content', $comment->getContent());
        $q->bindValue(':date', $comment->getDate());
        $q->bindValue(':id', $comment->getId(), PDO::PARAM_INT);
        $q->execute();
    }

    public function setDatabase(PDO $database){
        $this->_db = $database;
    }
    
}