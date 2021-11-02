<?php

/**
 *
 * @package   tabslAbo
 * @version   1.3.1
 * @license   vetena.de
 * @link      https://oxid-module.eu
 * @author    Tobias Merkl <support@oxid-module.eu>
 * @copyright Tobias Merkl | 2020-10-01
 *
 * This Software is the property of Tobias Merkl
 * and is protected by copyright law, it is not freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be
 * prosecuted by civil and criminal law.
 *
 * 514b037abfd7daf6f97b32bc5632ec2c
 *
 **/

namespace gw\gw_oxid_email_bcc\Application\Model;

use OxidEsales\Eshop\Application\Model\User;
use OxidEsales\Eshop\Core\Email;
use OxidEsales\Eshop\Core\Field;
use OxidEsales\Eshop\Core\Registry;
use Tabsl\Abo\Core\Logging;
use Tabsl\Abo\Model\Abo;
use Tabsl\Abo\Model\Delivery;

/**
 * Class Order
 *
 * @package Tabsl\Abo\Model
 */
class Order extends Order_parent
{

	/**
	 * Sends std order email like if a std order was placed
	 */
    public function reSendOrderEmail() {
		$this->setAdminMode(false); // we have to set this so that tpls and translation can be loaded correctly

		// basket
		// we dont want to check stock in this case because we just want to recalculate the basket
		$oldConfigParamBlUseStock = $this->getConfig()->getConfigParam('blUseStock');
		$this->getConfig()->setConfigParam('blUseStock', false);
		$oBasket = $this->_getOrderBasket(false);
		$aOrderArticles = $this->getOrderArticles(false);
		$this->_addArticlesToBasket($oBasket, $aOrderArticles);
		$oBasket->calculateBasket();

		// reset config
		$this->getConfig()->setConfigParam('blUseStock', $oldConfigParamBlUseStock);

		// user
		$user = oxNew(\OxidEsales\Eshop\Application\Model\User::class);
		$user->load($this->oxorder__oxuserid->value);

		// user paymentr
		$oUserPayment = oxNew(\OxidEsales\Eshop\Application\Model\UserPayment::class);
		$oUserPayment->load($this->_getPaymentIdFromDatabase());

		// add user, basket and payment to order
		$this->_oUser = $user;
		$this->_oBasket = $oBasket;
		$this->_oPayment = $oUserPayment;

		$oxEmail = oxNew(\OxidEsales\Eshop\Core\Email::class);

		// send order email to user
		if ($oxEmail->sendOrderEMailToUser($this)) {
			$this->setAdminMode(true);
			return true;
		}

		$this->setAdminMode(true);
		return false;
	}

	/**
	 * @param null $orderId
	 * @return mixed
	 */
	private function _getPaymentIdFromDatabase() {
		$paymentId = "";
		$resultSet = \OxidEsales\Eshop\Core\DatabaseProvider::getDb(\OxidEsales\Eshop\Core\DatabaseProvider::FETCH_MODE_ASSOC)->select("
			SELECT
				OXPAYMENTID
			FROM
				oxorder
			WHERE
					OXID = ?
				AND
					OXSHOPID = ?;
			LIMIT
				1",
			array(
				$this->getId(),
				$this->getConfig()->getShopId()
			)
		);
		$allResults = $resultSet->fetchAll();
		foreach($allResults as $row) {
			$paymentId = $row['OXPAYMENTID'];
		};
		return $paymentId;
	}
}
