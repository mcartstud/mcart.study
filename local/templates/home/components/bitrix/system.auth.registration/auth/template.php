<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2024 Bitrix
 */

use Bitrix\Main\Web\Json;

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>
<div class="site-section">
	<div class="container">
		<div class="col-md-12 col-lg-8 mb-5">
<?
if (!empty($arParams["~AUTH_RESULT"]))
{
	ShowMessage($arParams["~AUTH_RESULT"]);
}
?>
<?if($arResult["SHOW_EMAIL_SENT_CONFIRMATION"]):?>
	<p><?echo GetMessage("AUTH_EMAIL_SENT")?></p>
<?endif;?>

<?if(!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"] && $arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
	<p><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></p>
<?endif?>
<noindex>

<?if($arResult["SHOW_SMS_FIELD"] == true):?>

<form class="p-5 bg-white border" method="post" action="<?=$arResult["AUTH_URL"]?>" name="regform">
<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
<div class="row form-group">
<div class="col-md-12 mb-3 mb-md-0">
			<label><span class="starrequired">*</span><?echo GetMessage("main_register_sms_code")?></label>
			<input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" />
</div>
</div>
<div class="row form-group">
<div class="col-md-12 mb-3 mb-md-0">
			<input type="submit" name="code_submit_button" value="<?echo GetMessage("main_register_sms_send")?>" />
</div>
</div>
</form>

<script>
new BX.PhoneAuth({
	containerId: 'bx_register_resend',
	errorContainerId: 'bx_register_error',
	interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
	data:
		<?= Json::encode([
			'signedData' => $arResult["SIGNED_DATA"],
		]) ?>,
	onError:
		function(response)
		{
			var errorDiv = BX('bx_register_error');
			var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
			errorNode.innerHTML = '';
			for(var i = 0; i < response.errors.length; i++)
			{
				errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
			}
			errorDiv.style.display = '';
		}
});
</script>

<div id="bx_register_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_register_resend"></div>

<?elseif(!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"]):?>

<form class="p-5 bg-white border" method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform" enctype="multipart/form-data">
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="REGISTRATION" />

	<div class="row form-group">
	<div class="col-md-12 mb-3 mb-md-0">
			<td colspan="2"><b><?=GetMessage("AUTH_REGISTER")?></b></td>
</div>
</div>
<div class="row form-group">
<div class="col-md-12 mb-3 mb-md-0">
			<label><span class="starrequired">*</span><?=GetMessage("AUTH_LOGIN_MIN")?></label>
			<input class="form-control" type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" class="bx-auth-input" />
			</div>
</div>
<div class="row form-group">
<div class="col-md-12 mb-3 mb-md-0">
			<label><span class="starrequired">*</span><?=GetMessage("AUTH_PASSWORD_REQ")?></label>
			<input  class="form-control" type="password" name="USER_PASSWORD" maxlength="255" value="<?=$arResult["USER_PASSWORD"]?>" class="bx-auth-input" autocomplete="off" />
			</div>
</div>
<div class="row form-group">
<div class="col-md-12 mb-3 mb-md-0">
			<label><span class="starrequired">*</span><?=GetMessage("AUTH_CONFIRM")?></label>
			<input  class="form-control" type="password" name="USER_CONFIRM_PASSWORD" maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="bx-auth-input" autocomplete="off" />
			</div>
</div>

<?if($arResult["EMAIL_REGISTRATION"]):?>
	<div class="row form-group">
	<div class="col-md-12 mb-3 mb-md-0">
			<label><?if($arResult["EMAIL_REQUIRED"]):?><span class="starrequired">*</span><?endif?><?=GetMessage("AUTH_EMAIL")?></label>
			<input  class="form-control" type="text" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>" class="bx-auth-input" />
			</div>
</div>
<?endif?>

<?if($arResult["PHONE_REGISTRATION"]):?>
	<div class="row form-group">
	<div class="col-md-12 mb-3 mb-md-0">
			<label><?if($arResult["PHONE_REQUIRED"]):?><span class="starrequired">*</span><?endif?><?echo GetMessage("main_register_phone_number")?></label>
			<input  class="form-control" type="text" name="USER_PHONE_NUMBER" maxlength="255" value="<?=$arResult["USER_PHONE_NUMBER"]?>" class="bx-auth-input" />
			</div>
</div>
<?endif?>

<?// ********************* User properties ***************************************************?>
<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<div class="row form-group">
		<div class="col-md-12 mb-3 mb-md-0">
			<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
				<label><?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;
		?><?=$arUserField["EDIT_FORM_LABEL"]?>:</label>
		<div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:system.field.edit",
				$arUserField["USER_TYPE"]["USER_TYPE_ID"],
				array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "bform"), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
	<?endforeach;?>
			</div>
</div>
</div>
<?endif;?>
<?// ******************** /User properties ***************************************************

	/* CAPTCHA */
	if ($arResult["USE_CAPTCHA"] == "Y")
	{
		?>
<div class="row form-group">
<div class="col-md-12 mb-3 mb-md-0">
			<td colspan="2"><b><?=GetMessage("CAPTCHA_REGF_TITLE")?></b></td>
			</div>
</div>
<div class="row form-group">
<div class="col-md-12 mb-3 mb-md-0">
				<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				</div>
</div>
<div class="row form-group">
<div class="col-md-12 mb-3 mb-md-0">
			<label><span class="starrequired">*</span><?=GetMessage("CAPTCHA_REGF_PROMT")?>:</label>
			<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
			</div>
</div>
<?
	}
	/* CAPTCHA */
	?>
		<div class="row form-group">
		<div class="col-md-12 mb-3 mb-md-0">
				<?$APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "",
					array(
						"ID" => COption::getOptionString("main", "new_user_agreement", ""),
						"IS_CHECKED" => "Y",
						"AUTO_SAVE" => "N",
						"IS_LOADED" => "Y",
						"ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
						"ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
						"INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
						"REPLACE" => array(
							"button_caption" => GetMessage("AUTH_REGISTER"),
							"fields" => array(
								rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
								rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
								rtrim(GetMessage("AUTH_EMAIL"), ":"),
							)
						),
					)
				);?>
			</div>
</div>
<div class="row form-group">
<div class="col-md-12 mb-3 mb-md-0">
			<input class="btn btn-primary" type="submit" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>" />
			</div>
</div>
</form>

<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>

<p><a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><b><?=GetMessage("AUTH_AUTH")?></b></a></p>

<script>
document.bform.USER_LOGIN.focus();
</script>

<?endif?>

</noindex>
</div>
</div>
</div>