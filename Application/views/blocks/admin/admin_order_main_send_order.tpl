[{$smarty.block.parent}]

<form name="gwresendorderemail" id="gwresendorderemail" action="[{$oViewConf->getSelfLink()}]" method="post">
    <br><br>
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cur" value="[{$oCurr->id}]">
    <input type="hidden" name="cl" value="order_main">
    <input type="hidden" name="fnc" value="gw_resend_order_email">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="resendorderemail__oxorder__oxid" value="[{$oxid}]">
    <button>[{oxmultilang ident="GW_RESEND_ORDER_EMAIL"}]</button>
</form>
