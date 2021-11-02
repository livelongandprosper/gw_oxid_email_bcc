<?php

namespace gw\gw_oxid_email_bcc\Application\Controller\Admin;

class OrderMain extends OrderMain_parent {
	public function gw_resend_order_email() {
		$oOrder = oxNew(\OxidEsales\Eshop\Application\Model\Order::class);
		$oOrder->load(\OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter("resendorderemail__oxorder__oxid"));

		if($oOrder) {
			// send order email to user
			if ($oOrder->reSendOrderEmail()) {
				\OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay('GW_RESEND_ORDER_EMAIL_SUCCESS');
			} else {
				\OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay('GW_RESEND_ORDER_EMAIL_ERROR_0');
			}
		} else {
			\OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay('GW_RESEND_ORDER_EMAIL_ERROR_1');
		}
	}
}
