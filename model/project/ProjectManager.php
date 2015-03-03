<?php

class ProjectManager {

    private $_db;

    public function __construct(PDO $db){
        $this->setDatabase($db);
    }

    public function add(Project $project){
        $q = $this->_db->prepare(
            'INSERT INTO `Project` SET '
            .'`project_name` = :name '
        );
        $q->bindValue(':name', $project->getName());
        $q->execute();
    }

    public function delete(Project $project){
        $this->_db->exec('DELETE FROM `Project` WHERE `project_id` = '.$user->getId());
    }

    public function get($id){
        $id = (int) $id;
        $q = $this->_db->query('SELECT * FROM `Project` WHERE `project_id` = '.$id);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return new Project($data);
    }

    public function getList(){
        $projects = [];
        $q = $this->_db->query('SELECT * FROM `Project` ORDER BY `project_name`');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $projects[] = new User($data);
        }
        return $projects;
    }

    public function update(Project $project){
        $q = $this->_db->prepare(
            'INSERT INTO `Project` SET '
            .'`project_name` = :name '
            .'WHERE `project_id` = :id '
        );
        $q->bindValue(':name', $project->getName());
        $q->bindValue(':id', $project->getPassword());
        $q->execute();
    }

    public function setDatabase(PDO $database){
        $this->_db = $database;
    }

}