<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="nav">
	<div class="inner-wrap">
		<div class="menu-block popup-wrap">
			<a href="" class="btn-menu btn-toggle"></a>
			<div class="menu popup-block">
				<ul class="">
					<li class="main-page"><a href="/s5/"><?=GetMessage('MAIN_PAGE')?></a>
					</li>

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>
	
	<?if ($arItem["PERMISSION"] > "D"):?>
		<?
		$color = "";
		if (!empty($arItem['PARAMS']['CLASS_COLOR'])) {
			$color = $arItem['PARAMS']['CLASS_COLOR'];
		}
		?>
		<?if ($arItem["IS_PARENT"]):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a class="<?=$color?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
					<ul>
						<?if (!empty($arItem['PARAMS']['ADD_TEXT'])) {?>
						<div class="menu-text"><?=$arItem['PARAMS']['ADD_TEXT']?></div>
						<?}?>
			<?else:?>
				<li><a class="<?=$color?>" href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
					<ul>
						<?if (!empty($arItem['PARAMS']['ADD_TEXT'])) {?>
						<div class="menu-text"><?=$arItem['PARAMS']['ADD_TEXT']?></div>
						<?}?>
			<?endif?>

		<?else:?>


		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a class="<?=$color?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?else:?>
			<li><a class="<?=$color?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
				<a href="" class="btn-close"></a>
			</div>
			<div class="menu-overlay"></div>
		</div>
	</div>
</nav>
<?endif?>
				