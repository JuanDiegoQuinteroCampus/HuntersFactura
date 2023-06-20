<?php
class client extends connect{
    private $queryPost = 'INSERT INTO tb_client(n_identification,full_name,email,adress,phone) VALUES(:cc,:name,:email,:direction,:cellphone)';
    private $message;
    use getInstance;
    function __construct(private $Identification, public $Full_Name, public $Email, private $Address, private $Phone){parent::__construct();}
    public function postClient(){
        try {
            $res = $this->conx->prepare($this->queryPost);
            $res -> bindValue("cc",$this->Identification);
            $res -> bindValue("name",$this->Full_Name);
            $res -> bindValue("email",$this->Email);
            $res -> bindValue("direction",$this->Address);
            $res -> bindValue("cellphone",$this->Phone);
            $res -> execute();
            $this->message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }
}
?>  