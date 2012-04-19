<?php
/**
 * CampaignCommanderNMP
 *
 * PHP class for using the Emailvision CampaignCommander Notification Messaging API Service
 * 
 * @author Chris Schalenborgh <chris.s@kryap.com>
 * @version 0.2
 * @package php-campaigncommander-notifcation-messaging
 * @license BSD License
 */ 
 
class NMPMessage {
	/**
	 * The ID of the template
	 *
	 * @var int
	 */
	private $_notificationId;
	
	/**
	 * The encrypt value provided in the interface
	 *
	 * @var string
	 */
	private $_encryptToken;
	
	/**
	 * Unique random token to authenticate with Emailvision
	 *
	 * @var string
	 */
	private $_randomToken;
	
	/**
	 * The type of synchronization that should be carried out:
	 * NOTHING: The MEMBER table will not be synchronized.
	 * INSERT: The new profile will be inserted with all the associated DYN data in the MEMBER table.
	 * UPDATE: The profile and all the associated DYN data will be updated in the MEMBER table.
	 * INSERT_UPDATE: The system will try to update the profile in the MEMBER table. If the update fails, it tries to insert the profile with the associated DYN data into the MEMBER table.
	 *
	 * @var string
	 */
	private $_sync_type = 'UPDATE';
	
	/**
	 * The key you wish to update, normally its email
	 *
	 * @var string
	 */
	private $_sync_key = 'email';
	
	/**
	 * The time you wish to send the notification message. If you put a past time, it will be sent immediately.
	 *
	 * @var string
	 */
	private $_email_time;
	
	/**
	 * The email address to whom you wish to send the notification message
	 *
	 * @var string
	 */	
	private $_email_recipient;
		
	/**
	 * Array containing key pair values for dynamic content
	 *
	 * @var array
	 */	
	private $_email_dynamic = array();
	
	/**
	 * The HTML mail content
	 *
	 * @var string
	 */	
	private $_email_content_html;
	
	/**
	 * The Text mail content
	 *
	 * @var string
	 */	
	private $_email_content_text;
	
	
	/**
	 * Default constructor
	 */
	public function __construct () {
		$this->setEmailTime(date('c'));
    }

	/**
	 * Set notificationId
	 * 
	 * @param int $notificationId
	 */
    public function setNotificationId ($notificationId) {
        $this->_notificationId = (int)$notificationId;
    }

	/**
	 * Get notificationId
	 * 
	 * @return int
	 */
    public function getNotificationId () {
        return $this->_notificationId;
    }

	/**
	 * Set encryptToken
	 * 
	 * @param string $encryptToken
	 */
    public function setEncryptToken ($encryptToken) {
        $this->_encryptToken = (string)$encryptToken;
    }

	/**
	 * Get notificationId
	 * 
	 * @return string
	 */
    public function getEncryptToken () {
        return $this->_encryptToken;
    }

	/**
	 * Set randomToken
	 * 
	 * @param string $randomToken
	 */
    public function setRandomToken ($randomToken) {
        $this->_randomToken = (string)$randomToken;
    }

	/**
	 * Get randomToken
	 * 
	 * @return string
	 */
    public function getRandomToken () {
        return $this->_randomToken;
    }

	/**
	 * Set sync_type
	 * 
	 * @param string $sync_type
	 */
    public function setSyncType ($synctype) {
        $this->_sync_type = (string)$synctype;
    }

	/**
	 * Get sync_type
	 * 
	 * @return string
	 */
    public function getSyncType () {
        return $this->_sync_type;
    }

	/**
	 * Set sync_key
	 * 
	 * @param string $sync_key
	 */
    public function setSyncKey ($sync_key) {
        $this->_sync_key = (string)$sync_key;
    }

	/**
	 * Get sync_key
	 * 
	 * @return string
	 */
    public function getSyncKey () {
        return $this->_sync_key;
    }

	/**
	 * Set email_time: date('c')
	 * 
	 * @param date $email_time
	 */
    public function setEmailTime ($email_time) {
        $this->_email_time = (string)$email_time;
    }

	/**
	 * Get $email_time
	 * 
	 * @return date
	 */
    public function getEmailTime () {
        return $this->_email_time;;
    }

	/**
	 * Set email_recipient
	 * 
	 * @param string $email_recipient
	 */
    public function setEmailRecipient ($email_recipient) {
        $this->_email_recipient = (string)$email_recipient;
    }

	/**
	 * Get email_recipient
	 * 
	 * @return string
	 */
    public function getEmailRecipient () {
        return $this->_email_recipient;
    }

	/**
	 * Set dynamic email content
	 * 
	 * @param string $key
	 * @param string $value
	 */
    public function addDynamicValue ($key, $value) {
        $this->_email_dynamic[$key] = (string)$value;
    }

	/**
	 * Remove dynamic email content
	 * 
	 * @param string $key
	 * @return bool
	 */
    public function removeDynamicValue ($key = null) {
		if(array_key_exists($key, $this->_email_dynamic) && $key !== null) {
    		unset($this->_email_dynamic[$key]);
    		return true;
    	}
    	return false;
    }

	/**
	 * Remove dynamic email content.
	 * 
	 * @return array
	 */
    public function returnDynamicValues () {
    	return $this->_email_dynamic;
    }

	/**
	 * Set HTML mail
	 * 
	 * @param string $content
	 */
    public function setMailHtml ($content) {
        $this->_email_content_html = (string)$content;
    }

	/**
	 * Get HTML mail
	 * 
	 * @return string
	 */
    public function getMailHtml () {
        return $this->_email_content_html;
    }

	/**
	 * Set Text mail
	 * 
	 * @param string $content
	 */
    public function setMailText ($content) {
        $this->_email_content_text = (string)$content;
    }

	/**
	 * Get Text mail
	 * 
	 * @return string
	 */
    public function getMailText () {
        return $this->_email_content_text;
    }
}
 
class NMPBatch {
	// api url
	const API_URL = 'http://api.notificationmessaging.com/NMSXML';	
	
	/**
	 * Debug? True/false
	 *
	 * @var bool
	 */
	private $_debug;
	
	/**
	 * Messages array, for sending out batches of messages through 1 request
	 *
	 * @var array
	 */
	private $_messages;


	/**
	 * Add message to message array
	 * 
	 * @param string $message
	 */
    public function addMessage (NMPMessage $message) {
        $this->_messages[] = $message;
    }

	/**
	 * Set debug
	 * 
	 * @param int $debug
	 */
    public function setDebug ($debug) {
        $this->_debug = (bool)$debug;
    }

	/**
	 * Get debug
	 * 
	 * @return bool
	 */
    public function getDebug () {
        return $this->_debug;
    }

	/**
	 * Returns all messages
	 * 
	 * @return array
	 */
    private function getMessages () {
    	$output = '';
    	foreach($this->_messages as $val) {
    		$output .= '<sendrequest>
				<dyn>';
				
				$kpv = $val->returnDynamicValues();
				if(count($kpv) > 0) {
					foreach($kpv as $k=>$v) {
						$output .= '
					<entry>
						<key>' .$k. '</key>
						<value>' .$v. '</value>
					</entry>';
					}
				}
				
				$output .= '
				</dyn>
				<content>
					<entry>
						<key>1</key>
						<value>
							<![CDATA[' .$val->getMailHtml(). ']]>
						</value>
					</entry>
					<entry>
						<key>2</key>
						<value>
							<![CDATA[' .$val->getMailText(). ']]>
						</value>
					</entry>
				</content>
				
				<notificationId>' .$val->getNotificationId(). '</notificationId>
				<email>' .$val->getEmailRecipient(). '</email>
				<encrypt>' .$val->getEncryptToken(). '</encrypt>
				<random>' .$val->getRandomToken(). '</random>
				<senddate>' .$val->getEmailTime(). '</senddate>
				<synchrotype>' .$val->getSyncType(). '</synchrotype>
				<uidkey>' .$val->getSyncKey(). '</uidkey>
			</sendrequest>';
    	}
        return $output;
    }
    

	/**
	 * Send to Emailvision API
	 * 
	 * @return bool
	 */
	public function send() {			
		// build final xml
		$xml = '<?xml version="1.0" encoding="UTF-8"?>
		<MultiSendRequest>
		' .$this->getMessages(). '
		</MultiSendRequest>';
		
		// init curl and send xml to API
		$curl = curl_init(self::API_URL);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);
		curl_close($curl);
		
		// if debug mode is true, send input + output, else return booleans
		if($this->getDebug()) {
			return array('output' => $curl_response, 'input' => $this);
		}
		else {
			return ($curl_response != 1) ? true : false;
		}
	}
}
?>