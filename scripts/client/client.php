<?php
class client extends connect{
    use getInstance;
    function __construct(private $Identification, public $Full_Name, public $Email, private $Address, private $Phone){
        parent::__construct();
        print_r($this->__get('Full_Name'));
    }
    private function postclient(){
        
    }
}
?>  