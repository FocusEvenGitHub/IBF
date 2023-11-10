<?php

if (!function_exists('initialize_gestao_demandas_db_object')) {
	//$ci = get_instance();
	//$ci->load->helper('verify_key_exists_and_return_identity_value');

	/**
	 * Retorna o banco de dados conforme instancia
	 * @access public 
	 * @author Rodolfo Romão <rodolforomao@gmail.com>
	 * @version 0.1 
	 * @copyright  GPL © 2020. 
	 * @param $this da model
	 * @return Retorna o valor ou o erro.
	 */
	function initialize_gestao_demandas_db_object($ci)
	{
		$db = null;

		if ($ci->session->DIRETORIA_DNIT == 'DIR') {
			if ($ci->session->COORDENACAO_DNIT == 'CGPERT') {
				$db = $ci->load->database('gestaoDemandasDirCgpert', true);
			} else {
				$db = $ci->load->database('gestaoDemandas', true);
			}
		} elseif ($ci->session->DIRETORIA_DNIT == 'DAF' || $ci->session->COORDENACAO_DNIT == 'CGLOG') {
			$db = $ci->load->database('gestaoDemandasDaf', true);
		} elseif ($ci->session->DIRETORIA_DNIT == 'DIF') {
			if ($ci->session->COORDENACAO_DNIT == 'COMAF' || $ci->session->COORDENACAO_DNIT == 'CONFER') {
				$db = $ci->load->database('gestaoDemandasDif', true);
			}
		}

		if (empty($db)) {
			$db = $ci->load->database('gestaoDemandas', true);
		}
		return $db;
	}

	/**
	 * Retorna o index do bacno de dados dentro do array de database.php
	 * @access public 
	 * @author Rodolfo Romão <rodolforomao@gmail.com>
	 * @version 0.1 
	 * @copyright  GPL © 2020. 
	 * @param $this da model
	 * @return Retorna o valor ou o erro.
	 */
	function get_name_index_db($ci)
	{
		$db = null;

		if ($ci->session->DIRETORIA_DNIT == 'DIR') {
			if ($ci->session->COORDENACAO_DNIT == 'CGPERT') {
				return 'gestaoDemandasDirCgpert';
			}
			return 'gestaoDemandas';
		} elseif ($ci->session->DIRETORIA_DNIT == 'DAF' || $ci->session->COORDENACAO_DNIT == 'CGLOG') {
			return 'gestaoDemandasDaf';
		} elseif ($ci->session->DIRETORIA_DNIT == 'DIF') {
			if ($ci->session->COORDENACAO_DNIT == 'COMAF' || $ci->session->COORDENACAO_DNIT == 'CONFER') {
				return 'gestaoDemandasDif';
			}
		}

		if (empty($db)) {
			$db = $ci->load->database('gestaoDemandas', true);
		}
		return $db;
	}
}
