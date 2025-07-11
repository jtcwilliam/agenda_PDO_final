<?php



class Unidade
{



    private $conexao;
    private $dns;
    private $user;
    private $pwd;


    private $idUnidade;
    private $nomeUnidade;
    private $statusUnidade;
    private $responsavelUnidade;

    private $pdoConn;
    
    function __construct()
    {
        include_once 'conecaoPDO.php';
        //criar uma instancia de conexao;
        $objConectar = new Conexao();

        //chamar o metdo conectar
        $objbanco = $objConectar->ConectarPDO();

        $this->setPdoConn($objbanco);

    }

    public function  carregarTodasUnidades($filtro = null)
    {
        try {

           
            $pdo = $this->getPdoConn();

             

            $sql = "SELECT * FROM  unidade ";

            if($filtro != null){
                $sql .= " where idUnidade= ".$filtro;
            }


            $stmt = $pdo->prepare($sql);

 
 

            $stmt->execute();

            //$user = $stmt->fetchAll();
        


            $retorno = array();

            $dados = array();

            $row = $stmt->fetchAll();

            foreach ($row as $key => $value) {
                $dados[] = $value;
            }

 
            if (!isset($dados)) {
                $retorno['condicao'] = false;
            }


                 

            return $dados;
 
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }





    function getConexao()
    {
        return $this->conexao;
    }



    function setConexao($conexao)
    {
        $this->conexao = $conexao;
    }







    /**
     * Get the value of dns
     */
    public function getDns()
    {
        return $this->dns;
    }

    /**
     * Set the value of dns
     *
     * @return  self
     */
    public function setDns($dns)
    {
        $this->dns = $dns;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of pwd
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set the value of pwd
     *
     * @return  self
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get the value of idUnidade
     */
    public function getIdUnidade()
    {
        return $this->idUnidade;
    }

    /**
     * Set the value of idUnidade
     *
     * @return  self
     */
    public function setIdUnidade($idUnidade)
    {
        $this->idUnidade = $idUnidade;

        return $this;
    }

    /**
     * Get the value of nomeUnidade
     */
    public function getNomeUnidade()
    {
        return $this->nomeUnidade;
    }

    /**
     * Set the value of nomeUnidade
     *
     * @return  self
     */
    public function setNomeUnidade($nomeUnidade)
    {
        $this->nomeUnidade = $nomeUnidade;

        return $this;
    }

    /**
     * Get the value of statusUnidade
     */
    public function getStatusUnidade()
    {
        return $this->statusUnidade;
    }

    /**
     * Set the value of statusUnidade
     *
     * @return  self
     */
    public function setStatusUnidade($statusUnidade)
    {
        $this->statusUnidade = $statusUnidade;

        return $this;
    }

    /**
     * Get the value of responsavelUnidade
     */
    public function getResponsavelUnidade()
    {
        return $this->responsavelUnidade;
    }

    /**
     * Set the value of responsavelUnidade
     *
     * @return  self
     */
    public function setResponsavelUnidade($responsavelUnidade)
    {
        $this->responsavelUnidade = $responsavelUnidade;

        return $this;
    }

    /**
     * Get the value of pdoConn
     */ 
    public function getPdoConn()
    {
        return $this->pdoConn;
    }

    /**
     * Set the value of pdoConn
     *
     * @return  self
     */ 
    public function setPdoConn($pdoConn)
    {
        $this->pdoConn = $pdoConn;

        return $this;
    }
}
