<?
$aMenuLinks = Array(
	Array(
		"Главная", 
		"/", 
		Array(), 
		Array("SELECTED"=>"Y"), 
		"" 
	),
	Array(
		"Объявления", 
		"/adverts/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"О сервисе", 
		"/about_service/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Личный кабинет продавца", 
		"/saler_account/", 
		Array(), 
		Array(), 
		"CSite::InGroup(array(1,7,6))" 
	),
	Array(
		"Личный кабинет покупателя", 
		"/buyer_account/", 
		Array(), 
		Array(), 
		"CSite::InGroup(array(1,8,6))" 
	),
	Array(
		"Авторизация", 
		"/login/", 
		Array(), 
		Array(), 
		"!\$GLOBALS['USER']->IsAuthorized()" 
	)
);
?>