<?php
class Toko extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_crud');
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
        $data['toko'] = $this->T_crud->get_all_data('tbl_toko')->result();
        $this->template->load('layout_admin', 'admin/toko/index', $data);
    }
    public function aktif($id)
    {
        $dataUpdate = array('statusAktif' => 'Y');
        $this->T_crud->update('tbl_toko', $dataUpdate, 'idToko', $id);
        redirect('toko');
    }
    public function non_aktif($id)
    {
        $dataUpdate = array('statusAktif' => 'N');
        $this->T_crud->update('tbl_toko', $dataUpdate, 'idToko', $id);
        redirect('toko');
    }
}
