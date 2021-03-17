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
$img = SITE_TEMPLATE_PATH . "/img/no_photo.jpg";
if (isset($arResult["DETAIL_PICTURE"]["SRC"]))
{
	$img = $arResult["DETAIL_PICTURE"]["SRC"];
}
?>

<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
			<?echo $arResult["DETAIL_TEXT"];?>
		</div>
		<div class="review-autor">
			<?=$arResult["NAME"]?>, 
			<?=$arResult["DISPLAY_ACTIVE_FROM"]?> г., 
			<?=$arResult["PROPERTIES"]["POSITION"]["VALUE"]?>, 
			<?=$arResult["PROPERTIES"]["COMPANY"]["VALUE"]?>.
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap">
		<img src="<?=$img?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>">
	</div>
</div>
<?if (!empty($arResult["PROPERTIES"]["FILE"]["VALUE"])):?>
<div class="exam-review-doc">
	<p><?=GetMessage("DOCUMENTS")?>:</p>
	<?foreach ($arResult["PROPERTIES"]["FILE"]["VALUE"] as $file):
		$filePath = CFile::GetPath($file);
		$arFile = CFile::GetById($file)->fetch();
	?>
	<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png"><a href="<?=$filePath?>" download><?=$arFile["ORIGINAL_NAME"]?></a></div>
	<?endforeach?>
</div>
<?endif?>
<hr>