<?php
class seller extends connect{
    private $queryPost = 'INSERT INTO tb_seller(id_seller,name_seller) VALUES(:id,:seller)';
    private $queryGetAll = 'SELECT id_seller AS "id", name_seller AS "seller" FROM tb_seller';
    private $message;
    use getInstance;
    function __construct(public $Name_Seller =3, private $id_seller =3){parent::__construct();}
    public function postSeller(){
        try {
            $res = $this->conx->prepare($this->queryPost);
            $res->bindValue("id", $this->id_seller);
            $res->bindValue("seller", $this->Name_Seller);
            $res->execute();
            $this->message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data3"];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }
    public function getAllSeller(){
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