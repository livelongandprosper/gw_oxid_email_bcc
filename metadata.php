<?php
/**
 * @abstract
 * @author 	Gregor Wendland <oxid@gregor-wendland.com>
 * @copyright Copyright (c) 2016-2020, Gregor Wendland
 * @package gw
 * @version 2020-05-13
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'gw_oxid_email_bcc',
    'title'        => 'E-Mail-Kopie an Administrator',
//     'thumbnail'    => 'out/admin/img/logo.jpg',
    'version'      => '1.2',
    'author'       => 'Gregor Wendland',
    'email'		   => 'oxid@gregor-wendland.com',
    'url'		   => 'https://gregor-wendland.com',
    'description'  => array(
    	'de'		=> 'Das Modul manipuliert die Sende-Funktion der Email-Klasse des Shops und bietet folgende Optionen:<ul>
							<li>Alle Shop-E-Mails an einstellbare E-Mail-Adressen als Blind Carbon Copy (BCC) schicken umleiten</li>
						</ul>',
    ),

    /* extend */
    'extend'       => array(
		'oxemail' 		=> 'gw/gw_oxid_email_bcc/application/models/gw_oxid_email_bcc_oxemail',
    ),
    /* settings */
    'settings'		=> array(
		array( 'group' => 'general', 	'name' => 'gw_oxid_email_bcc_mail', 'type' => 'arr'),
		array( 'group' => 'general', 	'name' => 'gw_oxid_email_bcc_redirect_all', 'type' => 'bool', 'value' => 'false'),
    ),

);
?>
