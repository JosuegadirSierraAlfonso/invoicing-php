<?php
    class info{
        use getInstance;
        function __construct(
        public $N_Bill, 
        public $Bill_Date, 
        public $Seller, 
        private $Identification, 
        public $Full_Name, 
        public $Email, 
        private $Address, 
        private $Phone)
        {
            print_r($N_Bill);
        }
    }
?>