<?php
    class Category
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function save()
        {
            array_push($_SESSION['list_of_category'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_category'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_category'] = array();
        }

    }

?>
