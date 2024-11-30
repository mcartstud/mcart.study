<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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



//работающий код вывода галереи и доп. материалов через запрос к базе
// $res = CIBlockElement::GetProperty($arResult['IBLOCK_ID'], $arResult['ID'], "sort", "asc", array("CODE" => "GALLARY"));
// $arGal = [];
// while ($ob = $res->GetNext())
// {			
// 	$file = CFile::GetFileArray($ob['VALUE']);
// 	array_push($arGal, $file['SRC']);
// }
// $res = CIBlockElement::GetProperty($arResult['IBLOCK_ID'], $arResult['ID'], "sort", "asc", array("CODE" => "ADITION_MATERIALS"));
// $arAdit = [];
// while ($ob = $res->GetNext())
// {			
// 	$file = CFile::GetFileArray($ob['VALUE']);
// 	array_push($arAdit, $file['SRC']);
// }

?>

<div class="site-blocks-cover overlay" style="background-image: url(<?=$arResult["DETAIL_PICTURE"]['SRC'];?>)" data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row align-items-center justify-content-center text-center">
			<div class="col-md-10">
				<span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?=GetMessage("TIT");?></span>
				<h1 class="mb-2"><?=$arResult["PREVIEW_TEXT"]?></h1>
				<p class="mb-5"><strong class="h2 text-success font-weight-bold"><?=$arResult["DISPLAY_PROPERTIES"]['PRICE']["DISPLAY_VALUE"]?></strong></p>
			</div>
		</div>
	</div>
</div>

<div class="site-section site-section-sm">
	<div class="container">
		<div class="row">
			<div class="col-lg-8" style="margin-top: -150px;">
				<div class="mb-5">
					<div class="slide-one-item home-slider owl-carousel">
						<?
						if ($arResult['DISPLAY_PROPERTIES']['GALLARY'] != NULL) {
							if (count($arResult['DISPLAY_PROPERTIES']['GALLARY']["VALUE"]) > 1) {
								foreach($arResult['DISPLAY_PROPERTIES']['GALLARY']["FILE_VALUE"] as $img){?>
									<div><img src="<?=$img['SRC']?>" alt="Image" class="img-fluid"></div>
								<?}
							}else { 
								?>
								<div><img src="<?=$arResult['DISPLAY_PROPERTIES']['GALLARY']["FILE_VALUE"]['SRC']?>" alt="Image" class="img-fluid"></div>
								<?
							}
						}
						else { ?>
							<div><img src="<?=$arResult["DETAIL_PICTURE"]['SRC']?>" alt="Image" class="img-fluid"></div>
						<?}
						?>
					</div>
					
				</div>
				<div class="bg-white">
					<div class="row mb-5">
						<div class="col-md-6">
							<strong class="text-success h1 mb-3"><?=$arResult["DISPLAY_PROPERTIES"]['PRICE']["DISPLAY_VALUE"]?></strong>
						</div>
						<div class="col-md-6">
							<ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
								<li>
									<span class="property-specs"><?=GetMessage("UP_DATE")?></span>
									<span class="property-specs-number"><?=$arResult['TIMESTAMP_X']?></span>
									
								</li>
								<li>
									<span class="property-specs"><?=GetMessage("FLOORS")?></span>
									<span class="property-specs-number"><?=$arResult["DISPLAY_PROPERTIES"]['AMMOUNT_FLOOR']["DISPLAY_VALUE"]?></span>
									
								</li>
								<li>
									<span class="property-specs"><?=GetMessage("METERS")?></span>
									<span class="property-specs-number"><?=$arResult["DISPLAY_PROPERTIES"]['AREA']["DISPLAY_VALUE"]?></span>
									
								</li>
							</ul>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
							<span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("TOILETS")?></span>
							<strong class="d-block"><?=$arResult["DISPLAY_PROPERTIES"]['AMMOUNT_FLOOR']["DISPLAY_VALUE"]?></strong>
						</div>
						<div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
							<span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("GARAGES")?></span>
							<strong class="d-block"><?=$arResult["DISPLAY_PROPERTIES"]['GARAGE']["DISPLAY_VALUE"]?></strong>
						</div>
					</div>
					<h2 class="h4 text-black"><?=GetMessage("MOREINFO")?></h2>
					<p><?=$arResult["DETAIL_TEXT"]?></p>
					<div class="row mt-5">
						<?
						if ($arResult['DISPLAY_PROPERTIES']['GALLARY'] != NULL) {
							?>
						<div class="col-12">
							<h2 class="h4 text-black mb-3"><?=GetMessage("GAL")?></h2>
						</div>
						<?
							if (count($arResult['DISPLAY_PROPERTIES']['GALLARY']['VALUE']) > 1) {
								foreach($arResult['DISPLAY_PROPERTIES']['GALLARY']["FILE_VALUE"] as $img){?>
									<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
									<a href="<?=$img['SRC']?>" class="image-popup gal-item"><img src="<?=$img['SRC']?>" alt="Image" class="img-fluid"></a>
								</div>
								<?}
							}else { 
								?>
								<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
									<a href="<?=$arResult['DISPLAY_PROPERTIES']['GALLARY']["FILE_VALUE"]['SRC']?>" class="image-popup gal-item"><img src="<?=$arResult['DISPLAY_PROPERTIES']['GALLARY']["FILE_VALUE"]['SRC']?>" alt="Image" class="img-fluid"></a>
								</div>
								<?
							}
						}	
						?>					
					</div>
					<div class="row mt-5">
						<?
						if ($arResult['DISPLAY_PROPERTIES']['ADITION_MATERIALS'] != NULL) {
							?>							
						<div class="col-12">
							<h2 class="h4 text-black mb-3"><?=GetMessage("ADIT")?></h2>
						</div>							
						<?
							if (count($arResult['DISPLAY_PROPERTIES']['ADITION_MATERIALS']["VALUE"]) > 1) {
								?><div class="col-sm-6 col-md-4 col-lg-3 mb-4"><?
								foreach($arResult['DISPLAY_PROPERTIES']['ADITION_MATERIALS']["FILE_VALUE"] as $img){?>
										<a href="<?=$img['SRC']?>" class="image-popup gal-item"><?=$img['ORIGINAL_NAME']?></a>
										<?}
									?></div><?
							}else { 
								?>
								<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
									<a href="<?=$arResult['DISPLAY_PROPERTIES']['ADITION_MATERIALS']["FILE_VALUE"]['SRC']?>" class="image-popup gal-item"><img src="<?=$arResult['DISPLAY_PROPERTIES']['ADITION_MATERIALS']["FILE_VALUE"]['ORIGINAL_NAME']?>" alt="Image" class="img-fluid"></a>
								</div>
								<?
							}
						}
						?>	
					</div>
					<div class="row mt-5">
						<? if ($arResult['DISPLAY_PROPERTIES']["LINKS"] != NULL) { ?>
						<div class="col-12">
							<h2 class="h4 text-black mb-3"><?=GetMessage("LINKS")?></h2>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
						<?foreach($arResult['DISPLAY_PROPERTIES']["LINKS"]['DISPLAY_VALUE'] as $links):?>
							<a><?=$links?></a>
							<?endforeach;?>		
						</div>
						<?}?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 pl-md-5">

				<div class="bg-white widget border rounded">

				<h3 class="h4 text-black widget-title mb-3"><?=GetMessage("CONT")?></h3>
				<form action="" class="form-contact-agent">
					<div class="form-group">
						<label for="name"><?=GetMessage('CONTNAME')?></label>
						<input type="text" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="email"><?=GetMessage('CONTMAIL')?></label>
						<input type="email" id="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="phone"><?=GetMessage('CONTTEL')?></label>
						<input type="text" id="phone" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" id="phone" class="btn btn-primary" value="<?=GetMessage('CONTSUB')?>">
					</div>
				</form>
				</div>

				<div class="bg-white widget border rounded">
					<h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis ducimus quis. Illo, quisquam, veritatis.</p>
				</div>

			</div>
		
		</div>
	</div>
</div>