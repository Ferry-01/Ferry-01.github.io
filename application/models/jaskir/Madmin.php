<?php

class Madmin extends CI_Model
{
    public function get_ongkir()
    {
        $q = $this->db->query("SELECT b.idBiayaKirim, r.namaKurir, k.namaKota AS asal, t.namaKota 
        AS tujuan, b.biaya FROM tbl_biaya_kirim b 
        JOIN tbl_kota k ON b.idKotaAsal=k.idKota JOIN tbl_kota t ON b.idKotaTujuan=t.idKota 
        JOIN tbl_kurir r ON b.idKurir=r.idKurir");
        return $q;
    }

    public function cek_kota($id)
    {
        $q = $this->db->query("SELECT * FROM tbl_biaya_kirim WHERE idKotaAsal='$id' OR idKotaTujuan='$id'");
        return $q;
    }

    public function cek_kurir($id)
    {
        $q = $this->db->query("SELECT * FROM tbl_biaya_kirim WHERE idKurir='$id'");
        return $q;
    }

    public function cek_duplikat_ongkir($asal, $tujuan, $kurir)
    {
        $q = $this->db->query("SELECT * FROM tbl_biaya_kirim WHERE idKotaAsal='$asal' AND idKotaTujuan='$tujuan' AND idKurir='$kurir'");
        return $q;
    }
}
