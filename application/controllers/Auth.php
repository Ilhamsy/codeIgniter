<?php
class Auth extends CI_Controller {
    public function __construct() {
        Parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }
    public function index() {
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim|min_length[4]');
        if ($this->form_validation->run()==FALSE) {
            $data['judul']="Login Page";
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/templates/footer');
        } else {
            $this->_login();
        }
    }
    private function _login() {
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $user=$this->User_model->getUserByEmail($email);

        if ($user) {
            if ($user['is_active']==1) {
                if(password_verify($password, $user['password'])) {
                    $data=[
                        'email'=>$user['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message2','<small class="text-danger">Password Salah!</small>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message','<small class="text-danger">Email belum diaktivasi!</small>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message','<small class="text-danger">Email belum terdaftar!</small>');
            redirect('auth');
        }
    }
    public function logout() {
        $this->session->unset_userdata('email');
        redirect('home');
    }
    public function register() {
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[4]|matches[password2]', [
            'matches'=>'Password tidak cocok',
            'min_length'=>'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2','Confirm Password','required|matches[password1]');

        if ($this->form_validation->run()==FALSE) {
            $data['judul']="Register Page";
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/templates/footer');
        } else {
            $this->User_model->register();
            redirect('auth');
        }
    }
}