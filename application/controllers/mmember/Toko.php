<?php

class Toko extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mfrontend');
        $this->load->model('Mtoko');
        $this->load->model('Mcrud');
        $this->cek_login();
    }

    public function cek_login()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('home');
        }
    }

    public function main($idToko)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $this->template->load('layout_frontend', 'frontend/toko_home', $data);
    }

    public function produk($idToko)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $data['produk'] = $this->Mtoko->get_produk_by_toko($idToko)->result_array();
        $this->template->load('layout_frontend', 'frontend/toko_produk', $data);
    }

    public function create_produk($idToko)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $data['idToko'] = $idToko;
        $this->template->load('layout_frontend', 'frontend/form_create_produk', $data);
    }

    public function insert_produk()
    {
        $this->form_validation->set_rules('namaProduk', 'Nama Produk', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga Produk', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok Produk', 'trim|required');
        $this->form_validation->set_rules('berat', 'Berat Produk', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('foto_produk', 'Foto Produk', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $idToko = $this->input->post('idToko');
            $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
            $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
            //$data['idToko'] = $idToko;
            //$this->template->load('layout_frontend', 'frontend/form_create_produk/' . $idToko);
            $this->session->set_flashdata('warning', validation_errors());
            redirect('mmember/toko/create_produk/' . $idToko);
        } else {
            $idKat = $this->input->post('kategori');
            $idToko = $this->input->post('idToko');
            $namProduk = $this->input->post('namaProduk');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $berat = $this->input->post('berat');
            $deskripsiProduk = $this->input->post('deskripsi');

            //bagian ini buat upload file, untuk isi nya tinggal menyesuaikan
            //Lokasi nyimpan file nya .(itu folder coding mu)/upload_produk(nama folder tempat 
            //kau nyimpan filenya)
            $config['upload_path'] = './upload_produk/';
            //tipe yang diizinkan
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_produk')) { //foto_produk adalah nama dari input yang ada di view
                $data_file = $this->upload->data();
                $data_insert = array(
                    'idKat'      => $idKat,
                    'idToko'      => $idToko,
                    'namProduk'      => $namProduk,
                    'harga'      => $harga,
                    'stok'      => $stok,
                    'berat'      => $berat,
                    'foto'          => $data_file['file_name'],
                    'deskripsiProduk'      => $deskripsiProduk
                );
                $this->Mtoko->insert_produk($data_insert);
                $this->session->set_flashdata('berhasil', 'Produk Berhasil Ditambah');
                redirect('mmember/toko/produk/' . $idToko);
            } else {
                redirect('mmember/toko/create_produk/' . $idToko);
            }
            //Sampe sini
        }
    }

    public function detail()
    {
    }

    public function edit_produk($idToko, $idProduk)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $data['produk'] = $this->Mtoko->get_produk_by_idProduk($idProduk)->row_object();
        $this->template->load('layout_frontend', 'frontend/edit_produk', $data);
    }

    public function save_edit_produk()
    {
        $idProduk = $this->input->post('idProduk');
        $idKat = $this->input->post('kategori');
        $idToko = $this->input->post('idToko');
        $namProduk = $this->input->post('namaProduk');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $berat = $this->input->post('berat');
        $deskripsiProduk = $this->input->post('deskripsi');

        $config['upload_path'] = './upload_produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_produk')) {
            $data_file = $this->upload->data();
            $dataUpdate = array(
                'idKat'      => $idKat,
                'idToko'      => $idToko,
                'namProduk'      => $namProduk,
                'harga'      => $harga,
                'stok'      => $stok,
                'berat'      => $berat,
                'foto'          => $data_file['file_name'],
                'deskripsiProduk'      => $deskripsiProduk

            );
            $this->Mtoko->update_produk($idProduk, $dataUpdate);
            redirect('mmember/toko/produk/' . $idToko);
        } else {
            redirect('mmember/toko/edit_produk/' . $idToko . '/' . $idProduk);
        }
    }

    public function delete_produk($idProduk, $idToko)
    {
        $data['idToko'] = $idToko;
        $datawhere = array('idProduk' => $idProduk);
        $data['produk'] = $this->Mtoko->hapus_data($datawhere, 'tbl_produk');
        $this->session->set_flashdata('hapus', 'Produk Berhasil Dihapus');
        redirect('mmember/toko/produk/' . $idToko);
    }

    public function transaksi($idToko)
    {
        $data['transaksi'] = $this->Mtoko->get_transaksi_by_toko($idToko)->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $this->template->load('layout_frontend', 'frontend/toko_transaksi', $data);
    }

    public function invoice($idToko, $idOrder)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $data['invoice'] = $this->Mtoko->invoice($idOrder)->result();
        $this->template->load('layout_frontend', 'frontend/toko_invoice', $data);
    }
}
