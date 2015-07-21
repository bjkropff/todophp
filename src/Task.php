<?php
    class Task
    {
        private $description;
        private $category_id;
        private $id;

        function __construct($description, $id = null, $category_id)
        {
            $this->description = $description;
            $this->id = $id;
            $this->category_id = $category_id;
        }

        function setDescription($new_description)
        {
            $this->description = (string) $new_description;
        }

        function getDescription()
        {
            return $this->description;
        }

        function save()
        {
            array_push($_SESSION['list_of_tasks'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_tasks'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_tasks'] = array();
        }        

    }

?>
