<?php

// We use this class as a namespace to contains all of the functions necessary for the whole website

session_start();
require_once($RootDir.'model/user/User.php');
require_once($RootDir.'model/user/UserManager.php');
require_once($RootDir.'model/project/Project.php');
require_once($RootDir.'model/project/ProjectManager.php');
require_once($RootDir.'model/demand/Demand.php');
require_once($RootDir.'model/demand/DemandManager.php');
require_once($RootDir.'model/comment/Comment.php');
require_once($RootDir.'model/comment/CommentManager.php');
require_once($RootDir.'controller/Controller.php');

$_controller = new Controller();

class Controller {
    
    private $_db;
    
    private $_userMan;
    private $_projectMan;
    private $_demandMan;
    private $_commentMan;
    
    private $_user; // this user is the currently connected user
    private $_isConnected = false;
    private $_isAdmin = false;
    
    public function __construct(){
        // first we create a connection to the database
        
        $this->_db = new PDO('mysql:host=localhost; dbname=Suivi_client; charset=utf8', 'root', '');
        // then we create the managers
        $this->_userMan    = new UserManager($this->_db);
        $this->_projectMan = new ProjectManager($this->_db);
        $this->_demandMan  = new DemandManager($this->_db);
        $this->_commentMan = new CommentManager($this->_db);

        // finally we establish if the user is connected and is an admin
        if(
            isset($_SESSION['id']) &&
            isset($_SESSION['password'])
        ){
            if( $this->checkSession( $_SESSION['id'], $_SESSION['password'] ) ){
                $this->_user = $this->_userMan->get($_SESSION['id']);
                $this->_isConnected = true;
                if( $this->_user->getIsAdmin() ){
                    $this->_isAdmin = true;
                }
            }else{
                header('Location: '.$RootDir.'controller/common/deconnection.php');
            }
        }
    }
    
    public function getDatabase(){
        return $this->_db;
    }
    public function getUserManager(){
        return $this->_userMan;
    }
    public function getProjectManager(){
        return $this->_projectMan;
    }
    public function getDemandManager(){
        return $this->_demandMan;
    }
    public function getCommentManager(){
        return $this->_commentMan;
    }
    public function getUser(){
        return $this->_user;
    }
    public function getIsConnected(){
        return $this->_isConnected;
    }
    public function getIsAdmin(){
        return $this->_isAdmin;
    }
    
    // return true if the session matches an existing user
    public function checkSession($id, $pass){
        $id = (int) $id;
        if( is_string($pass) ){
            $user = $this->_userMan->get($id);
            if( $pass == $user->getPassword() ){
                return true;
            }
        }
        return false;
    }

    // return true if the email exists in the database, false if not
    public function checkEmail($email){
        if( is_string($email) ){
            $q = $this->_db->query('SELECT * FROM `User` WHERE `user_email` = "'.$email.'"');
            if( $q->fetch(PDO::FETCH_ASSOC) ){
                return true;
            }
        }
        return false;
    }
}

