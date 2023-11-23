<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homectr extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Tb_usuario');
		$this->load->helper('url');
        $this->load->library('session');
	}
    public function index(){
        $view['scripts_header'][] = base_url('assets/plugins/jQuery/jquery-3.7.1.js'); 
		$view['scripts_header'][] = base_url('assets/plugins/notify/notify.min.js'); 
    
        $this->load->view('home/header', $view);
        $this->load->view('homeInicial');
    }
    public function home_convidado(){
        $this->load->view('homeInicial');
	}
    public function login(){
        $view['scripts_header'][] = base_url('assets/plugins/jQuery/jquery-3.7.1.js'); 
		$view['scripts_header'][] = base_url('assets/plugins/notify/notify.min.js'); 
    
        $this->load->view('home/header', $view);
        $this->load->view('login');
	}
	public function valida_login(){
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData);

        $email = $data->email;
        $senha = $data->senha;
		// $email = $this->input->post('email');
        // $senha = $this->input->post('senha');
        $retorno = $this->Tb_usuario->validar_login($email, md5($senha)); 
       
        // $retorno = json_decode($retorno, true);
        if (!empty($retorno)) {
            foreach ($retorno as $r) {
                $ipUsuario = getenv("REMOTE_ADDR");
                $nome = $r->nome;
                $email = $r->email;
                $id_usuario = $r->id_usuario;
            }
        } else {
            $nome = "";
            $email = "";
            $id_usuario = "";
        }
        if (empty($id_usuario) or empty($email)) {
            $retorno = 3218181;
        } else {
            $log = array(
                'nome' => $nome,
                'email' => $email,
                'id_usuario' => $id_usuario,
            );
            $this->session->set_userdata($log);
        }

        die (json_encode($retorno, true));
	}
    public function ajax_redirect($location = '') { 
        // $this->load->model("Tb_usuario");

        // $retorno = $this->Tb_usuario->recuperaUsuarioSessao();

        // if (empty($retorno)) {
        //     $this->Tb_usuario->iniciaSessaoInsert();
        // } else {
        //     foreach ($retorno as $r) {
        //         $dados["data"] = date('Y-m-d\TH:i:s', $r->timestamp);
        //     }
        //     $this->Tb_usuario->finalizaSessao($dados);
        //     $this->Tb_usuario->iniciaSessaoUpdate();
        // }

        $location = $this->input->post('location'
                . '');
        $location = empty($location) ? '/' : $location;
        if (strpos($location, '/') !== 0 || strpos($location, '://') !== false) {
            if (!function_exists('base_url')) {
                $this->load->helper('url');
            }

            $location = base_url($location);
        }
        $script = "window.location='{$location}';";
        $this->output->enable_profiler(false)
                ->set_content_type('application/x-javascript')
                ->set_output($script);
    }
    public function logout() {
        if(!empty($this->session->id_usuario)){
            $dados["data"] = date('Y-m-d\TH:i:s');
            $this->Tb_usuario->finalizaSessao($dados);
            $this->session->sess_destroy();
        }
        redirect(base_url());
    }
}