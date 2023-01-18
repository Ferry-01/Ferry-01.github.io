<?php

class Mfrontend extends CI_Model
{
    public function get_all_kategori()
    {
        return $this->db->get('tbl_kategori');
    }

    public function get_all_kota()
    {
        return $this->db->get('tbl_kota');
    }

    public function get_all_toko()
    {
        return $this->db->get('tbl_toko');
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get_all_produk_terbaru()
    {
        $this->db->order_by('idProduk', 'DESC');
        $this->db->limit(4);
        return $this->db->get('tbl_produk');
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->like('namProduk', $keyword);
        return $this->db->get()->result();
    }

    public function get_all_produk()
    {
        return $this->db->get('tbl_produk');
    }
}
