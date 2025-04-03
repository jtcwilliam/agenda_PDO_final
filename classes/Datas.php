<?php



class DatasAgendamento
{



    private $conexao;
    private $dns;
    private $user;
    private $pwd;

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


    public function  trazerHorariosAdmPorUnidade($data)
    {
        try {

            $pdo = $this->getPdoConn();

            $stmt = $pdo->prepare("SELECT date_format(dia, '%d/%m/%Y')   as dia  FROM agendamento 
            where idStatus in (7 , 3)  and dia >= CURDATE()   and idUnidade= :idUnidade group by dia  ");
            $stmt->execute(array('idUnidade' => $data));

             

            $user = $stmt->fetchAll();

            return $user;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    


    public function  trazerHorarios($data, $idUnidade)
    {
        try {

            $pdo = $this->getPdoConn();

            $stmt = $pdo->prepare("SELECT *,  date_format(dia, '%d/%m/%Y')   as dia  FROM agendamento WHERE date_format(dia, '%d/%m/%Y') = :diaAgendamento    
              and idStatus in (7)   and idUnidade= :idUnidade  order by hora asc ");
            $stmt->execute(array('diaAgendamento' => $data, 'idUnidade'=> $idUnidade));

            $user = $stmt->fetchAll();

           

             return $user;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function  verificarDatasNaUnidade($idUnidade)
    {
        try {

            
            $pdo = $this->getPdoConn();

            $stmt = $pdo->prepare("SELECT DATE_FORMAT(dia , '%d/%m/%Y') as dia,   idunidade  FROM agendamento where dia >= CURDATE() 
              and  idunidade = :idunidade and idPessoa is null  group by (dia) ");
            $stmt->execute(array('idunidade' => $idUnidade));
            $datasDisponiveis = $stmt->fetchAll();

 

            if (empty($datasDisponiveis)) {
                 return false;
            } else {
                 
                return $datasDisponiveis;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }



    //consultas da area administrativa
    public function  trazerHorariosADM($data)
    {
        try {


            $pdo = $this->getPdoConn();

            $stmt = $pdo->prepare("SELECT * FROM agendamento WHERE dia=:diaAgendamento      and idStatus in (0 ,6, 3)   order by hora asc ");
            $stmt->execute(array('diaAgendamento' => $data));

            $user = $stmt->fetchAll();

            return $user;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    //consultas da area administrativa
    public function  verificarDatasNaUnidadeADM($idUnidade)
    {
        try {

            $pdo = $this->getPdoConn();


            $stmt = $pdo->prepare("SELECT dia,   idunidade  FROM agendamento where idunidade = :idunidade   group by (dia) ");
            $stmt->execute(array('idunidade' => $idUnidade));
            $datasDisponiveis = $stmt->fetchAll();



            return $datasDisponiveis;
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
