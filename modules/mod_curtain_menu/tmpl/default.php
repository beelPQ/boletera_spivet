<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_curtain_menu
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $app->getDocument()->getWebAssetManager();
$wa->registerAndUseScript('mod_menu', 'mod_menu/menu.min.js', [], ['type' => 'module']);
$wa->registerAndUseScript('mod_menu', 'mod_menu/menu-es5.min.js', [], ['nomodule' => true, 'defer' => true]);

$baseurl = Uri::root(true) . "/modules/mod_curtain_menu/src";
$time = time();
$time .= $time;
echo "<script>
	window.addEventListener('DOMContentLoaded', () => {
		const styleModMenu = document.createElement('link');
		styleModMenu.href = '$baseurl/css/mod_style.min.css?v=$time';
		styleModMenu.rel = 'stylesheet';
		document.head.appendChild(styleModMenu);

		const scriptModMenu = document.createElement('script');
		scriptModMenu.src = '$baseurl/js/mod_script.min.js?v=$time';
		document.head.appendChild(scriptModMenu);
	})
</script>";

$id = '';

if ($tagId = $params->get('tag_id', '')) {
    $id = ' id="' . $tagId . '"';
}

$typeMenu = 1;
// Mostrar submenú
$classSubMenu = '';
if ($typeMenu == 1) {
    $tagsCourtainTop = "
	<label class='hamburger' for='checkMenu'>
		<input type='checkbox' id='checkMenu'>
		<span class='line line-main'></span>
		<span class='line line-split'></span>
	</label>
	<div id='pqOverlayScreen' class='pqoverlay-screen ' >";
    $tagsCourtainBottom = "</div>";
    $classNav = 'nav';
    $showSubMenu = $params->get('showSubMenu') ?? 0;
    if ($showSubMenu  == 1) $classSubMenu = 'view_submenu';
}
echo $tagsCourtainTop; 
//Se obtienen los colores para el menu cortina
$bgColorCurtain = $params->get('bgCurtainColor', '#fff');
$bgCurtainColorPriv = $params->get('bgCurtainColorPriv', '#fff');
$txtColorCurtain = $params->get('txtCurtainColor', '#000');
$txtCurtainColorHover = $params->get('txtCurtainColorHover', '#f0d800');
$txtCurtainColorHoverPriv = $params->get('txtCurtainColorHoverPriv', '#f0d800');
$txtColorIconMenu = $params->get('txtCurtainColorHamburger', '#000');
$txtColorIconMenuReg = $params->get('txtCurtainColorHamburgerRegistered', '#000');
$txtColorLineSpace = $params->get('txtCurtainColorLineSpace', '#000');
// The menu class is deprecated. Use mod-menu instead

$addPrimayLogo = $params->get('addPrimayLogo', 0);
$iconoMenu = $params->get('iconoMenu', '');
$backImage = $params->get('backImage', '');
$sponsor = $params->get('sponsor', '');
echo "<span hidden id='dataAddMenu' data-addlogosite='$addPrimayLogo' data-iconMenu='$iconoMenu' data-backImage='$backImage' data-sponsor='$sponsor' ></span>";

?>
<style>
    :root {
        --bgcolor_pq_curtain: <?= $bgColorCurtain ?>;
        --bgcolor_pq_curtain_priv: <?= $bgCurtainColorPriv ?>;
        --color_pq_curtain: <?= $txtColorCurtain ?>;
        --color_hover_options: <?= $txtCurtainColorHover ?>;
        --color_hover_options_priv: <?= $txtCurtainColorHoverPriv ?>;
        --color_pq_icon_menu : <?= $txtColorIconMenu?>;
        --color_pq_icon_menu_priv : <?= $txtColorIconMenuReg?>;
        --color_pq_line_menu : <?= $txtColorLineSpace?>
    }
</style>
<ul <?php echo $id; ?> class="mod-menu <?= $classNav ?> mod-list <?php echo $class_sfx; ?> <?= $classSubMenu ?> ">
    <?php //echo json_encode($list) ?>
    <?php foreach ($list as $i => &$item) {
        $parentIdItem = $item->id;
        $itemParams = $item->getParams();
        $class      = 'nav-item item-' . $item->id;

        if ($item->id == $default_id) {
            $class .= ' default';
        }

        if ($item->id == $active_id || ($item->type === 'alias' && $itemParams->get('aliasoptions') == $active_id)) {
            $class .= ' current';
        }

        if (in_array($item->id, $path)) {
            $class .= ' active';
        } elseif ($item->type === 'alias') {
            $aliasToId = $itemParams->get('aliasoptions');

            if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
                $class .= ' active';
            } elseif (in_array($aliasToId, $path)) {
                $class .= ' alias-parent-active';
            }
        }

        if ($item->type === 'separator') {
            $class .= ' divider';
        }

        if ($item->deeper) {
            $class .= ' deeper';
        }

        if ($item->parent) {
            $class .= ' parent';
        }

        // echo '<li class="' . $class . '" >';
        echo "<li class='$class' data-itemid='$parentIdItem' >";

        switch ($item->type):
            case 'separator':
            case 'component':
            case 'heading':
            case 'url':
                require ModuleHelper::getLayoutPath('mod_curtain_menu', 'default_' . $item->type);
                break;

            default:
                require ModuleHelper::getLayoutPath('mod_curtain_menu', 'default_url');
                break;
        endswitch;

        // The next item is deeper.
        if ($item->deeper) {
            // echo '<ul class="mod-menu__sub list-unstyled small">';
            if ($typeMenu == 1) {
                // children_submenu
                echo "<ul class='mod-menu__sub list-unstyled small  ' data-parentid='$parentIdItem'  id='collapseSubmenu$parentIdItem' >";
            } else {
                echo "<a class='nav-link dropdown-toggle ' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>$item->title</a>";
                echo '<ul class="nav-child unstyled small dropdown-menu ">';
            }
        }
        // The next item is shallower.
        elseif ($item->shallower) {
            echo '</li>';
            echo str_repeat('</ul></li>', $item->level_diff);
            $parentIdItem = '';
        }
        // The next item is on the same level.
        else {
            echo '</li>';
        }
    }
    ?>
</ul>