<?php

namespace WSDLI;

/**
 * TestWSDLFile
 * @author WSDLInterpreter
 */
class TestWSDLFile extends \SoapClient {
	/**
	 * Default class map for wsdl=>php
	 * @access private
	 * @var array
	 */
	private static $classmap = array(
		"TestOperation" => "WSDLI\\Stubs\\TestOperation",
		"TestOperationResponse" => "WSDLI\\Stubs\\TestOperationResponse",
		"TestOperationFault" => "WSDLI\\Stubs\\TestOperationFault",
	);

	/**
	 * Constructor using wsdl location and options array
	 * @param string $wsdl WSDL location for this service
	 * @param array $options Options for the SoapClient
	 */
	public function __construct($wsdl="TestWSDLFile.wsdl", $options=array()) {
		foreach(self::$classmap as $wsdlClassName => $phpClassName) {
		    if(!isset($options['classmap'][$wsdlClassName])) {
		        $options['classmap'][$wsdlClassName] = $phpClassName;
		    }
		}
		parent::__construct($wsdl, $options);
	}

	/**
	 * Checks if an argument list matches against a valid argument type list
	 * @param array $arguments The argument list to check
	 * @param array $validParameters A list of valid argument types
	 * @return boolean true if arguments match against validParameters
	 * @throws Exception invalid function signature message
	 */
	public function _checkArguments($arguments, $validParameters) {
		$variables = "";
		foreach ($arguments as $arg) {
		    $type = gettype($arg);
		    if ($type == "object") {
		        $type = get_class($arg);
		    }
		    $variables .= "(".$type.")";
		}
		if (!in_array($variables, $validParameters)) {
		    throw new Exception("Invalid parameter types: ".str_replace(")(", ", ", $variables));
		}
		return true;
	}

	/**
	 * Service Call: TestOperation
	 * Parameter options:
	 * (TestOperation) parameters
	 * @param mixed,... See function description for parameter options
	 * @return TestOperationResponse
	 * @throws Exception invalid function signature message
	 */
	public function TestOperation($mixed = null) {
		$validParameters = array(
			"(TestOperation)",
		);
		$args = func_get_args();
		$this->_checkArguments($args, $validParameters);
		return $this->__soapCall("TestOperation", $args);
	}


}