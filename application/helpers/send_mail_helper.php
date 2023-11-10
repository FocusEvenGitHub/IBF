<?php


if (!defined('BASEPATH'))
	exit('Nenhum acesso de script direto permitido');

if (!defined('E_MAIL_SUPRA_DIR_CONSTRUCAO'))
	define('E_MAIL_SUPRA_DIR_CONSTRUCAO', "supra.construcao@dnit.gov.br");

if (!defined('E_MAIL_SUPRA_DIR_MANUTENCAO'))
	define('E_MAIL_SUPRA_DIR_MANUTENCAO', "supra.manutencao.gov.br");

if (!defined('E_MAIL_SUPRA_DIR_OPERACOES'))
	define('E_MAIL_SUPRA_DIR_OPERACOES', "supra.operacoes.gov.br");

if (!defined('E_MAIL_SUPRA_DAQ'))
	define('E_MAIL_SUPRA_DAQ', "diretoria.aquaviaria@dnit.gov.br");

if (!defined('E_MAIL_SUPRA_DIF_CGOFER'))
	define('E_MAIL_SUPRA_DIF_CGOFER', "cgofer@dnit.gov.br");

if (!defined('E_MAIL_SUPRA_DAF'))
	define('E_MAIL_SUPRA_DAF', "supra.daf@dnit.gov.br");


if (!function_exists('sendMail')) {

	/**
	 * Função que envia e-mail através dos e-mail´s do supra.
	 * @access public 
	 * @author Rodolfo Romão <rodolforomao@gmail.com>
	 * @version 0.1 
	 * @copyright  GPL © 2022. 
	 * @param 
	 * @return 
	 */
	function sendMail($emailFrom = null, $emailTo = null, $subject = null, $message = null, $attachedFiles = null, $emailBcc = null)
	{
		$emailBcc = checkEmailBcc($emailBcc);

		$CI = &get_instance();
		$CI->load->library('email');

		$CI->email = configureEmailPlugin($CI->email);
		//        $config = array();
		//        $config['protocol'] = 'smtp';
		//        $config['smtp_host'] = 'appgw.intra.dnit';
		//        $config['smtp_port'] = 25;
		//        $config['charset'] = 'utf-8';
		//        //$config['wordwrap'] = true;
		//        $config['mailtype'] = 'html';
		//        $config['crlf'] = "\r\n";
		//        
		//        $CI->email->initialize($config);
		//        $CI->email->set_newline("\r\n");
		//        $CI->email->set_crlf("\r\n" );
		//        //$CI->email->set_header('Content-Type', 'text/html');

		$CI->email->from($emailFrom, 'Sistema Supra - DNIT');
		$CI->email->to($emailTo);
		$CI->email->bcc($emailBcc);
		$CI->email->subject($subject);
		$CI->email->message($message);

		if (!empty($attachedFiles)) {
			foreach ($attachedFiles as $item) {
				$CI->email->attach($item, "inline");
			}
		}

		$response = $CI->email->send(false);

		if (!$response) {
			$error = $CI->email->print_debugger();
			return false;
		}
		
		return true;
	}

	function configureEmailPlugin($email)
	{
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'appgw.intra.dnit';
		$config['smtp_port'] = 25;
		$config['charset'] = 'utf-8';
		//$config['wordwrap'] = true;
		$config['mailtype'] = 'html';
		$config['crlf'] = "\r\n";

		$email->initialize($config);
		$email->set_newline("\r\n");
		$email->set_crlf("\r\n");
		return $email;
	}

	function checkEmailBcc($emailBcc)
	{
		$CI = &get_instance();
		$CI->load->model('Tb_email_cadastrado');
		$arrayAdmins = $CI->Tb_email_cadastrado->recuperarBcc();
		if (empty($emailBcc)) {
			$emailBcc = $arrayAdmins;
		} else {
			if (is_array($emailBcc)) {
				$emailBcc = array_merge($emailBcc, $arrayAdmins);
			} else {
				$emailBccBackup = $emailBcc;
				$emailBcc = null;
				$emailBcc[] = $emailBccBackup;
				foreach ($arrayAdmins as $email) {
					$emailBcc[] = $email;
				}
			}
		}
		return $emailBcc;
	}
}
