<?php
$arUrlRewrite=array (
  18 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  17 => 
  array (
    'CONDITION' => '#^/video([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1&videoconf',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  16 => 
  array (
    'CONDITION' => '#^/saler_account/my_adverts/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/saler_account/my_adverts/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/about_service/vacancy/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/about_service/vacancy/index.php',
    'SORT' => 100,
  ),
  13 => 
  array (
    'CONDITION' => '#^/about_service/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/about_service/news/index.php',
    'SORT' => 100,
  ),
  19 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  15 => 
  array (
    'CONDITION' => '#^/adverts/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/adverts/index.php',
    'SORT' => 100,
  ),
);
