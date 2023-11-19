<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeuserctr extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Tb_usuario');
		$this->load->helper('url');
        $this->load->library('session');
	}
    public function index(){
		$view['scripts_header'][] = base_url('assets/plugins/jQuery/jquery-3.7.1.js'); 
		$view['scripts_header'][] = base_url('assets/plugins/notify/notify.min.js'); // or notify.js
        $view['scripts_header'][] = base_url('assets/js/home_user/home_user.js');

		$view['links_header'][] = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css';


        $this->load->view('home/header', $view);
        $this->load->view('home_user/main_home', $view);
    }
}