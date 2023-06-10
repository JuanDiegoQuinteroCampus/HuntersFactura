<?php
class product{
    use getInstance;
    function __construct(private $id_product, public $name_product, public $amount, public $value_product){}
}
?>