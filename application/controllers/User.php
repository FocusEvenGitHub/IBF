<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('form');
    }

    public function index() {
        $data['users'] = $this->user_model->get_users();
        $this->load->view('users/index', $data);
    }

    public function create() {
        $this->load->view('users/create');
    }

    public function store() {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->user_model->create_user($data);
        redirect('users');
    }

    public function edit($id) {
        $data['user'] = $this->user_model->get_user_by_id($id);
        $this->load->view('users/edit', $data);
    }

    public function update($id) {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email')
        );
        $this->user_model->update_user($id, $data);
        redirect('users');
    }

    public function delete($id) {
        $this->user_model->delete_user($id);
        redirect('users');
    }
}
