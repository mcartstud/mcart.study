<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//var_dump($arResult);?>
<?if (!empty($arResult)):?>
<div class="col-md-6 col-lg-6">
	<ul class="list-unstyled">

<?
$itemcount = 0;
foreach($arResult as $arItem):
	if(($itemcount > (count($arResult) / 2))) {
	?>
		</ul>
			</div>
			<div class="col-md-6 col-lg-6">
		<ul class="list-unstyled">
	<?
	$itemcount = -1;
	}
	else {
		$itemcount++;
	}
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
<?endforeach?>

</ul>
	</div>
<?endif?>