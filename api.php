<?php
/**
 *
 * Copyright 2007 Michael Cochrane <code@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */

 $_provides['pluginClasses'] = array(
    'JOJO_Plugin_Jojo_bannerimage' => 'Banner Image Manager',
);

$_options[] = array(
    'id' => 'bannerimages_num',
    'category' => 'Banner Images',
    'label' => 'Number of images',
    'description' => 'The number of banner images to rotate in the slideshow on each page. Use -1 for all.',
    'type' => 'integer',
    'default' => '3',
    'options' => ''
);
$_options[] = array(
    'id' => 'bannerimages_random',
    'category' => 'Banner Images',
    'label' => 'Shuffle images',
    'description' => 'If yes, the images will be shuffled before being displayed. If Start, the images will start from a random point, in order.',
    'type' => 'radio',
    'default' => 'yes',
    'options' => 'yes,start,no',
);
