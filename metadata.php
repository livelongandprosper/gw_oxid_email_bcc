<?php
/**
 * @abstract
 * @author 	Gregor Wendland <oxid@gregor-wendland.com>
 * @copyright Copyright (c) 2016-2021, Gregor Wendland
 * @package gw
 * @version 2021-11-02
 */

/**
 * Metadata version
 */
$sMetadataVersion = '2';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'gw_oxid_email_bcc',
    'title'        => 'E-Mail-Kopie an Administrator',
//     'thumbnail'    => 'out/admin/img/logo.jpg',
    'version'      => '1.3',
    'author'       => 'Gregor Wendland',
    'email'		   => 'oxid@gregor-wendland.com',
    'url'		   => 'https://gregor-wendland.com',
    'description'  => array(
    	'de'		=> 'Das Modul bietet folgende Funktionen:<ul>
							<li>Alle Shop-E-Mails an einstellbare E-Mail-Adressen als Blind Carbon Copy (BCC) schicken umleiten</li>
							<li>Ermöglichen, Bestell-E-Mails erneut an die Besteller zu schicken</li>
						</ul>',
    ),

    /* extend */
    'extend'       => array(
		OxidEsales\Eshop\Core\Email::class => gw\gw_oxid_email_bcc\Core\Email::class,
		OxidEsales\Eshop\Application\Controller\Admin\OrderMain::class => gw\gw_oxid_email_bcc\Application\Controller\Admin\OrderMain::class,
		OxidEsales\Eshop\Application\Model\Order::class => gw\gw_oxid_email_bcc\Application\Model\Order::class,
    ),
    /* settings */
    'settings'		=> array(
		array( 'group' => 'general', 	'name' => 'gw_oxid_email_bcc_mail', 'type' => 'arr'),
		array( 'group' => 'general', 	'name' => 'gw_oxid_email_bcc_redirect_all', 'type' => 'bool', 'value' => 'false'),
    ),

	'blocks' => array(
		// backend
		array(
			'template' => 'order_main.tpl',
			'block' => 'admin_order_main_send_order',
			'file' => 'Application/views/blocks/admin/admin_order_main_send_order.tpl'
		),
	),

);
?>
