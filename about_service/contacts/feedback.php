<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Недвижимость, продавать, покупать");
$APPLICATION->SetPageProperty("description", "Здесь хранятся информация для обратной связи");
$APPLICATION->SetPageProperty("title", "Обратная связь");
$APPLICATION->SetTitle("Обратная связь");
$APPLICATION->AddChainItem("Обратная связь");
?><div class="site-section">
	<div class="container">
		<div class="row">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback", 
	"feedback", 
	array(
		"EMAIL_TO" => "YouTubebogdan@mail.ru",
		"EVENT_MESSAGE_ID" => array(
		),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "MESSAGE",
		),
		"USE_CAPTCHA" => "Y",
		"COMPONENT_TEMPLATE" => "feedback"
	),
	false
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => ""
		)
	);?>
		</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>