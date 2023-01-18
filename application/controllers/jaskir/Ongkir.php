<?php
class Ongkir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('jaskir/O_crud');
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
        $data['ongkos'] = $this->Madmin->get_ongkir()->result();
        $this->template->load('layout_admin', 'admin/ongkir/index', $data);
    }

    public function add()
    {
        $data['ongkir'] = $this->O_crud->get_all_data('tbl_kota')->result();
        $data['kurir'] = $this->O_crud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/ongkir/form_add', $data);
    }

    public function save()
    {
        $kurir = $this->input->post('kurir');
        $asal = $this->input->post('asal');
        $tujuan = $this->input->post('tujuan');
        if ($asal == $tujuan) {
            $this->session->set_flashdata('pesan', 'Data Kota Asal dan Tujuan Tidak Boleh Sama !');
            redirect('jaskir/ongkir/add');
        } else {
            $count_duplikat_ongkir = $this->Madmin->cek_duplikat_ongkir($asal, $tujuan, $kurir)->num_rows();
            if ($count_duplikat_ongkir > 0) {
                $this->session->set_flashdata('pesan', 'Data Ongkir Sudah Tersedia');
                redirect('jaskir/ongkir/add');
            } else {
                $biaya = $this->input->post('biaya');
                $dataInsert = array(
                    'idKurir' => $kurir,
                    'idKotaAsal' => $asal,
                    'idKotaTujuan' => $tujuan,
                    'biaya' => $biaya
                );
                $this->O_crud->insert('tbl_biaya_kirim', $dataInsert);
                $this->session->set_flashdata('pesan', 'Data Ongkos Kirim Berhasil Ditambahkan');
                redirect('jaskir/ongkir');
            }
        }
    }

    public function getid($id)
    {
        $datawhere = array('idBiayaKirim' => $id);
        $data['ongkos'] = $this->O_crud->get_by_id('tbl_biaya_kirim', $datawhere)->row_object();
        $data['ongkir'] = $this->O_crud->get_all_data('tbl_kota')->result();
        $data['kurir'] = $this->O_crud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/ongkir/form_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $kurir = $this->input->post('kurir');
        $asal = $this->input->post('asal');
        $tujuan = $this->input->post('tujuan');
        $biaya = $this->input->post('biaya');
        $dataUpdate = array(
            'idKurir' => $kurir,
            'idKotaAsal' => $asal,
            'idKotaTujuan' => $tujuan,
            'biaya' => $biaya
        );

        $this->O_crud->update('tbl_biaya_kirim', $dataUpdate, 'idBiayaKirim', $id);
        redirect('jaskir/ongkir');
    }

    public function hapus($id)
    {
        $datawhere = array('idBiayaKirim' => $id);
        $data['ongkos'] = $this->O_crud->hapus_data($datawhere, 'tbl_biaya_kirim');
        redirect('jaskir/ongkir');
    }
}
