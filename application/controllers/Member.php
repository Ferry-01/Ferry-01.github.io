<?php
class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mem_crud');
        $this->cek_login();
    }

    public function cek_login()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('home');
        }
    }
    public function index()
    {
        $data['member'] = $this->Mem_crud->get_all_data('tbl_member')->result();
        $this->template->load('layout_admin', 'admin/member/index', $data);
    }
    public function aktif($id)
    {
        $dataUpdate = array('statusAktif' => 'Y');
        $this->Mem_crud->update('tbl_member', $dataUpdate, 'idKonsumen', $id);
        redirect('member');
    }
    public function non_aktif($id)
    {
        $dataUpdate = array('statusAktif' => 'N');
        $this->Mem_crud->update('tbl_member', $dataUpdate, 'idKonsumen', $id);
        redirect('member');
    }
}
