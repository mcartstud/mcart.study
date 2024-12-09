<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="site-section">
	<div class="container">
		<div class="col-md-12 col-lg-8 mb-5">
			<?
			if (!empty($arParams["~AUTH_RESULT"]))
			{
				ShowMessage($arParams["~AUTH_RESULT"]);
			}
			?>
<form class="p-5 bg-white border" name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if ($arResult["BACKURL"] <> '')
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">

	<div><?echo GetMessage("sys_forgot_pass_label")?></div>

	<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
		<label><b><?=GetMessage("sys_forgot_pass_login1")?></b></label>
			<input class="form-control" type="text" name="USER_LOGIN" value="<?=$arResult["USER_LOGIN"]?>" />
			<input type="hidden" name="USER_EMAIL" />
		<div><?echo GetMessage("sys_forgot_pass_note_email")?></div>
		</div>
	</div>

<?if($arResult["PHONE_REGISTRATION"]):?>

	<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
		<label><b><?=GetMessage("sys_forgot_pass_phone")?></b></label>
		<input class="form-control" type="text" name="USER_PHONE_NUMBER" value="<?=$arResult["USER_PHONE_NUMBER"]?>" />
		<div><?echo GetMessage("sys_forgot_pass_note_phone")?></div>
	</div>
</div>
<?endif;?>

<?if($arResult["USE_CAPTCHA"]):?>
	<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
			<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
		</div>
</div>
<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
		<label><?echo GetMessage("system_auth_captcha")?></label>
		<input class="form-control" type="text" name="captcha_word" maxlength="50" value="" />
	</div>
</div>
<?endif?>
<div class="row form-group">
<div class="col-md-12 mb-3 mb-md-0">
		<input type="submit" class="btn btn-primary" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
	</div>
</div>
</form>
<div style="margin-top: 16px">
	<p><a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a></p>
</div>
</div>
</div>
</div>
<script>
document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
document.bform.USER_LOGIN.focus();
</script>
