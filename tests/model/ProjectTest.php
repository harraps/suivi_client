<?php
class ProjectTest extends PHPUnit_Framework_TestCase{

    public function testRecoverUsersId(){
        // Arrange
        $projectMan = new ProjectManager($database);
        $projects = $projectMan->getList();
        
        // Assert
        $this->assertEquals(-1, $b->getAmount());
    }

    // ...
}