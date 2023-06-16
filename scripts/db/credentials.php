<?php
    abstract class credentials{
        protected $host = '172.16.48.210';
        private $user = 'sputnik';
        private $password = 'Sp3tn1kC@';
        protected $dbname = 'db_hunter_facture_GadirSierra';
        public function __get($name){
            return $this->{$name};
        }
    }
?> 