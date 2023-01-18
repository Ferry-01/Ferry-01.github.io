<?php
class Kurir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('jaskir/Kur_crud');
        $this->load->model('jaskir/Madmin');
        $this->cek_login();
    }

    public function cek_login()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
    }
    public function index()
    {
        $data['kurir'] = $this->Kur_crud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/kurir/index', $data);
    }

    public function add()
    {
        $this->template->load('layout_admin', 'admin/kurir/form_add');
    }

    public function save()
    {
        $namaKurir = $this->input->post('namaKurir');
        $dataInsert = array('namaKurir' => $namaKurir);
        $this->Kur_crud->insert('tbl_kurir', $dataInsert);
        $this->session->set_flashdata('pesan', 'Data Kota Berhasil Ditambahkan');
        redirect('jaskir/kurir');
    }

    public function getid($id)
    {
        $datawhere = array('idKurir' => $id);
        $data['kurir'] = $this->Kur_crud->get_by_id('tbl_kurir', $datawhere)->row_object();
        $this->template->load('layout_admin', 'admin/kurir/form_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $namaKurir = $this->input->post('namaKurir');
        $dataUpdate = array('namaKurir' => $namaKurir);

        $this->Kur_crud->update('tbl_kurir', $dataUpdate, 'idKurir', $id);
        redirect('jaskir/kurir');
    }

    public function hapus($id)
    {
        $count_kota = $this->Madmin->cek_kurir($id)->num_rows();
        if ($count_kota > 0) {
            $this->session->set_flashdata('pesan', 'Data Kota Tidak Boleh Dihapus');
            redirect('jaskir/kota');
        } else {
            $datawhere = array('idKurir' => $id);
            $data['kurir'] = $this->Kur_crud->hapus_data($datawhere, 'tbl_kurir');
            $this->session->set_flashdata('pesan', 'Data Kota Berhasil Dihapus');
            redirect('jaskir/kurir');
        }
    }
}
