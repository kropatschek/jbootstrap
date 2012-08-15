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
class GantryLayoutMod_Standard extends GantryLayout
{

	var $render_params = array(
		'contents' => null,
		'gridCount' => null,
		'prefixCount' => 0,
		'extraClass' => ''
	);

	function render($params = array())
	{
		global $gantry;

		$rparams = $this->_getParams($params);

		$prefixClass = '';

		if ($rparams->prefixCount != 0)
		{
			$prefixClass = " jb-prefix-" . $rparams->prefixCount;
		}
		ob_start();
		// XHTML LAYOUT
		?>
		<div class="span<?php echo $rparams->gridCount . $prefixClass . $rparams->extraClass; ?>">
		<?php echo $rparams->contents; ?>
		</div>
		<?php
		return ob_get_clean();
	}

}