<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

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
$APPLICATION->AddChainItem("Агенты");

?>

<div class="site-section site-section-sm bg-light">
	<div class="container agents-list">
		<div class="row mb-5">
			<div class="col-12">
			<div class="site-section-title">
				<h2><?=GetMessage("TITLE")?></h2>
			</div>
			</div>
		</div>
		<div class="mb-5">

<?

foreach($arResult['AGENTS']["ITEMS"] as $key => $agent) {
?>

<div class="agent__card">
	<div class="small-info">
		<div class="avatar" style="background-image: url(<? if (($agent['UF_PHOTO'])!="") {
                echo $agent['UF_PHOTO'];
            }
            else {
                echo "/local/components/mcart/agents.list/templates/.default/images/no-avatar.png";
            }?>);"></div>
		<div class="info">
			<div class="name"><?=$agent['UF_NAME']?></div>
		</div>
	</div>
	<div class="agent__card_item">
		<div class="agent__card_info">
			<div class="card__info_item">
				<div class="position"><?=GetMessage("MAIL")?>: </div>
				<div class="name"><?=$agent['UF_EMAIL']?></div>
			</div>
			<div class="card__info_item">
				<div class="position"><?=GetMessage("PHONE")?>: </div>
				<div class="name"><?=$agent['UF_PHONE']?></div>
			</div>
			<div class="card__info_item">
				<div class="position"><?=GetMessage("TYPE")?>:</div>
				<div class="name"><?=$agent['UF_TYPE']?></div>
			</div>
		</div>
	</div>
	<a class="star <?if (in_array($key, $arResult['favagents'])) echo "active";?>" data-agentid="<?=$key?>">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M12 4L14.472 9.26604L20 10.1157L16 14.2124L16.944 20L12 17.266L7.056 20L8 14.2124L4 10.1157L9.528 9.26604L12 4Z" stroke="#95929A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</a>
	<!-- <a class="star active">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M12 4L14.472 9.26604L20 10.1157L16 14.2124L16.944 20L12 17.266L7.056 20L8 14.2124L4 10.1157L9.528 9.26604L12 4Z" stroke="#95929A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</a> -->
</div>


<?
}

/*
* Для постраничной навигации использовать компонент bitrix:main.pagenavigation
*/

?>

<?$APPLICATION->IncludeComponent(
	"bitrix:main.pagenavigation",
	"agents",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"NAV_OBJECT" => $arResult["AGENTS"]["NAV_OBJECT"],
		"SEF_MODE" => "N"
	)
);?>


</div>
    </div>
