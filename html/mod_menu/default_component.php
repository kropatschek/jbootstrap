<?php
/**
 * @package     Extly.Templates
 * @subpackage  JBootstrap - Twitter's Bootstrap for Joomla (with RocketTheme's Gantry administration)
 * 
 * @author      Prieco S.A. <support@extly.com>
 * @copyright   Copyright (C) 2007 - 2012 Prieco, S.A. All rights reserved.
 * @license     http://http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL 
 * @link        http://www.extly.com http://support.extly.com http://www.prieco.com
 */
// No direct access
defined('JPATH_BASE') or die('Restricted access');

$dropmenu = null;
$addcaret = null;
if ($item->parent)
{
	$dropmenu = ' id="drop' . $item->id . '" role="button" data-toggle="dropdown"';
	$item->anchor_css = "dropdown-toggle " . $item->anchor_css;
	$addcaret = '<b class="caret"></b>';
}

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="' . $item->anchor_css . '" ' : '';
$title = $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';
if ($item->menu_image)
{
	$item->params->get('menu_text', 1) ?
					$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" /><span class="image-title">' . $item->title . '</span> ' :
					$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" />';
} else
{
	$linktype = $item->title;
}

switch ($item->browserNav) :
	default:
	case 0:
		?><a <?php echo $class;
		echo $dropmenu; ?>href="<?php echo $item->flink; ?>" <?php echo $title; ?>><?php echo $linktype; echo $addcaret; ?></a><?php
		break;
	case 1:
		// _blank
		?><a <?php echo $class;
		echo $dropmenu; ?>href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; echo $addcaret; ?></a><?php
		break;
	case 2:
		// window.open
		?><a <?php echo $class;
		echo $dropmenu; ?>href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; echo $addcaret; ?></a>
		<?php
		break;
endswitch;
