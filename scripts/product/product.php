<?php
class product extends connect{
    private $queryPost = 'INSERT INTO tb_product(id_product,name,amount,value_product) VALUES(:id,:nombre,:numero,:valor)';
    private $queryGetAll = 'SELECT id_product AS "id", name AS "nombre", amount AS "numero", value_product AS "valor" FROM tb_product';
    private $message;
    use getInstance;
    function __construct(private $id_product=1, public $name_product=1, public $amount=1, public $value_product=1){parent::__construct();}
    public function postProduct(){
        try {
            $res = $this->conx->prepare($this->queryPost);
            $res->bindValue("id", $this->id_product);
            $res->bindValue("nombre", $this->name_product);
            $res->bindValue("numero", $this->amount);
            $res->bindValue("valor", $this->value_product);
            $res->execute();
            $this->message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data2"];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }
    public function getAllProduct(){
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