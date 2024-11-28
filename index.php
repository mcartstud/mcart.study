<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Главная");
$APPLICATION->SetPageProperty("keywords", "Недвижимость, продавать, покупать");
$APPLICATION->SetPageProperty("description", "Это биржа недвижемости");
$APPLICATION->SetTitle("Биржа недвижемости");
?>
 <?
 global $arrFilterSlider;
 $arrFilterSlider = array("=PROPERTY_PRIOR_VALUE" => "Да");
 $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "604800",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "slider",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"FILTER_NAME" => "arrFilterSlider",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "sale_ad",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "PRICE",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>
<div class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
				<div class="feature d-flex align-items-start">
 				<span class="icon mr-3 flaticon-house"></span>
					<div class="text">
						 <?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							Array(
								"AREA_FILE_SHOW" => "page",
								"AREA_FILE_SUFFIX" => "inc1",
								"COMPONENT_TEMPLATE" => ".default",
								"EDIT_TEMPLATE" => ""
							)
						);?>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
				<div class="feature d-flex align-items-start">
 				<span class="icon mr-3 flaticon-rent"></span>
					<div class="text">
						 <?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						".default",
						Array(
							"AREA_FILE_SHOW" => "page",
							"AREA_FILE_SUFFIX" => "inc2",
							"COMPONENT_TEMPLATE" => ".default",
							"EDIT_TEMPLATE" => ""
						)
					);?>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
				<div class="feature d-flex align-items-start">
 				<span class="icon mr-3 flaticon-location"></span>
					<div class="text">
						 <?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							Array(
								"AREA_FILE_SHOW" => "page",
								"AREA_FILE_SUFFIX" => "inc3",
								"COMPONENT_TEMPLATE" => ".default",
								"EDIT_TEMPLATE" => ""
							)
						);?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.line", 
	"last_adverts", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "172800",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "last_adverts",
		"DETAIL_URL" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "PROPERTY_PRICE",
			4 => "PROPERTY_GARAGE",
			5 => "PROPERTY_AREA",
			6 => "PROPERTY_TOILETS",
			7 => "PROPERTY_AMMOUNT_FLOOR",
			8 => "",
		),
		"IBLOCKS" => array(
			0 => "6",
		),
		"IBLOCK_TYPE" => "sale_ad",
		"NEWS_COUNT" => "6",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	),
	false
);?>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.line", 
	"links_services", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "7889238",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "PROPERTY_LINK",
			3 => "PROPERTY_ICON",
			4 => "",
		),
		"IBLOCKS" => array(
			0 => "7",
		),
		"IBLOCK_TYPE" => "services",
		"NEWS_COUNT" => "6",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "links_services"
	),
	false
);?><?$APPLICATION->IncludeComponent(
	"bitrix:news.line", 
	"last_news", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "604800",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DATE_CREATE",
			4 => "",
		),
		"IBLOCKS" => array(
			0 => "1",
		),
		"IBLOCK_TYPE" => "news",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "last_news"
	),
	false
);?> <br>
<p>
</p>
<p>
</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>