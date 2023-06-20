<?php
class client extends connect
{
    use getInstance;
    function __construct(private $Identification, public $Full_Name, public $Email, private $Address, private $Phone)
    {
        parent::__construct();
        print_r($this->__get('Full_Name'));
    }
    public function postclient()
    {
        $mensaje = [];
        try {
            $query = 'INSERT INTO tb_client(identification, full_name, email, address, phone) VALUES(?,?,?,?,?)';
            $res = $this->conx->prepare($query);
            $res->execute([
                $this->Identification,
                $this->Full_Name,
                $this->Email,
                $this->Address,
                $this->Phone,
            ]);

            $mensaje = ["Code" => 200 + $res->rowCount(), "Message" => "Inserted Data"];
        } catch (\PDOException $e) {
            $mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        } finally {
            print_r($mensaje);
        }
    }
}
