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
defined('GANTRY_VERSION') or die('Restricted access');

gantry_import('core.gantrylayout');

/**
 *
 * @package gantry
 * @subpackage html.layouts
 */
class GantryLayoutDoc_Tag extends GantryLayout
{

	var $render_params = array(
		'classes' => null
	);

	function render($params = array())
	{
		global $gantry;

		$fparams = $this->_getParams($params);

		ob_start();
		//XHTML LAYOUT
		?><?php if (strlen($fparams->classes) > 0): ?>class="<?php echo $fparams->classes; ?>"<?php endif; ?><?php
		return ob_get_clean();
	}

}