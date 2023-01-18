<?php

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mfrontend');
        $this->load->model('M_member');
        $this->load->library('cart');
        $this->cek_login();
    }

    public function cek_login()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('home/login');
        }
    }

    public function index()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/member', $data);
    }

    public function transaksi()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['jml_trans_bb'] = $this->M_member->jml_transaksi_belum_bayar();
        $data['transaksi'] = $this->M_member->get_trans_by_konsumen()->result();
        $this->template->load('layout_frontend', 'frontend/transaksi', $data);
    }

    public function toko()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['toko'] = $this->M_member->get_toko_by_member()->result_array();

        $this->template->load('layout_frontend', 'frontend/toko', $data);
    }

    public function create_toko()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/form_create_toko', $data);
    }

    public function insert_toko()
    {
        $id = $this->session->userdata('id');
        $nama_toko = $this->input->post('nama_toko');
        $deskripsi = $this->input->post('deskripsi');

        $config['upload_path'] = './upload_logo_toko/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo_toko')) {
            $data_file = $this->upload->data();
            $data_insert = array(
                'idKonsumen'    => $id,
                'namaToko'      => $nama_toko,
                'logo'          => $data_file['file_name'],
                'deskripsi'     => $deskripsi,
                'statusAktif'   => 'Y'
            );
            $this->M_member->insert_toko($data_insert);
            redirect('mmember/member/toko');
        } else {
            redirect('mmember/member/create_toko');
        }
    }

    public function add_wishlist($idProduk)
    {
        $status = $this->session->userdata('username');
        if (empty($status)) {
            redirect('home/login');
        } else {
            $id = $this->session->userdata('id');
            $this->M_member->get_produk_by_id($idProduk)->row_object();
            $data_insert = array(
                'idKonsumen'    => $id,
                'idProduk'      => $idProduk
            );
            $this->M_member->insert_wishlist($data_insert);
            redirect('mmember/member/wishlist');
        }
    }

    public function wishlist()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['wishlist'] = $this->M_member->get_wishlist_by_member()->result_object();
        $this->template->load('layout_frontend', 'frontend/wishlist_produk', $data);
    }

    public function delete_wishlist($idProduk)
    {
        $datawhere = array('idProduk' => $idProduk);
        $data['produk'] = $this->M_member->hapus_data($datawhere, 'tbl_wishlist');
        redirect('mmember/member/wishlist');
    }

    public function cart_tambah($idProduk)
    {
        $status = $this->session->userdata('username');
        if (empty($status)) {
            redirect('home/login');
        } else {
            $jml_keranjang = count($this->cart->contents());
            if (empty($jml_keranjang)) {
                $data_produk = $this->M_member->get_produk_by_id($idProduk)->row_object();

                $insert_cart = array(
                    'id' => $idProduk,
                    'idToko' => $data_produk->idToko,
                    'name' => $data_produk->namProduk,
                    'price' => $data_produk->harga,
                    'gambar' => $data_produk->foto,
                    'qty'  => 1
                );

                $this->cart->insert($insert_cart);
                redirect('mmember/member/keranjang');
            } else {
                $idToko = '';
                if ($cart = $this->cart->contents()) {
                    foreach ($cart as $item) {
                        $idToko = $item['idToko'];
                    }
                }
                $data_produk = $this->M_member->get_produk_by_id($idProduk)->row_object();
                if ($idToko == $data_produk->idToko) {
                    $data_produk = $this->M_member->get_produk_by_id($idProduk)->row_object();

                    $insert_cart = array(
                        'id' => $idProduk,
                        'idToko' => $data_produk->idToko,
                        'name' => $data_produk->namProduk,
                        'price' => $data_produk->harga,
                        'gambar' => $data_produk->foto,
                        'qty'  => 1
                    );

                    $this->cart->insert($insert_cart);
                    redirect('mmember/member/keranjang');
                } else {
                    echo "Barang Harus dari Toko Yang Sama";
                }
            }
        }
    }

    public function hapus_cart($rowid)
    {
        $data_hapus = array('rowid' => $rowid, 'qty' => 0);
        $this->cart->update($data_hapus);
        redirect('mmember/member/keranjang');
    }

    public function keranjang()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/keranjang', $data);
    }

    public function selesai_belanja()
    {
        $idToko = '';
        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $idToko = $item['idToko'];
            }
        }

        $data_pembeli = array(
            'idKonsumen' => $this->session->userdata('id'),
            'tglOrder' => date('y-m-d'),
            'idToko'   => $idToko,
            'statusOrder' => 'Belum Bayar'
        );
        $idTerakhir = $this->M_member->insert_order($data_pembeli);

        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $data_detail = array(
                    'idOrder' => $idTerakhir,
                    'idProduk' => $item['id'],
                    'jumlah' => $item['qty'],
                    'harga' => $item['price']
                );
                $this->M_member->insert_detail_order($data_detail);
            }
        }
        $this->cart->destroy();
        redirect('mmember/member/transaksi');
    }
}
