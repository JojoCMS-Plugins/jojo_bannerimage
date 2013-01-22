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

Jojo::addHook('BannerImages', 'bannerHTML', 'jojo_bannerimage');

$_options[] = array(
    'id' => 'bannerimages_num',
    'category' => 'Banner Images',
    'label' => 'Number of images',
    'description' => 'The number of banner images to rotate in the slideshow on each page. Use -1 for all.',
    'type' => 'integer',
    'default' => 3,
    'options' => '',
    'plugin' => 'jojo_bannerimage'
);

$_options[] = array(
    'id' => 'bannerimages_interval',
    'category' => 'Banner Images',
    'label' => 'Slide interval',
    'description' => 'The time between slides (in milliseconds)',
    'type' => 'integer',
    'default' => 6000,
    'options' => '',
    'plugin' => 'jojo_bannerimage'
);

$_options[] = array(
    'id' => 'bannerimage_random',
    'category' => 'Banner Images',
    'label' => 'Shuffle images',
    'description' => 'If yes, the images will be shuffled before being displayed. If Start, the images will start from a random point, in order.',
    'type' => 'radio',
    'default' => 'yes',
    'options' => 'yes,start,no',
    'plugin' => 'jojo_bannerimage'
);

$_options[] = array(
    'id' => 'bannerimage_captions',
    'category' => 'Banner Images',
    'label' => 'Display image captions',
    'description' => '',
    'type' => 'radio',
    'default' => 'yes',
    'options' => 'yes,no',
    'plugin' => 'jojo_bannerimage'
);

$_options[] = array(
    'id' => 'bannerimage_slide',
    'category' => 'Banner Images',
    'label' => 'Slideshow',
    'description' => 'Transition images (rather than just displaying all of them at once)',
    'type' => 'radio',
    'default' => 'yes',
    'options' => 'yes,no',
    'plugin' => 'jojo_bannerimage'
);

$_options[] = array(
    'id' => 'bannerimage_carousel',
    'category' => 'Banner Images',
    'label' => 'Use Boostrap Carousel',
    'description' => 'Use BS Carousel for transitioning rather than fading (requires the carousel option to be enabled)',
    'type' => 'radio',
    'default' => 'no',
    'options' => 'yes,no',
    'plugin' => 'jojo_bannerimage'
);

$_options[] = array(
    'id' => 'bannerimage_carousel_nav',
    'category' => 'Banner Images',
    'label' => 'Carousel Controls',
    'description' => 'Show Carousel control buttons',
    'type' => 'radio',
    'default' => 'yes',
    'options' => 'yes,no',
    'plugin' => 'jojo_bannerimage'
);

$_options[] = array(
    'id' => 'bannerimage_carousel_pause',
    'category' => 'Banner Images',
    'label' => 'Carousel Pause',
    'description' => 'Pause carousel on mouseover',
    'type' => 'radio',
    'default' => 'yes',
    'options' => 'yes,no',
    'plugin' => 'jojo_bannerimage'
);

$_options[] = array(
    'id' => 'bannerimage_size',
    'category' => 'Banner Images',
    'label' => 'Image size',
    'description' => '',
    'type' => 'text',
    'default' => '940x200',
    'options' => '',
    'plugin' => 'jojo_bannerimage'
);
