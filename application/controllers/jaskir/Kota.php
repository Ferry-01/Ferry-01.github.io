<?php
class Kota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('jaskir/K_crud');
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
        $data['kota'] = $this->K_crud->get_all_data('tbl_kota')->result();
        $this->template->load('layout_admin', 'admin/kota/index', $data);
    }

    public function add()
    {
        $this->template->load('layout_admin', 'admin/kota/form_add');
    }

    public function save()
    {
        $namaKota = $this->input->post('namaKota');
        $dataInsert = array('namaKota' => $namaKota);
        $this->K_crud->insert('tbl_kota', $dataInsert);
        $this->session->set_flashdata('pesan', 'Data Kota Berhasil Ditambahkan');
        redirect('jaskir/kota');
    }

    public function getid($id)
    {
        $datawhere = array('idKota' => $id);
        $data['kota'] = $this->K_crud->get_by_id('tbl_kota', $datawhere)->row_object();
        $this->template->load('layout_admin', 'admin/kota/form_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $namaKota = $this->input->post('namaKota');
        $dataUpdate = array('namaKota' => $namaKota);

        $this->K_crud->update('tbl_kota', $dataUpdate, 'idKota', $id);
        redirect('jaskir/kota');
    }

    public function hapus($id)
    {
        $count_kota = $this->Madmin->cek_kota($id)->num_rows();
        if ($count_kota > 0) {
            $this->session->set_flashdata('pesan', 'Data Kota Tidak Boleh Dihapus');
            redirect('jaskir/kota');
        } else {
            $datawhere = array('idKota' => $id);
            $data['kota'] = $this->K_crud->hapus_data($datawhere, 'tbl_kota');
            $this->session->set_flashdata('pesan', 'Data Kota Berhasil Dihapus');
            redirect('jaskir/kota');
        }
    }
}
