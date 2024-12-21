<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<hr>
<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
			<?=$arResult["DETAIL_TEXT"]?>
		</div>
		<div class="review-autor">
			<?=$arResult["NAME"]?>, <?=$arResult["DISPLAY_ACTIVE_FROM"]?>, <?=$arResult["DISPLAY_PROPERTIES"]['POSITION']['DISPLAY_VALUE']?>, <?=$arResult["DISPLAY_PROPERTIES"]['COMPANY']['DISPLAY_VALUE']?>.
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap"><img src="<?
		if (is_array($arResult["DETAIL_PICTURE"])) {
			echo $arResult["DETAIL_PICTURE"]["SRC"];
		}
		else {
			echo SITE_TEMPLATE_PATH."/img/rew/no_photo.jpg";
		}
		?>" alt="img"></div>
</div>
<?
if (!empty($arResult["DISPLAY_PROPERTIES"]['DOCS'])) {
?>
<div class="exam-review-doc">
<p><?=GetMessage("DOCS")?>:</p>
<?
if (count($arResult["DISPLAY_PROPERTIES"]['DOCS']['VALUE']) > 1) {
	foreach ($arResult["DISPLAY_PROPERTIES"]['DOCS']["FILE_VALUE"] as $doc) {
		?>
			<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png"><a href="<?=$doc['SRC']?>"><?=$doc['ORIGINAL_NAME']?></a></div>
		<?
	}
?>
<?
}
else {
	?>
	<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png"><a href="<?=$arResult["DISPLAY_PROPERTIES"]['DOCS']["FILE_VALUE"]['SRC']?>"><?=$arResult["DISPLAY_PROPERTIES"]['DOCS']["FILE_VALUE"]['ORIGINAL_NAME']?></a></div>
	<?
}
?>
</div>
<?
}
?>
<hr>