<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Task.php";

    // $DB = new PDO('pgsql:host=localhost;dbname=to_do_test');


    class TaskTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Task::deleteAll();
        }


        function test_getDescription()
        {
            //Arrange

            $description = "Wash the dog";
            $test_task = new Task($description);
            $test_task->save();

            //Act
            $result = $test_task->getDescription();

            //Assert
            $this->assertEquals("Wash the dog", $result);
        }
    }
?>
