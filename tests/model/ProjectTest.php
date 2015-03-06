<?php
/*
    phpunit --bootstrap Test.php model/ProjectTest.php
*/
class ProjectTest extends \PHPUnit_Framework_TestCase{

    public function testConstructor_1(){
        $project = new Project();
    }
    public function testConstructor_2(){
        $project = new Project([]);
    }
    public function testConstructor_3(){
        $project = new Project([
            'project_id' => '1',
            'project_name' => "project"
        ]);
    }
    public function testConstructor_4(){
        $project = new Project([
            'test' => 0,
            'project_id' => "hello",
            'project_name' => 50
        ]);
    }
    public function testConstructor_5(){
        $project = new Project([
            'project_id' => 2,
            'project_name' => "Name"
        ]);
    }
    
    public function testId_1(){
        $project = new Project([ 'project_id' => 1 ]);
        $this->assertEquals( $project->getId(), 1 );
    }
    public function testId_2(){
        $project = new Project([ 'project_id' => 1 ]);
        $project->setId(2);
        $this->assertEquals( $project->getId(), 2 );
    }
    public function testId_3(){
        $project = new Project([ 'project_id' => 1 ]);
        $project->setId(-2);
        $this->assertEquals( $project->getId(), 1 );
    }
    public function testId_4(){
        $project = new Project([ 'project_id' => -1 ]);
        $this->assertEquals( $project->getId(), null );
    }
    public function testId_5(){
        $project = new Project([]);
        $this->assertEquals( $project->getId(), null );
    }
    
    public function testName_1(){
        $project = new Project([ 'project_name' => "hello" ]);
        $this->assertEquals( $project->getName(), "hello" );
    }
    public function testName_2(){
        $project = new Project([ 'project_name' => "hello" ]);
        $project->setName("hola");
        $this->assertEquals( $project->getName(), "hola" );
    }
    public function testName_3(){
        $project = new Project([ 'project_name' => "hello" ]);
        $project->setId(0);
        $this->assertEquals( $project->getName(), "hello" );
    }
    public function testName_4(){
        $project = new Project([ 'project_name' => 1 ]);
        $this->assertEquals( $project->getName(), null );
    }
    public function testName_5(){
        $project = new Project([]);
        $this->assertEquals( $project->getName(), null );
    }
    
    public function testUsers_1(){
        $project = new Project([
           'users_id' => [1,2,3] 
        ]);
        $this->assertEquals( $project->getUsers()[0], 1 );
        $this->assertEquals( $project->getUsers()[1], 2 );
        $this->assertEquals( $project->getUsers()[2], 3 );
    }
    
    // tests avec chaines de caractères
    // tests en dehors du tableau
    
}