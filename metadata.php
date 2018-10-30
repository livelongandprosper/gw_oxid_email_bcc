<?php
/**
 * @abstract
 * @author 	Gregor Wendland <kontakt@gewend.de>
 * @copyright Copyright (c) 2016-2018, Gregor Wendland
 * @package gw
 * @version 2018-09-14
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
    'version'      => '1.1',
    'author'       => 'Gregor Wendland',
    'email'		   => 'kontakt@gewend.de',
    'url'		   => 'https://www.gewend.de',
    'description'  => array(
    	'de'		=> '<ul>
							<li>Alle Shop-E-Mails an einstellbare E-Mail-Adressen schicken</li>
						</ul>',
    ),
    
    /* extend */
    'extend'       => array(
		'oxemail' 		=> 'gw/gw_oxid_email_bcc/application/models/gw_oxid_email_bcc_oxemail',
    ),
    /* settings */
    'settings'		=> array(
         array( 'group' => 'general', 	'name' => 'gw_oxid_email_bcc_mail', 'type' => 'arr'),
    ),

);
?>