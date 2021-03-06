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

if ($feed != false)
{
	//image handling
	$iUrl = isset($feed->image->url) ? $feed->image->url : null;
	$iTitle = isset($feed->image->title) ? $feed->image->title : null;
	?>
	<div style="direction: <?php echo $rssrtl ? 'rtl' : 'ltr'; ?>; text-align: <?php echo $rssrtl ? 'right' : 'left'; ?> ! important"  class="feed<?php echo $moduleclass_sfx; ?>">
		<?php
		// feed description
		if (!is_null($feed->title) && $params->get('rsstitle', 1))
		{
			?>

			<h4>
				<a href="<?php echo str_replace('&', '&amp', $feed->link); ?>" target="_blank">
					<?php echo $feed->title; ?></a>
			</h4>

			<?php
		}

		// feed description
		if ($params->get('rssdesc', 1))
		{
			?>
			<?php echo $feed->description; ?>

			<?php
		}

		// feed image
		if ($params->get('rssimage', 1) && $iUrl)
		{
			?>
			<img src="<?php echo $iUrl; ?>" alt="<?php echo @$iTitle; ?>"/>

			<?php
		}

		$actualItems = count($feed->items);
		$setItems = $params->get('rssitems', 5);

		if ($setItems > $actualItems)
		{
			$totalItems = $actualItems;
		} else
		{
			$totalItems = $setItems;
		}
		?>

		<dl class="newsfeed<?php echo $params->get('moduleclass_sfx'); ?> nav nav-list">
			<?php
			$words = $params->def('word_count', 0);
			for ($j = 0; $j < $totalItems; $j++)
			{
				$currItem = & $feed->items[$j];
				// item title
				?>
				<div class="newsfeed-item">
					<?php if (!is_null($currItem->get_link()))
					{
						?>
						<?php
						if (!is_null($feed->title) && $params->get('rsstitle', 1))
						{
							echo '<dt class="h5 feed-link">';
						} else
						{
							echo '<dt class="feed-link">';
						}
						?>

						<a href="<?php echo $currItem->get_link(); ?>" target="_blank">
						<?php echo $currItem->get_title(); ?></a>
						<?php
						if (!is_null($feed->title) && $params->get('rsstitle', 1))
						{
							echo '</dt>';
						} else
						{
							echo '</dt>';
						}
						?>
						<?php
					}

					// item description
					if ($params->get('rssitemdesc', 1))
					{
						// item description
						$text = $currItem->get_description();
						$text = str_replace('&apos;', "'", $text);
						$text = strip_tags($text);
						// word limit check
						if ($words)
						{
							$texts = explode(' ', $text);
							$count = count($texts);
							if ($count > $words)
							{
								$text = '';
								for ($i = 0; $i < $words; $i++)
								{
									$text .= ' ' . $texts[$i];
								}
								$text .= '...';
							}
						}
						?>

						<dd><?php echo $text; ?></dd>

			<?php
		}
		?>
				</div>
		<?php
	}
	?>
		</dl>

	</div>
<?php } ?>
