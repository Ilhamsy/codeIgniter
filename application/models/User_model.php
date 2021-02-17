<?php
class User_model extends CI_Model {
    public function register() {
        $data=[
            'name'=>$this->input->post('name',TRUE),
            'email'=>$this->input->post('email',TRUE),
            'password'=>password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'is_active'=>1,
            'date_created'=>time()
        ];
        $this->db->insert('user',$data);
    }

    public function getUserByEmail($email) {
        return $this->db->get_where('user',['email'=>$email])->row_array();
    }
}