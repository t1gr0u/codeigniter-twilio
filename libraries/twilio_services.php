<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

/**
 * @name twilio_services.php
 * @description
 * @since Wed Mar 01 09:17:36 GMT 2013
 * @author t1gr0u <tigrou.m@gmail.com>
 */

class twilio_services {
	protected $_CI;
	private $_twilio;
	private $_accountSid;
	private $_authToken;

	public function __construct() {
		//initialize the CI super-object
		$this->_CI =& get_instance();

    //load config
		$this->_CI->load->config( 'twilio', true );

		//get settings from config
		$this->_accountSid = $this->_CI->config->item( 'accountSid', 'twilio' );
		$this->_authToken  = $this->_CI->config->item( 'authToken', 'twilio' );


		if ( file_exists( 'application/libraries/twilioServices/Twilio.php' ) ) {
      require_once 'application/libraries/twilioServices/Twilio.php';

			//initialize the client
			$this->_twilio = new Services_Twilio( $this->_accountSid, $this->_authToken );
		} else {

			throw( new Exception( 'twilio files are missing' ) );
		}
	}



  public function __get( $method ) {
    return $this->_twilio->$method;
  }

	public function __call( $method, $arguments ) {
		if ( !method_exists( $this->_twilio, $method ) ) {
			throw new Exception( '__call: Undefined method Twilio::' . $method . '() called' );
		}
		return call_user_func_array( array( $this->_twilio, $method ), $arguments );
	}
}

/* End of file twilio_services.php */