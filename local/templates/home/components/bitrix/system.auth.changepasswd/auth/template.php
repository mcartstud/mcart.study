<?php

use Bitrix\Main\Web\Json;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if($arResult["PHONE_REGISTRATION"])
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

<?if($arResult["SHOW_FORM"]):?>

<form class="p-5 bg-white border" method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform">
	<?if ($arResult["BACKURL"] <> ''): ?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
	<? endif ?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="CHANGE_PWD">
		<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label><b><?=GetMessage("AUTH_CHANGE_PASSWORD")?></b></label>
				</div>
		</div>
		<?if($arResult["PHONE_REGISTRATION"]):?>
			<div class="row form-group">
				<div class="col-md-12 mb-3 mb-md-0">
				<label><?echo GetMessage("sys_auth_chpass_phone_number")?></label>
					<input type="text" value="<?=htmlspecialcharsbx($arResult["USER_PHONE_NUMBER"])?>" class="bx-auth-input" disabled="disabled" />
					<input class="form-control"  type="hidden" name="USER_PHONE_NUMBER" value="<?=htmlspecialcharsbx($arResult["USER_PHONE_NUMBER"])?>" />
					</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label><span class="starrequired">*</span><?echo GetMessage("sys_auth_chpass_code")?></label>
				<input class="form-control" type="text" name="USER_CHECKWORD" maxlength="50" value="<?=$arResult["USER_CHECKWORD"]?>" class="bx-auth-input" autocomplete="off" />
				</div>
		</div>
		<?else:?>
			<div class="row form-group">
				<div class="col-md-12 mb-3 mb-md-0">
				<label><span class="starrequired">*</span><?=GetMessage("AUTH_LOGIN")?></label>
				<input class="form-control" type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" class="bx-auth-input" />
				</div>
		</div>
		<?
	if($arResult["USE_PASSWORD"]):
		?>
		<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label><span class="starrequired">*</span><?echo GetMessage("sys_auth_changr_pass_current_pass")?></label>
				<input class="form-control" type="password" name="USER_CURRENT_PASSWORD" maxlength="255" value="<?=$arResult["USER_CURRENT_PASSWORD"]?>" class="bx-auth-input" autocomplete="new-password" />
				</div>
		</div>
		<?
	else:
		?>
		<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label><span class="starrequired">*</span><?=GetMessage("AUTH_CHECKWORD")?></label>
				<input class="form-control" type="text" name="USER_CHECKWORD" maxlength="50" value="<?=$arResult["USER_CHECKWORD"]?>" class="bx-auth-input" autocomplete="off" />
				</div>
		</div>
		<?
	endif
	?>
<?endif?>
<div class="row form-group">
	<div class="col-md-12 mb-3 mb-md-0">
				<label><span class="starrequired">*</span><?=GetMessage("AUTH_NEW_PASSWORD_REQ")?></label>
				<input class="form-control" type="password" name="USER_PASSWORD" maxlength="255" value="<?=$arResult["USER_PASSWORD"]?>" class="bx-auth-input" autocomplete="new-password" />
				</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label><span class="starrequired">*</span><?=GetMessage("AUTH_NEW_PASSWORD_CONFIRM")?></label>
				<input class="form-control" type="password" name="USER_CONFIRM_PASSWORD" maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="bx-auth-input" autocomplete="new-password" />
				</div>
		</div>
		<?if($arResult["USE_CAPTCHA"]):?>
			<div class="row form-group">
				<div class="col-md-12 mb-3 mb-md-0">
					<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
					</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label><span class="starrequired">*</span><?echo GetMessage("system_auth_captcha")?></label>
				<input class="form-control" type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
				</div>
		</div>
		<?endif?>
		<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<input class="btn btn-primary" type="submit" name="change_pwd" value="<?=GetMessage("AUTH_CHANGE")?>" /></td>
			</div>
		</div>
</form>

<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>

<?if($arResult["PHONE_REGISTRATION"]):?>

<script>
new BX.PhoneAuth({
	containerId: 'bx_chpass_resend',
	errorContainerId: 'bx_chpass_error',
	interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
	data:
		<?= Json::encode([
			'signedData' => $arResult["SIGNED_DATA"]
		]) ?>,
	onError:
		function(response)
		{
			var errorDiv = BX('bx_chpass_error');
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

<div id="bx_chpass_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_chpass_resend"></div>

<?endif?>

<?endif?>

<p><a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a></p>

</div>
</div>
</div>