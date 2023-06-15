<?php

    trait getInstance{
        static $instance;
        static function getInstance(){
            $arg = func_get_args();
            $arg = array_pop($arg);
            if (self::$instance == null) {
                self::$instance = new self(...(array) $arg);
            }
            return self::$instance;
        }
    }
    class Humano{
        function __construct(private $age, public $name){}
        use getInstance;
        public function getName(){
            return $this->name;
        }
    }
    class Animal{
        function __construct(private $name){}
        use getInstance;
        public function getName(){
            return $this->name;
        }
    }
    
    var_dump(Humano::getInstance(["name"=>"MIguel","age"=>23])->getName());
    var_dump(Animal::getInstance(["name"=>"Perro"])->getName());
?>