<?php
    interface environments{
        public function __get($name);
    }
    class connect extends credentials implements environments{
        protected $conx;
        function __construct(private $driver = "mysql",  private $port = 3306){
            try {
                $this->conx = new PDO($this->driver.":host=".$this->__get('host').";port=".$this->port.";dbname=".$this->__get('dbname').";user=".$this->user.";password=".$this->password);
                $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "ok";
            } catch (\PDOException $e) {
                print_r($e->getMessage());
                $this->conx = $e->getMessage();
            }
        }
    }
?>