<?php

SESSION_start();

class DBNamety
{
    private $user = "root";
    private $pass = "dtb456";
    private $db = "namety";
    private $host = "localhost";

    /**
     * @var PDO
     */
    private $pdo;
   public function __construct()
   {
       $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass, [
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]);
   }


    /**
     * @return Namet[]
     */
    public function LoadAll()
    {
        $result=[];

        $res = $this->pdo->query("SELECT * FROM namety");

        foreach ($res as $namet) {
            $result[] = new Namet( $namet['produkt'], $namet['popis'], $namet['cena']);
        }

        return $result;
    }


    public function createNamet($produkt, $popis, $cena) {
        $namet = new Namet($produkt, $popis, $cena);
        $this->saveNamet($namet);
        $SESSION['message'] = "Údaje boli uložené";
        $SESSION['msg_type'] = "success";
        header('location: namety.php');
    }


    public function saveNamet(Namet $namet)
    {
        $statement = $this->pdo->prepare("INSERT INTO namety (produkt, popis, cena) value (?,?,?)");
        $statement->execute([$namet->getProdukt(), $namet->getPopis(), $namet->getCena()]);

    }

    public function delete()
    {
        if( isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $this->pdo->query("DELETE FROM namety WHERE id=$id");
            $SESSION['message'] = "Údaje boli zmazané";
            $SESSION['msg_type'] = "danger";
            header('location: namety.php');
        }
    }

    public function edit()
    {
        if(isset($_GET['edit'])){
            $id = $_GET['id'];
            $result = $this->pdo("SELECT * FROM namety WHERE id=$id");
            if(count($result)==1) {

            }
        }
    }

}