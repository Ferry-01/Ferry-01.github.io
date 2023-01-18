<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('userName')) {
            redirect('Adminpanel/dahsboard');
        }

        $this->form_validation->set_rules('username', 'username', 'trim|required', [
            'required' => 'The Username field must contain a valid Username'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->session->set_flashdata('pesan', validation_errors());
            $this->load->view('admin/form_login', $data);
        } else {
            $this->aksi_login();
        }
    }

    public function aksi_login()
    {
        $this->load->model('Mlogin');
        $u = $this->input->post('username');
        $p = $this->input->post('password');
        $z = $this->input->post('LevelAdmin');

        $cek = $this->Mlogin->cek_login($u, $p, $z)->num_rows();

        if ($cek == 1) {
            $data_session = [
                'userName' => $u,
                'status' => 'Login',
            ];
            $this->session->set_userdata($data_session);
            if ($z == "A") {
                redirect('adminpanel/dashboard');
            } elseif ($z == "B") {
                redirect('adminpanel/dashboard2');
            }
        } else {
            redirect('adminpanel');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('adminpanel');
    }
}
