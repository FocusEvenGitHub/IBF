<?php

if (!function_exists('consulta_procedimento_sei_ws')) {

	// https://softwarepublico.gov.br/social/sei/manuais/padrao-de-codificacao-php/sumario
	// Url references: https://www.keboca.com/php-consume-soap-service-no-wsdl-mode#:~:text=Setup%20SoapClient&text=The%20location%20is%20the%20URL,be%20sure%20of%20those%20values.
	// https://www.php.net/SoapClient.--soapCall

	// Exemplos:
	// mod-sei-protocolo-integrado: https://github.com/supergovbr/mod-sei-protocolo-integrado.git
	// mod-wsseiintegrado: https://github.com/supergovbr/mod-wssei
	// mod-sei-pen: https://github.com/supergovbr/mod-sei-pen

	// https://softwarepublico.gov.br/social/sei/manuais/manual-de-webservices
	// WSDL File: https://sei.dnit.gov.br/sei/controlador_ws.php?servico=sei

	if (!defined('SEI_WEBSERVICE_ADDRESS_MAIN')) {
		define('SEI_WEBSERVICE_ADDRESS_MAIN', 'https://sei.dnit.gov.br');
	}

	if (!defined('SEI_WEBSERVICE_URI')) {
		define('SEI_WEBSERVICE_URI', '/sei/controlador_ws.php?servico=sei');
	}

	function configureSoap()
	{
		$addressComplete = SEI_WEBSERVICE_ADDRESS_MAIN . SEI_WEBSERVICE_URI;

		$arrContextOptions = array(
			"ssl" => array(
				"verify_peer" => false,
				"verify_peer_name" => false,
				'allow_self_signed' => true
			),
		);

		if (!@file_get_contents($addressComplete, false, stream_context_create($arrContextOptions))) {
			echo 'Arquivo WSDL ' . $addressComplete . ' não encontrado.';
		}

		try {
			$context = stream_context_create([
				'ssl' => [
					// set some SSL/TLS specific options
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				]
			]);
			$client  = new SoapClient(null, [
				'location' => $addressComplete,
				'uri' => SEI_WEBSERVICE_ADDRESS_MAIN . '/ws/SeiWS.php',
				'stream_context' => $context
			]);
		} catch (Exception $e) {
			echo '<pre>';
			echo $e->getMessage();
		}
		return $client;
	}

	function consultarProcedimentoIndividual($idUnidade)
	{
		return responseJson(coreCallSoapApi('consultarProcedimentoIndividualRequest', getProcedimentoIndividualParameters($idUnidade)));
	}

	function consultarBloco($idUnidade)
	{
		return responseJson(coreCallSoapApi('consultarBloco', getBlocoParameters($idUnidade)));
	}

	function consultarProcedimento($idUnidade, $processo)
	{
		return responseJson(coreCallSoapApi('consultarProcedimento', getProcedimentoParameters($idUnidade, $processo)));
	}

	function consultarDocumento($unidade, $idDocumento)
	{
		return responseJson(coreCallSoapApi('consultarDocumento', getDocumentoParameters($unidade, $idDocumento)));
	}

	function consultarUnidades($idOrgao, $idUnidade = null, $palavraPesquisa = null)
	{
		return responseJson(coreCallSoapApi('listarUnidades', getUnidadesParameters($idOrgao, $idUnidade, $palavraPesquisa)));
	}

	function coreCallSoapApi($function, $arguments)
	{
		$result = null;
		$success = false;
		$message = 'A comunicação não foi realizada.';
		try {
			$client = configureSoap();
			if(!empty($client))
			{
				$result = $client->__soapCall($function, $arguments, array('location' => SEI_WEBSERVICE_ADDRESS_MAIN . '/ws/SeiWS.php'));
				$success = true;
				$message = 'A comunicação foi realizada com sucesso.';
			}
		} catch (Exception $e) {
			if(!empty($e->getMessage()))
			{
				$success = true;
				$message = $e->getMessage();
			}
		}

		$ci = get_instance();
    	$ci->load->helper('tratamento_resposta_ws');
		$result = tratamento_resposta_ws($success,$message, $result);

		return $result;
	}

	function responseJson($data)
	{
		return json_decode(json_encode($data), True);
	}


	function getIdUnidade($unidade, $diretoria = null)
	{
		$listIds = getIdsUnidade($diretoria);
		if(array_search($unidade, $listIds) && !empty($unidade))
		{
			return $listIds[$unidade];
		}
		if(empty($diretoria) || $diretoria == 'DIR')
		{
			switch($unidade)
			{
				case '1':
				case 'DNIT':
					return $listIds['DNIT'];
					break;
				case '2':
				case 'COOR':
					return $listIds['COOR'];
					break;
				case '11':  // CONTRATOS: 11
				case 'CONTRATOS': 
				case '6':  // MED: 6
				case 'MED': 
				case '31':  // DEV: 31
				case 'DEV': 
				case '4':  // ASSEJUR: 4
				case 'ASSEJUR': 
				case '9':  // ASSEJUR EXT: 9
				case 'ASSEJUR EXT': 
				case '8':
				case 'CGCONT': // CGCONT: 8
					return $listIds['CGCONT']; // CGCONT
					break;
				case '15':
				case 'DIR': // CGCONT: 8
					return $listIds['DIR']; // CGCONT
					break;
				case 'COAC':
					return $listIds['COAC'];
					break;
				case 'DEV':
				//case '31':
				case 'TESTE_1_2':
						return $listIds['TESTE_1_2'];
						break;
				case 'TESTE':
					case '31':
					case '45':
					return $listIds['TESTE'];
					break;
			}
		}
		else if($diretoria == 'DAF')
		{
			switch($unidade)
			{
				case '2':
				case 'CGLOG':
					return $listIds['CGLOG'];
					break;
				case '3':
					case 'SESLOG':
						return $listIds['SESLOG'];
						break;
					
				default:
					return $listIds['CGLOG'];
					break;
			}
		}
		return null;
	}

	function getIdsUnidade($diretoria = null)
	{
		return array(
			'DNIT' => 0,
			'DAF' => 110000068 ,
			'SAA - DAF' => 110000069 ,
			'CGLOG' => 110000081 ,
			'SAA - CGLOG' => 110000082 ,
			'CCAQ' => 110001049 ,
			'COPATR' => 110000083 ,
			'NUAQ' => 110001051 ,
			'SCONT' => 110001050 ,
			'SEINF' => 110000088 ,
			'SESLOG' => 110001229 ,
			'DIR' => 110000123 ,
			'SAA - DIR' => 110000127 ,
			'CGCONT' => 110000126 ,
			'SAA - CGCONT' => 110001280 ,
			'COAC' => 110000130 ,
			'COOR' => 110001042 ,
			'COCCONV' => 110001041 ,
			'DIF' => 110000113 ,
			'SAA - DIF' => 110000114 ,
			'CGOFER' => 110000115 ,
			'CONFER' => 110000117 ,
			'CAC' => 110000118 ,
			'CGPF' => 110000119 ,
			'COMAF' => 110000122 ,
			'COPAF' => 110000121,
			'TESTE' => 110000001,
			'TESTE_1_2' => 110000002,
		);
	}

	function getBloco($unidade)
	{
		// get bloco
		switch($unidade)
		{
			// TESTE
			case '110000001':
				return 303218;
				break;
		}
		return null;
	}

	/**
	 * Retorna o Processo SEI Específico
	 * @access public 
	 * @author Rodolfo Romão <rodolforomao@gmail.com>
	 * @version 0.1 
	 * @copyright  GPL © 2020. 
	 * @param $this da model
	 * @return Retorna o valor ou o erro.
	 */
	function consulta_procedimento_sei_ws($processo_sei, $unidade)
	{
		$response = null;
		$idUnidade = is_numeric($unidade) ? $unidade : getIdUnidade($unidade);
		if(!empty($idUnidade) && !empty($processo_sei))
		{
			$response = consultarProcedimento($idUnidade, $processo_sei);
		}
		else
		{
			if(empty($idUnidade))
			{
				$response = tratamento_resposta_ws(false, 'Cordenação/Setor não cadastro na integração SUPRA/SEI.', null);
			}
		}

		return $response;
	}

	/**
	 * Retorna o banco de dados conforme instancia
	 * @access public 
	 * @author Rodolfo Romão <rodolforomao@gmail.com>
	 * @version 0.1 
	 * @copyright  GPL © 2020. 
	 * @param $this da model
	 * @return Retorna o valor ou o erro.
	 */
	function consulta_bloco_sei_ws($unidade)
	{
		$response = null;
		$idUnidade = is_numeric($unidade) ? $unidade : getIdUnidade($unidade);
		if(!empty($idUnidade))
		{
			$response = consultarBloco($idUnidade);
		}

		return $response;
	}

	/**
	 * Retorna os dados do documento SEI especificado.
	 * @access public 
	 * @author Rodolfo Romão <rodolforomao@gmail.com>
	 * @version 0.1 
	 * @copyright  GPL © 20202 
	 * @param 
	 * @return Retorna o array ou o erro.
	 */
	function consulta_documento_sei_ws($idDocumento, $unidade)
	{
		$response = null;
		if(!empty($unidade) && !empty($idDocumento))
		{
			$response = consultarDocumento($unidade, $idDocumento);
		}

		return $response;
	}

	/**
	 * Retorna os dados das unidades do órgão em questão.
	 * @access public 
	 * @author Rodolfo Romão <rodolforomao@gmail.com>
	 * @version 0.1 
	 * @copyright  GPL © 20202 
	 * @param 
	 * @return Retorna o array ou o erro.
	 */
	function consulta_unidades_sei_ws($idOrgao, $idUnidade = null, $palavraPesquisa = null)
	{
		$response = null;
		if((!empty($idOrgao) || $idOrgao === 0 ) || !empty($idUnidade) || !empty($palavraPesquisa))
		{
			$response = consultarUnidades($idOrgao, $idUnidade, $palavraPesquisa);
		}

		return $response;
	}

	function getProcedimentoParameters($idUnidade, $processo)
	{
		$serviceName = getServiceName($idUnidade);

		$siglaSistema = 'SUPRA';
		if($idUnidade == 43 || $idUnidade == 110000001 || $idUnidade == 110000002 || $idUnidade == 'TESTE' || $idUnidade == 'TESRE_2_1')
		{
			$siglaSistema = 'Supra-teste';
			$serviceName = 'supra-daf';
		}

		return array(
			'SiglaSistema' => $siglaSistema,
			'IdentificacaoServico' => $serviceName,
			'IdUnidade' => $idUnidade,
			'ProtocoloProcedimento' => $processo,
			'SinRetornarAssuntos' => 'S',
			'SinRetornarInteressados' => 'S',
			'SinRetornarObservacoes' => 'S',
			'SinRetornarAndamentoGeracao' => 'S',
			'SinRetornarAndamentoConclusao' => 'S',
			'SinRetornarUltimoAndamento' => 'S',
			'SinRetornarUnidadesProcedimentoAberto' => 'S',
			'SinRetornarProcedimentosRelacionados' => 'S',
			'SinRetornarProcedimentosAnexados' => 'S'
		);
	}


	function getDocumentoParameters($idUnidade, $idDocumento)
	{
		// • IdDocumento ou ProtocoloDocumento
		// • SinRetornarAndamentoGeracao
		// • SinRetornarAssinaturas
		// • SinRetornarPublicacao
		// • SinRetornarCampos
		$serviceName = getServiceName($idUnidade);

		$siglaSistema = 'SUPRA';
		if($idUnidade == 43 || $idUnidade == 110000001 || $idUnidade == 110000002)
		{
			$siglaSistema = 'Supra-teste';
			$serviceName = 'supra-daf';
		}

		return array(
			'SiglaSistema' => $siglaSistema,
			'IdentificacaoServico' => $serviceName,
			'IdUnidade' => $idUnidade,
			'IdDocumento' => $idDocumento,
			'SinRetornarAndamentoGeracao' => 'S',
			'SinRetornarAssinaturas' => 'S',
			'SinRetornarPublicacao' => 'N',
			'SinRetornarCampos' => 'S',
		);
	}

	function getServiceName($idUnidade)
	{
		$list = array(
			'110000068' => 'SUPRA-DAF',
			'110000069' => 'SUPRA-DAF',
			'110000081' => 'SUPRA-DAF-CGLOG',
			'110000082' => 'SUPRA-DAF-CGLOG',
			'110001049' => 'SUPRA-DAF-CGLOG',
			'110000083' => 'SUPRA-DAF-CGLOG',
			'110001051' => 'SUPRA-DAF-CGLOG',
			'110001050' => 'SUPRA-DAF-CGLOG',
			'110000088' => 'SUPRA-DAF-CGLOG',
			'110001229' => 'SUPRA-DAF-CGLOG',
			'110000123' => 'SUPRA-DIR',
			'110000127' => 'SUPRA-DIR',
			'110000126' => 'SUPRA-DIR-CGCONT',
			'110001280' => 'SUPRA-DIR-CGCONT',
			'110000130' => 'SUPRA-DIR-CGCONT',
			'110001042' => 'SUPRA-DIR-CGCONT',
			'110001041' => 'SUPRA-DIR-CGCONT',
			'110000113' => 'SUPRA-DIF',
			'110000114' => 'SUPRA-DIF',
			'110000115' => 'SUPRA-DIF-CGOFER',
			'110000117' => 'SUPRA-DIF-CGOFER',
			'110000118' => 'SUPRA-DIF-CGOFER',
			'110000119' => 'SUPRA-DIF-CGOFER',
			'110000122' => 'SUPRA-DIF-CGOFER',
			'110000121' => 'SUPRA-DIF-CGOFER', // SUPRA-DIF-CGPF
			// '110000001' => 'Supra-teste',
			// '110000002' => 'Supra-teste',
			'110000001' => 'SUPRA-DIR-CGCONT',
			'110000002' => 'SUPRA-DIR-CGCONT',
		);
		return $list[$idUnidade];
	}

	function getUnidadesParameters($idOrgao, $idUnidade = null, $palavraPesquisa = null)
	{
		// 		listarUnidades
		// Entrada
		// 	SiglaSistema Valor informado no cadastro do sistema realizado no SEI
		// 	IdentificacaoServico Valor informado no cadastro do serviço realizado no SEI
		// 	IdTipoProcedimento Opcional. Tipo do processo cadastrado no serviço.
		// 	IdSerie Opcional. Tipo do documento cadastrado no serviço.
		// Saída
		// 	parametros Um conjunto de ocorrências da estrutura Unidade.
		// 	Observações
		// 		As unidades serão listadas de acordo com o acesso configurado para o serviço inf
		$retorno = null;
		// if(!empty($idOrgao) || $idOrgao === 0)
		// {
		// 	//$retorno['IdOrgao'] = 12;
		// 	$retorno['IdOrgao'] = "0";
		// 	//$retorno['PalavrasPesquisa'] = 'TESTE';
		// }
		// if(!empty($idUnidade))
		// {
		// 	$retorno['IdUnidade'] = $idUnidade;
		// }
		 if(!empty($palavraPesquisa))
		 {
		 	$retorno['PalavrasPesquisa'] = $palavraPesquisa;
		 }

		$retorno['SiglaSistema'] = 'Supra-teste';
		$retorno['IdentificacaoServico'] = 'supra-daf';

		return $retorno;
	}

	function getProcedimentoIndividualParameters($idUnidade)
	{
		// <wsdl:message name="consultarProcedimentoIndividualRequest">
		// 	<wsdl:part name="SiglaSistema" type="xsd:string"/>
		// 	<wsdl:part name="IdentificacaoServico" type="xsd:string"/>
		// 	<wsdl:part name="IdUnidade" type="xsd:string"/>
		// 	<wsdl:part name="IdOrgaoProcedimento" type="xsd:string"/>
		// 	<wsdl:part name="IdTipoProcedimento" type="xsd:string"/>
		// 	<wsdl:part name="IdOrgaoUsuario" type="xsd:string"/>
		// 	<wsdl:part name="SiglaUsuario" type="xsd:string"/>
		// </wsdl:message>

		$arguments = array(
			'SiglaSistema' => 'Supra-teste',
			'IdentificacaoServico' => 'supra-daf',
			'IdUnidade' => $idUnidade,
			'IdOrgaoProcedimento' => '',
			'IdTipoProcedimento' => '',
			'IdOrgaoUsuario' => '',
			'SinRetornarProtocolos' => 'S',
		);
	}

	function getBlocoParameters($idUnidade)
	{
		$idBloco = getBloco($idUnidade);
		$serviceName = getServiceName($idUnidade);

		// <wsdl:message name="consultarBlocoRequest">
		// <wsdl:part name="SiglaSistema" type="xsd:string"/>
		// <wsdl:part name="IdentificacaoServico" type="xsd:string"/>
		// <wsdl:part name="IdUnidade" type="xsd:string"/>
		// <wsdl:part name="IdBloco" type="xsd:string"/>
		// <wsdl:part name="SinRetornarProtocolos" type="xsd:string"/>
		// </wsdl:message>

		return array(
			'SiglaSistema' => 'SUPRA',
			'IdentificacaoServico' => $serviceName,
			'IdUnidade' => $idUnidade,
			'IdBloco' => $idBloco, // ??
			'SinRetornarProtocolos' => 'S',
		);
	}

}
