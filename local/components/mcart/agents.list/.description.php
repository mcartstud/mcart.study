<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    "NAME" => GetMessage("D_HLBLOCK_NAME"),
	"DESCRIPTION" => GetMessage("D_HLBLOCK_DESC"),
    // "SORT" => 10,
    // "CACHE_PATH" => "Y",
    "PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "agents",
			"NAME" => GetMessage("D_HLBLOCK_NAME"),
			"SORT" => 10,
		),
	),
);
?>