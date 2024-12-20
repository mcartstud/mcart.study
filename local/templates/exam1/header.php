<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<?
	use Bitrix\Main\Page\Asset;
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/owl.carousel.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/reset.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.css");
	?>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <!-- wrap -->
    <div class="wrap">
        <!-- header -->
        <header class="header">
            <div class="inner-wrap">
                <div class="logo-block"><a href="" class="logo">Мебельный магазин</a>
                </div>
                <div class="main-phone-block">
					<?
					$now = date("G");
					if ($now < 9 || $now > 18) {
					?>
					<a href="mailto:store@store.ru" class="phone">store@store.ru</a>
					<?
					}
					else {
						?>
						<a href="tel:84952128506" class="phone">8 (495) 212-85-06</a>
					<?
					}
					?>
                    <div class="shedule">время работы с 9-00 до 18-00</div>
                </div>
                <div class="actions-block">
                    <form action="/" class="main-frm-search">
                        <input type="text" placeholder="Поиск">
                        <button type="submit"></button>
                    </form>
                    <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form", 
	"demo", 
	array(
		"FORGOT_PASSWORD_URL" => "/s2/login/?forgot_password=yes",
		"PROFILE_URL" => "/s2/login/user.php",
		"REGISTER_URL" => "/s2/login/?register=yes",
		"SHOW_ERRORS" => "N",
		"COMPONENT_TEMPLATE" => "demo"
	),
	false
);?>
                    
                </div>
            </div>
        </header>
        <!-- /header -->
        <!-- nav -->
        
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"main_nav", 
						array(
							"ROOT_MENU_TYPE" => "top",
							"MAX_LEVEL" => "3",
							"CHILD_MENU_TYPE" => "left",
							"USE_EXT" => "N",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(
							),
							"COMPONENT_TEMPLATE" => "main_nav",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N"
						),
						false,
						array(
							"ACTIVE_COMPONENT" => "Y"
						)
					);?>
        <!-- /nav -->
        <!-- breadcrumbs -->
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "exam1", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s2",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
        <!-- /breadcrumbs -->
        <!-- page -->
        <div class="page">
            <!-- content box -->
            <div class="content-box">
                <!-- content -->
                <div class="content">
                    <div class="cnt">
						<?if (!(GetPagePath(false, true) == "/s2/index.php")) {?>
                        <header>
                            <h1><?=$APPLICATION->ShowTitle(false)?></h1>
                        </header>
						<?
						}
						else {
							$APPLICATION->IncludeFile(
								SITE_DIR."include/main.php",
								Array(),
								Array("MODE"=>"php")
							);
						}
						?>