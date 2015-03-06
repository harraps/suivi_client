<?php

// this class use the table Project but also UserProject
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
        
        // we recover the id that has been attributed to the project
        $s = $this->_db->query('SELECT `project_id` FROM `Project` WHERE `project_name` = "'.$project->getName().'"');
        if( $data = $s->fetch(PDO::FETCH_ASSOC) ){
            $id = $data['project_id'];
            
            // then we add the links between users and projects in the UserProject table
            $r = $this->_db->prepare(
                'INSERT INTO `UserProject` SET '
                .'`user_id` = :user_id, '
                .'`project_id` = :project_id '
            );
            $r->bindValue(':project_id', $id);
            foreach( $project->getUsers() as &$user_id ){
                $r->bindValue(':user_id', $user_id);
                $r->execute();
            }
        }else{
            throw new Exception('Something went wrong with the creation of th project.');
        }
    }

    public function delete($project_id){
        $this->_db->exec('DELETE FROM `UserProject` WHERE `project_id` = '.$project_id);
        $this->_db->exec('DELETE FROM `Comment` WHERE `demand_id` IN (SELECT `demand_id` FROM `Demand` WHERE `project_id` = '.$project_id.')');
        $this->_db->exec('DELETE FROM `Demand`  WHERE `project_id` = '.$project_id);
        $this->_db->exec('DELETE FROM `Project` WHERE `project_id` = '.$project_id);
        
    }

    public function get($id){
        $id = (int) $id;
        $q = $this->_db->query('SELECT * FROM `Project` WHERE `project_id` = '.$id);
        $q2 = $this->_db->query('SELECT `user_id` FROM `UserProject` WHERE `project_id` = '.$id);
        $users = [];
        
        // we check that fetch does return data
        if( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            // we recover the ids of the users linked to this project
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $users[] = $data2['user_id'];
            }
            // we add the array of user id to the data to create the Project object
            $data['users_id'] = $users;
            return new Project($data);
        }
    }

    public function getList(){
        $projects = [];
        $q = $this->_db->query('SELECT * FROM `Project` ORDER BY `project_name`');
        
        // we recover all of the projects
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $users = [];
            $q2 = $this->_db->query('SELECT `user_id` FROM `UserProject` WHERE `project_id` = '.$data['project_id']);
            
            // we recover the ids of the users linked to the current project
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $users[] = $data2['user_id'];
            }
            
            // we add the array of user id to the data to create the Project object
            $data['users_id'] = $users;
            $projects[] = new Project($data);
        }
        return $projects;
    }
    
    public function getByUserId($user_id){
        $user_id = (int) $user_id;
        $projects = [];
        $q = $this->_db->query('SELECT * FROM `Project` NATURAL JOIN `UserProject` WHERE `user_id` = '.$user_id.' ORDER BY `project_name`');

        // we recover all of the projects
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $users = [];
            $q2 = $this->_db->query('SELECT `user_id` FROM `UserProject` WHERE `project_id` = '.$data['project_id']);

            // we recover the ids of the users linked to the current project
            while( $data2 = $q2->fetch(PDO::FETCH_ASSOC) ){
                $users[] = $data2['user_id'];
            }

            // we add the array of user id to the data to create the Project object
            $data['users_id'] = $users;
            $projects[] = new Project($data);
        }
        return $projects;
    }

    public function update(Project $project){
        // first we update the project in the Project table
        $q = $this->_db->prepare(
            'UPDATE `Project` SET '
            .'`project_name` = :name '
            .'WHERE `project_id` = :id '
        );
        $q->bindValue(':name', $project->getName());
        $q->bindValue(':id', $project->getId());
        $q->execute();
        
        // then we remove all the links between users and this project
        $this->_db->exec('DELETE FROM `UserProject` WHERE `project_id` = '.$project->getId());
        
        // so we can reset the new links
        $r = $this->_db->prepare(
            'INSERT INTO `UserProject` SET '
            .'`user_id` = :user, '
            .'`project_id` = :id '
        );
        $r->bindValue(':id', $project->getId());
        foreach( $project->getUsers() as &$user_id ){
            $r->bindValue(':user', $user_id);
            $r->execute();
        }
    }

    public function setDatabase(PDO $database){
        $this->_db = $database;
    }
    
    public function getLink($user_id, $project_id){
        $user_id = (int) $user_id;
        $project_id = (int) $project_id;
        $q = $this->_db->query('SELECT * FROM `UserProject` WHERE `user_id` = '.$user_id.' AND `project_id` = '.$project_id);
        if( $q->fetch(PDO::FETCH_ASSOC) ){
            return TRUE;
        }
        return FALSE;
    }
    public function setLink($user_id, $project_id){
        $user_id = (int) $user_id;
        $project_id = (int) $project_id;
        $q = $this->_db->prepare(
            'INSERT INTO `UserProject` SET '
            .'`user_id` = :user, '
            .'`project_id` = :project '
        );
        $q->bindValue(':user', $user_id);
        $q->bindValue(':project', $project_id);
        $q->execute();
    }
    
    public function exists($project_id){
        $project_id = (int) $project_id;
        $q = $this->_db->query('SELECT * FROM `Project` WHERE `project_id` = '.$project_id);
        if( $q->fetch(PDO::FETCH_ASSOC) ){
            return TRUE;
        }
        return FALSE;
    }
    
}