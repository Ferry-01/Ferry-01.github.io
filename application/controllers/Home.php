<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mfrontend');
        $this->load->model('M_member');
        $this->load->model('Mtoko');
        $this->load->model('jaskir/Madmin');
    }

    public function index()
    {

        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk_terbaru'] = $this->Mfrontend->get_all_produk_terbaru()->result();
        $data['produk'] = $this->Mfrontend->get_all_produk()->result();
        $this->template->load('layout_frontend', 'frontend/home', $data);
    }

    public function register()
    {
        $data['kota'] = $this->Mfrontend->get_all_kota()->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/register', $data);
    }

    public function act_reg()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['kota'] = $this->Mfrontend->get_all_kota()->result();
            $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
            $this->template->load('layout_frontend', 'frontend/register', $data);
        } else {
            $nama   = $this->input->post('nama');
            $email   = $this->input->post('email');
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $password_confirm   = $this->input->post('password_confirm');
            $alamat   = $this->input->post('alamat');
            $kota   = $this->input->post('kota');
            $no_telp   = $this->input->post('no_telp');
            $dataInsert = array(
                'namaKonsumen' => $nama,
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'alamat' => $alamat,
                'idKota' => $kota,
                'tlpn' => $no_telp,

            );
            $this->Mfrontend->insert('tbl_member', $dataInsert);
            $this->session->set_flashdata('pesan', 'Selamat Anda Telah Berhasil Mendaftar Sebagai Member. Silahkan Login Menggunakan Username Dan Password Yang Telah Terdaftar');
            redirect('home/login');
        }
    }

    public function see_more($idProduk)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk'] = $this->Mtoko->get_produk_by_idProduk($idProduk)->row_object();
        $data['dproduk'] = $this->Mtoko->get_dproduk_by_idProduk($idProduk)->row_object();
        $data['ongkir'] = $this->Madmin->get_ongkir()->result();
        $this->template->load('layout_frontend', 'frontend/see_more', $data);
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['produk'] = $this->Mfrontend->get_keyword($keyword);
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/search', $data);
    }

    public function login()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/login', $data);
    }

    public function act_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

        if ($this->form_validation->run() == FALSE) {
            $data['kota'] = $this->Mfrontend->get_all_kota()->result();
            $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
            $this->template->load('layout_frontend', 'frontend/login', $data);
        } else {
            $this->load->model('M_Member');
            $u = $this->input->post('username');
            $p = $this->input->post('password');

            $cek = $this->M_Member->cek_login($u, $p)->num_rows();
            $result = $this->M_Member->cek_login($u, $p)->result();


            if ($cek == 1) {
                $data_session = [
                    'username' => $u,
                    'id' => $result[0]->idKonsumen,
                    'status' => 'Login',
                ];

                $this->session->set_userdata($data_session);
                redirect('home');
            } else {
                $this->session->set_flashdata('pesan_salah', 'Username / Password Tidak Sesuai');
                redirect('home/login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
