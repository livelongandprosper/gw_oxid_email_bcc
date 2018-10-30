<?php
/**
 * @author 	Gregor Wendland <kontakt@gewend.de>
 * @version 2016-04-27
 */
 
/**
 * gw_oxid_email_bcc_oxemail class.
 * 
 * @extends gw_oxid_email_bcc_oxemail_parent
 */
class gw_oxid_email_bcc_oxemail extends gw_oxid_email_bcc_oxemail_parent {

	/**
	 * send function.
	 * 
	 * @access public
	 * @return void
	 */
	public function send() {
		$myConfig = $this->getConfig();
		if(sizeof($myConfig->getConfigParam("gw_oxid_email_bcc_mail"))) {
		    foreach($myConfig->getConfigParam("gw_oxid_email_bcc_mail") as $bcc_email) {
		        $this->AddBCC($bcc_email, "");
            }
		}

		return parent::send();
	}
}
?>