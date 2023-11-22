<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeuserctr extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Tb_usuario');
		$this->load->helper('url');
        $this->load->library('session');
		if (!$this->session->userdata('id_usuario')) {
			// Se o usuário não estiver logado, redirecionar para a página de login
			redirect('login');
		}
	}
    public function index(){
		$view['scripts_header'][] = base_url('assets/plugins/jQuery/jquery-3.7.1.js'); 
		$view['scripts_header'][] = base_url('assets/plugins/notify/notify.min.js'); // or notify.js
        $view['scripts_header'][] = base_url('assets/js/home_user/home_user.js');

		$view['links_header'][] = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css';
		$view['links_header'][] = base_url ('assets/css/main/font.css' );
		$view['links_header'][] = base_url ('assets/css/main/home.css' );
		$view['links_header'][] = base_url ('assets/css/user/homeUser.css' );

		$view["title"] = "Início";
        $this->load->view('home/aside', $view);
        $this->load->view('home_user/main_home', $view);
    }
	public function ministerios(){
		$view['scripts_header'][] = base_url('assets/plugins/jQuery/jquery-3.7.1.js'); 
		$view['scripts_header'][] = base_url('assets/plugins/notify/notify.min.js'); // or notify.js
        $view['scripts_header'][] = base_url('assets/js/home_user/ministerios.js');

		$view['links_header'][] = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css';
		$view['links_header'][] = base_url ('assets/css/main/font.css' );
		$view['links_header'][] = base_url ('assets/css/main/home.css' );
		$view['links_header'][] = base_url ('assets/css/user/homeUser.css' );

		$view["title"] = "Ministérios";
        $this->load->view('home/aside', $view);
        $this->load->view('home_user/ministerios', $view);
    }
}