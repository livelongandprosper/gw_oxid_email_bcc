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
	 * send a bcc to configured adresses or redirect them if the option gw_oxid_email_bcc_redirect_all is set
	 *
	 * @access public
	 * @return bool
	 */
	public function send() {
		$myConfig = $this->getConfig();
		if(sizeof($myConfig->getConfigParam("gw_oxid_email_bcc_mail"))) {
			if(!$myConfig->getConfigParam("gw_oxid_email_bcc_redirect_all")) {
				foreach($myConfig->getConfigParam("gw_oxid_email_bcc_mail") as $bcc_email) {
					$this->AddBCC($bcc_email, "");
				}
			} else {
				$recipients_comma_separated = "";
				foreach($this->getRecipient() as $recipient) { // f.e. array( array('mail1@mail1.com', 'user1Name'), array('mail2@mail2.com', 'user2Name') )
					if($recipients_comma_separated) {
						$recipients_comma_separated .= ', ';
					}
					$recipients_comma_separated .= $recipient[0];
				}

				// show actual recipients in subject of email
				$this->setSubject($this->getSubject() . ' (actual recipient should be: ' . $recipients_comma_separated . ')');

				// clear recipients
				$this->clearAllRecipients();

				// override recipients
				foreach($myConfig->getConfigParam("gw_oxid_email_bcc_mail") as $bcc_email) {
					$this->setRecipient($bcc_email, "");
				}
			}
		}

		return parent::send();
	}
}
?>
