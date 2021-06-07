<?php

class CreateDb
{
        public $serverId;
        public $username;
        public $password;
        public $tablename;
        public $con;

        // Base de dados Local -> Xampp
    public function __construct(
        $tablename = "ementas",
        $servername = '127.0.0.1',
        $username = 'root',
        $password = ''
    )
    // Base de dados Servidor
    /*public function __construct(
        $tablename = "ementas",
        $servername = '127.0.0.1',
        $username = 'root',
        $password = ''
    )*/
    {
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // criar connecção
        $this->con = mysqli_connect($servername, $username, $password,$tablename);

        // Verificar connecção
        if (!$this->con){
            die("A ligação falhou : " . mysqli_connect_error());
        }
    }

    // get estabelecimentos da base de dados
    function getEstabelecimentos(){
    $sql = "SELECT * FROM estabelecimentos";

    $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    // get produtos da base de dados
    public function getProdutos(){
        $sql = "SELECT * FROM produtos";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}






