<?php

class TypeProduct
{
    protected $db;

    public function __construct($dbh)
    {
        $this->db = $dbh;
    }

    public function typeProductInsert($tipe)
    {
        $stmt = $this->db->prepare("INSERT INTO tipe_pakaian (tipe) 
        VALUES (:tipe)");

        $stmt->bindParam(':tipe', $tipe);

        return $stmt->execute();
    }

    public function typeProductUpdate($id, $tipe)
    {
        $stmt = $this->db->prepare("UPDATE tipe_pakaian SET tipe=:tipe WHERE id=:id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tipe', $tipe);

        return $stmt->execute();
    }

    public function typeProductDelete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM tipe_pakaian WHERE id = :id");
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM tipe_pakaian ORDER BY id DESC");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tipe_pakaian WHERE id=:id");

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
