<?php
    class credentials{
        use  getInstance;
        private $conex;
        function __construct(){
            $this -> conx = new PDO('mysql:host=172.16.48.210;port=3306;user=sputnik;password=Sp3tn1kC@;database=db_hunter_facture_juanquintero');
        }
    }