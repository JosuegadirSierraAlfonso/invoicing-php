<?php
class client extends connect{
    private $query = 'INSERT INTO tb_client(Identification,Full_Name,Email,Address,Phone) VALUES(:cc,:name,:email,:address,:cellphone)';
    private $queryGetAll = 'SELECT Identification as "cc",full_name,email,address,phone FROM tb_client';
    private $message;
    use getInstance;
    function __construct(
        private $Identification, 
        public $Full_Name, 
        public $Email, 
        private $Address, 
        private $Phone){
        parent::__construct();
    }
    private function postClient(){
        try {
            $res = $this->conx->prepare($this->query);
            $res->bindValue("email", $this->Email);
            $res->bindValue("cc", $this->Identification);
            $res->bindValue("name", $this->Full_Name);
            $res->bindValue("address", $this->Address);
            $res->bindValue("cellphone", $this->Phone);
            $res->execute();
            $message = ["Code"=> 200+$res->rowCount(), "Message"=> "Inserted data"];
        } catch (\PDOException $e){
            $message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }
    public function getAllClient(){
        try {
            $res = $this->conx->prepare($this->queryGetAll);
            $res->execute();
            $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }




    /* private function postClient(){
        $message = [];
        try {
            $query = 'INSERT INTO tb_client(Identification,Full_Name,Email,Address,Phone) VALUES(?,?,?,?,?)';
            $res = $this->conx->prepare($query);
            $res = $res->execute([
                $this->Identification,
                $this->Full_Name,
                $this->Email,
                $this->Address,
                $this->Phone
            ]);
            $message = ["Code"=> 200+$res->rowCode(), "Message"=> "Inserted data"];
        } catch (\PDOException $e){
            $message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($message);
        }
    } */
}
?>  