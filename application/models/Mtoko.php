<?php

class Mtoko extends CI_Model
{
    public function get_toko($idToko)
    {
        $q = $this->db->get_where('tbl_toko', array('idToko' => $idToko));
        return $q;
    }

    public function get_produk_by_toko($idToko)
    {
        $q = $this->db->get_where('tbl_produk', array('idToko' => $idToko));
        //$q = $this->db->query("SELECT tbl_toko.namaToko AS nama, tbl_toko.logo FROM tbl_produk JOIN tbl_toko ON tbl_produk.idToko=tbl_toko.idToko WHERE tbl_toko.idToko=tbl_produk.idToko");
        return $q;
    }

    public function get_produk_by_idproduk($idProduk)
    {
        $q = $this->db->get_where('tbl_produk', array('idProduk' => $idProduk));
        return $q;
    }

    public function get_dproduk_by_idproduk($idProduk)
    {
        $q = $this->db->query("SELECT t.namaToko, t.logo, p.idProduk FROM tbl_produk p JOIN tbl_toko t ON p.idToko=t.idToko WHERE p.idProduk=$idProduk");
        return $q;
    }

    public function get_transaksi_by_toko($idToko)
    {
        return $this->db->query("SELECT * FROM tbl_order o, tbl_member m WHERE o.idKonsumen=m.idKonsumen AND o.idToko=$idToko");
    }

    public function invoice($idOrder)
    {
        return $this->db->query("SELECT * FROM tbl_detail_order d, tbl_produk p WHERE d.idProduk=p.idProduk AND d.idOrder=$idOrder");
    }


    public function insert_produk($data)
    {
        $this->db->insert('tbl_produk', $data);
    }

    public function update_produk($id, $data)
    {
        $this->db->where('idProduk', $id);
        $this->db->update('tbl_produk', $data);
    }

    public function hapus_data($where, $tabel)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }
}
