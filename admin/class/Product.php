<?php

class Product
{
    protected $db;

    public function __construct($dbh)
    {
        $this->db = $dbh;
    }

    public function productInsert($nama, $ukuran, $warna, $stok, $harga, $tipe_pakaian_id, $file)
    {

        $stmt = $this->db->prepare("INSERT INTO pakaian (nama,ukuran,warna,stok,harga,tipe_pakaian_id,image)
        VALUES (:nama,:ukuran,:warna,:stok,:harga,:tipe_pakaian_id,:image)");

        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':ukuran', $ukuran);
        $stmt->bindParam(':warna', $warna);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':tipe_pakaian_id', $tipe_pakaian_id);
        $stmt->bindParam(':image', $file['name']);

        move_uploaded_file($file['tmp_name'], UPLOADED_PATH . '../uploads/' . $file['name']);

        return $stmt->execute();
    }

    public function productUpdate($id, $nama, $ukuran, $warna, $stok, $harga, $tipe_pakaian_id, $file)
    {
        // Hapus file yang lama
        $old_image = $this->find($id)->image;

        // Perika ganti foto
        if ($file['error'] == 4) {
            $file['name'] = $old_image;
        }

        $stmt = $this->db->prepare("UPDATE pakaian SET nama=:nama, ukuran=:ukuran, warna=:warna, stok=:stok,harga=:harga,tipe_pakaian_id=:tipe_pakaian_id, image=:image WHERE id=:id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':ukuran', $ukuran);
        $stmt->bindParam(':warna', $warna);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':tipe_pakaian_id', $tipe_pakaian_id);
        $stmt->bindParam(':image', $file['name']);

        if ($file['error'] != 4) {
            move_uploaded_file($file['tmp_name'], UPLOADED_PATH . '../uploads/' . $file['name']);
            unlink(UPLOADED_PATH . '../uploads/' . $old_image);
        }

        return $stmt->execute();
    }

    public function productDelete($id)
    {
        // Hapus file gambar
        $image = $this->find($id)->image;

        $stmt = $this->db->prepare("DELETE FROM pakaian WHERE id = :id");
        $stmt->bindParam(':id', $id);
        unlink(UPLOADED_PATH . '../uploads/' . $image);
        return $stmt->execute();
    }

    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT pakaian.id, pakaian.nama, pakaian.ukuran, pakaian.warna, pakaian.stok, pakaian.harga, pakaian.image, tipe_pakaian.tipe FROM pakaian INNER JOIN tipe_pakaian ON pakaian.tipe_pakaian_id = tipe_pakaian.id ORDER BY pakaian.id DESC");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT pakaian.id, pakaian.nama, pakaian.ukuran, pakaian.warna, pakaian.stok, pakaian.harga, pakaian.image, tipe_pakaian.tipe, tipe_pakaian.id AS tipe_id FROM pakaian INNER JOIN tipe_pakaian ON pakaian.tipe_pakaian_id=tipe_pakaian.id WHERE pakaian.id=:id");

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
