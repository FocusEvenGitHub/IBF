<?php

if (!defined('FILE_LOG_EXECUTE')) {
	define('FILE_LOG_EXECUTE', 'logBackground.txt');
}

if (!defined('COMMAND_PHP')) {
	define('COMMAND_PHP', 'php');
}

if (!defined('OPERATION_SYSTEM_WINDOWS')) {
	define('OPERATION_SYSTEM_WINDOWS', 'windows');
}

if (!defined('OPERATION_SYSTEM_LINUX')) {
	define('OPERATION_SYSTEM_LINUX', 'linux');
}

if (!defined('COMMAND_BACKGROUND_LINUX')) {
	define('COMMAND_BACKGROUND_LINUX', '&');
}

if (!defined('COMMAND_TIMEOUT_LINUX')) {
	define('COMMAND_TIMEOUT_LINUX', 'timeout');
}

if (!defined('COMMAND_BACKGROUND_WINDOWS')) {
	define('COMMAND_BACKGROUND_WINDOWS', 'start /B');
}
if (!defined('COMMAND_BACKGROUND_WINDOWS_PARAM_2')) {
	define('COMMAND_BACKGROUND_WINDOWS_PARAM_2', 'r');
}

if (!defined('TIMEOUT_1_SECOND')) {
	define('TIMEOUT_1_SECOND', 1);
}
if (!defined('TIMEOUT_10_SECONDS')) {
	define('TIMEOUT_10_SECONDS', 10);
}
if (!defined('TIMEOUT_1_MINUTE')) {
	define('TIMEOUT_1_MINUTE', 60);
}

if (!function_exists('execute_background_process'))
{
    //$ci = get_instance();
    //$ci->load->helper('verify_key_exists_and_return_identity_value');

    /**
     * Função para executar processo em background no windows ou no linux
     * @access public 
     * @author Rodolfo Romão <rodolforomao@gmail.com>, Luiz Felipe <luiz.felipe.aguiar@hotmail.com>
     * @version 0.1 
     * @copyright  GPL © 2023. 
     * @param $parameters array com os seguintes parametros:
	 * 		0 - 'script_path' => 'endereço do script'
	 * 		1 - 'debug' => true/false - Este item irá imprimir o resultado da execução do script (Ero ou sucesso)
	 * 		2..N - 2..N => Parametros do script - Poderá passar quantos parametros quiser, estes serão passadaos para o script
	 * 
	 * @param $timeoutSeconds Passar timeout em segundos (se null o padrão será 1 minuto)
	 * 
	 * Exemplo:
	 * $parameters = array(
	 * 'script_path' => 'application/homeDir/homeCgcontCommon/models/homeCgcont/Cipi/backgroundCipi.php',
	 *					'debug' => true,
	 *					0 => $username,
	 *					1 => $password,
	 *					2 => $hostname,
	 *					3 => $port,
	 *					4 => $database,
	 *				);
	 * 
	 * 
	 * execute_background_process($parameters)  
	 * 			OU
	 * $timeoutInSeconds = 120;
	 * execute_background_process($parameters, $timeoutInSeconds)
	 * 
	 * Obs: O Timeout só funciona para o linux, não foi implementado para o windows.
	 * 
     * @return Retorna o PID do processo.
     */
    	 
	function execute_background_process($parameters, $timeoutSeconds = null)
    {
		if (ENVIRONMENT === 'production') {
			$parameters['debug'] = false;
		} 

		$pid = false;
		if(!empty($parameters))
		{
			$hasScript = false;
			$data = array();
			foreach($parameters as $key => $item)
			{
				if(stripos($key,'script') !== false)
				{
					$data['script_path'] = $item;
					$hasScript = true;
				}
				else if(stripos($key,'debug') !== false)
				{
					$data['debug'] = $item;		
				}else if(is_numeric($key))
				{
					$data[$key] = $item;		
				}
			}

			if($hasScript)
			{
				$pid = executeCommand($data, $timeoutSeconds);
			}
		}
		return $pid;
    }

	function executeCommand($data, $timeoutSeconds)
	{
		$url = "";
		$debug = false;
		$firstParameter = true;
		foreach($data as $key => $item)
		{
			if(stripos($key,'debug') === false)
			{
				if($firstParameter)
				{
					$url .= $item . " ";
				}
				else
				{
					if (getOperationSistem() == OPERATION_SYSTEM_LINUX){
						$url .= "'" . $item . "' ";
					}
					else{
						$url .= $item . " ";
					}
				}
				$firstParameter = false;
			}
			else
			{
				$debug = $item;
			}
		}

		if($debug)
		{
			file_put_contents(FILE_LOG_EXECUTE, "\nParameters:".print_r($data, true),FILE_APPEND);
			file_put_contents(FILE_LOG_EXECUTE, "\nTimeout:".print_r($timeoutSeconds, true),FILE_APPEND);
			file_put_contents(FILE_LOG_EXECUTE, "\n\tObs: If timeout == null: timeout = 10 seconds",FILE_APPEND);
		}

		if (getOperationSistem() == OPERATION_SYSTEM_LINUX) {
			if($debug)
			{
				file_put_contents(FILE_LOG_EXECUTE, "\nOperation System:".OPERATION_SYSTEM_LINUX,FILE_APPEND);
			}
			$background = "";
			if(empty($timeoutSeconds))
			{
				$timeoutSeconds = TIMEOUT_10_SECONDS;
				$background = COMMAND_TIMEOUT_LINUX . " " . $timeoutSeconds . " ";
			}
			else
			{
				$background = COMMAND_TIMEOUT_LINUX . " " . $timeoutSeconds . " ";	
			}
			$background .= COMMAND_PHP . " " . $url;
			if($debug)
			{
				exec($background . " >> ". FILE_LOG_EXECUTE ." " . COMMAND_BACKGROUND_LINUX);
			}
			else
			{
				exec($background . " " . COMMAND_BACKGROUND_LINUX);
			}
		} else if((getOperationSistem() == OPERATION_SYSTEM_WINDOWS))
		{
			if($debug)
			{
				file_put_contents(FILE_LOG_EXECUTE, "\nOperation System:".OPERATION_SYSTEM_WINDOWS,FILE_APPEND);
			}
			$background = COMMAND_PHP . " " . $url;
			pclose(popen( COMMAND_BACKGROUND_WINDOWS . " " . $background . "", COMMAND_BACKGROUND_WINDOWS_PARAM_2));
		}
		if($debug)
		{
			file_put_contents(FILE_LOG_EXECUTE, "\n".$background,FILE_APPEND);
		}
	}

	function getOperationSistem()
	{
		if (stripos(php_uname(), OPERATION_SYSTEM_WINDOWS) === false)
		{
			return OPERATION_SYSTEM_LINUX;
		}
		else
		{
			return OPERATION_SYSTEM_WINDOWS;
		}
	}
	

}
