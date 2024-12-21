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
                        if ($now <= 9 || $now >= 18) {
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
                    <nav class="menu-block">
                        <ul>
                            <li class="att popup-wrap">
                                <a id="hd_singin_but_open" href="" class="btn-toggle">Войти на сайт</a>
                                <form action="/" class="frm-login popup-block">
                                    <div class="frm-title">Войти на сайт</div>
                                    <a href="" class="btn-close">Закрыть</a>
                                    <div class="frm-row"><input type="text" placeholder="Логин"></div>
                                    <div class="frm-row"><input type="password" placeholder="Пароль"></div>
                                    <div class="frm-row"><a href="" class="btn-forgot">Забыли пароль</a></div>
                                    <div class="frm-row">
                                        <div class="frm-chk">
                                            <input type="checkbox" id="login">
                                            <label for="login">Запомнить меня</label>
                                        </div>
                                    </div>
                                    <div class="frm-row"><input type="submit" value="Войти"></div>
                                </form>
                            </li>
                            <li><a href="">Зарегистрироваться</a>
                            </li>
                        </ul>
                    </nav>
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
		"USE_EXT" => "Y",
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
        <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"chain", 
	array(
		"PATH" => "",
		"SITE_ID" => "s4",
		"START_FROM" => "0",
		"COMPONENT_TEMPLATE" => "chain"
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
                        <?
                        if (!(GetPagePath(false, true) == "/s4/index.php")) {
                        ?>
                        <header>
                            <h1><?$APPLICATION->ShowTitle(false)?></h1>
                        </header>
                        <?
                        }
                        else {
                            $APPLICATION->IncludeFile(SITE_DIR."include/main.php", Array(), Array(
                                "MODE" => "php",
                            ));
                        }
                        ?>