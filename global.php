<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2007 Harvey Kane <code@ragepank.com>
 * Copyright 2007 Michael Holt <code@gardyneholt.co.nz>
 * Copyright 2007 Melanie Schulz <mel@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @author  Tom Dale <tom@gardyneholt.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */


/* Create bannerimages array for header, shuffle them randomly and pick x to display {array_slice($bannerimages, 0, x) }*/

    $bannerimage_num = Jojo::getOption('bannerimages_num', 3);
    if ($bannerimage_num != 0) {
		$bannerimages = JOJO_Plugin_Jojo_bannerimage::getBannerImages();
		$shuffle_mode = Jojo::getOption('bannerimages_shuffle', 'yes');
		$count = count($bannerimages);
		if ($count) {
		    if ($shuffle_mode == 'yes') {
		        shuffle($bannerimages);
		    } else
		    if ($shuffle_mode == 'start') {
		        $split_point = rand(0, $count-1);
		        $first = array_slice($bannerimages, 0, $split_point);
		        $second = array_slice($bannerimages, $split_point);
		        $bannerimages = array_merge($second, $first);
		        /*
		        for ($i=0; $i<=$split_point; $i++) {
		            array_push($bannerimages, array_shift($bannerimages));
		        }
		        */
			}
		}
		if ($bannerimage_num != -1) {
			$bannerimages = array_slice($bannerimages, 0, $bannerimage_num);
		}
		$smarty->assign('bannerimages', $bannerimages);
	}
    
    
    
/** example usage in template
                <div id='header-gallery'>
                <div id="imageContainer">
{foreach from=$bannerimages key=k item=b}
                    <img src="images/445x400/bannerimages/{$b.src}"  alt="{$b.name}" title="{$b.caption}"{if $k==0 || $bannerimages-nojs } style="display: block"{/if} />
{/foreach}
                </div>
                <div id='caption' class="caption">
                        {$bannerimages[0].caption}
                </div>
            </div>

**/
