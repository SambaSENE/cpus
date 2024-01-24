<?php

use App\Models\Connexion;

 require "Connexion.php";
class CpuModel
{
    protected $maTable;

    public function  __construct($_maTable)
    {
        $this->maTable = $_maTable;
    }


    public function getCPU() : array
    {
        $connexion = Connexion::getInstance();

        $rq = "SELECT *  FROM " . $this->maTable;
        $states = $connexion->prepare($rq);
        $states->execute();
        $cpuData = $states->fetchAll();

        return $cpuData;
    }

    public function create($_famille , $_modele , $_frequence) : void
    {
        $connexion = Connexion::getInstance();
        $rq = "INSERT INTO $this->maTable VALUES(cpu_id , :family , :model , :frequence)";
        $states = $connexion->prepare($rq);
        $states->bindParam(":family" , $_famille , PDO::PARAM_STR);
        $states->bindParam(":model" , $_modele , PDO::PARAM_STR);
        $states->bindParam(":frequence" , $_frequence , PDO::PARAM_INT);

        $states->execute();
     

    }
}