<?php
class bill extends connect{
    private $queryPost = 'INSERT INTO tb_bill(n_bill,bill_date) VALUES(:num,:dia)';
    private $queryGetAll = 'SELECT n_bill AS "num", bill_date AS "dia" FROM tb_bill';
    private $message;
    use getInstance;
    function __construct(public $N_Bill=1, public $Bill_Date="9999-12-31 23:59:59"){parent::__construct();}
    public function postBill(){
        try {
            $res = $this->conx->prepare($this->queryPost);
            $res->bindValue("num", $this->N_Bill);
            $res->bindValue("dia", $this->Bill_Date);
            $res->execute();
            $this->message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data4"];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }
    public function getAllBill(){
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
}
?>  