<?php

class Order
{
    protected $db;

    public function __construct($dbh)
    {
        $this->db = $dbh;
    }

    public function orderInsert($pakaian_id, $quantity, $nama, $alamat)
    {
        $stmt = $this->db->prepare("INSERT INTO pesanan (tanggal,pakaian_id,quantity,nama,alamat) 
        VALUES (:tanggal,:pakaian_id,:quantity,:nama,:alamat)");

        $stmt->bindParam(':tanggal', date('Y-m-d'));
        $stmt->bindParam(':pakaian_id', $pakaian_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);

        return $stmt->execute();
    }

    public function orderUpdate($id, $tanggal, $pakaian_id, $quantity, $nama, $alamat)
    {
        $stmt = $this->db->prepare("UPDATE FROM pesanan SET tanggal=:tanggal, pakaian_id=:pakaian_id, quantity=:quantity, nama=:nama,alamat=:alamat WHERE id=:id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':pakaian_id', $pakaian_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);

        return $stmt->execute();
    }

    public function orderDelete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM pesanan WHERE id = :id");
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT pesanan.id, pesanan.tanggal, pesanan.pakaian_id, pesanan.quantity, pesanan.nama, pesanan.alamat, pakaian.nama AS pakaian FROM pesanan INNER JOIN pakaian ON pesanan.pakaian_id = pakaian.id ORDER BY pesanan.id DESC");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT pesanan.id, pesanan.tanggal, pesanan.pakaian_id, pesanan.quantity, pesanan.nama, pesanan.alamat FROM pesanan INNER JOIN pakaian ON pesanan.pakaian_id = pakaian.id WHERE id=:id");

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
