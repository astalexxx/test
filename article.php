<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Статьи');
global $BREADCRUMBS;    
$BREADCRUMBS = TRUE;
global $HIDE_HELPFULL;
$HIDE_HELPFULL = TRUE;
?>
                </div>
            </div>
<!-- end of header -->
<div id="main">
<div id="content">
<div class="textpage">
<? if (!isset($_REQUEST["ID"])): ?>
<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"article",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "Articles",
		"IBLOCK_ID" => "6",
		"NEWS_COUNT" => 1024,
		"SORT_BY1" => "RAND",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DATE_ACTIVE_FROM"),
		"PROPERTY_CODE" => array(),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => $_REQUEST["SECTION_ID"],
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	)
);?>
<? else: ?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"articles",
	Array(
		"IBLOCK_TYPE" => "Articles",
		"IBLOCK_ID" => $_REQUEST["BID"],
		"ELEMENT_ID" => $_REQUEST["ID"],
		"ELEMENT_CODE" => "",
		"CHECK_DATES" => "Y",
		"FIELD_CODE" => array(0=>"NAME",1=>"DETAIL_TEXT",2=>"",),
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"IBLOCK_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "NAME",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"USE_PERMISSIONS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Страница",
		"PAGER_SHOW_ALL" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?>
<? endif;?>
</div>     
</div>
<div id="sidebar">
	<? if(CModule::IncludeModule('iblock')):
	$arSelect = Array('ID', 'NAME');
    $arFilter = Array('IBLOCK_ID'=>6, 'ACTIVE'=>'Y', 'GLOBAL_ACTIVE'=>'Y');
    $rsSection = CIBlockSection::GetList(Array('SORT'=>'ASC'), $arFilter, true, $arSelect);
	?>

	<h3>Статьи</h3>
	<ul class="list">
		<? while($arSection = $rsSection->GetNext()): ?>
		<li><a href="/article.php?SECTION_ID=<?=$arSection["ID"]?>"><?=$arSection["NAME"]?></a></li>
		<? endwhile; ?>
	</ul>
	<? endif; ?>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>