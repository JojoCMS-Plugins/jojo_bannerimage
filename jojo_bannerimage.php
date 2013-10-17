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

class JOJO_Plugin_Jojo_bannerimage extends JOJO_Plugin
{
    public static function getBannerImages() {
        global $page;
        if (_MULTILANGUAGE) $language = !empty($page->page['pg_language']) ? $page->page['pg_language'] : Jojo::getOption('multilanguage-default', 'en');
        $dlanguage = Jojo::getOption('multilanguage-default', 'en');
        $order = Jojo::getOption('bannerimage_random', 'yes')=='no' ? 'displayorder, bi_name': 'bi_name';
        $query = "SELECT * FROM {bannerimage} ORDER BY " . $order;

        $bannerimages = Jojo::selectQuery($query);
        foreach ($bannerimages as &$a){
            $a['name'] = htmlspecialchars($a['bi_name'], ENT_COMPAT, 'UTF-8', false);
            $a['caption'] = (_MULTILANGUAGE && $language != $dlanguage && $a['bi_caption' . '_' . $language] ) ? $a['bi_caption' . '_' . $language] : $a['bi_caption' ];
            $a['caption'] = htmlspecialchars($a['caption'], ENT_COMPAT, 'UTF-8', false);
            $a['src'] = urlencode($a['bi_image']);
        }
        return $bannerimages;
    }

    public static function bannerHTML()
    {
        global $smarty;
        $bannerimages = self::getBannerImages();
        if ($bannerimages) {
            $bannerimage_num = Jojo::getOption('bannerimages_num', 3);
            $shuffle_mode = Jojo::getOption('bannerimage_random', 'yes');
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

            $smarty->assign('bannernum', $bannerimage_num);
            $smarty->assign('bannersize', Jojo::getOption('bannerimage_size', '940x200'));
            $smarty->assign('bannertitles', (boolean)(Jojo::getOption('bannerimage_titles', 'yes')=='yes'));
            $smarty->assign('bannercaptions', (boolean)(Jojo::getOption('bannerimage_captions', 'yes')=='yes'));
            $smarty->assign('bannercarousel', (boolean)(Jojo::getOption('bannerimage_carousel', 'no')=='yes'));
            $smarty->assign('bannercarouselnav', (boolean)(Jojo::getOption('bannerimage_carousel_nav', 'yes')=='yes'));
            $smarty->assign('bannercarouselpause', (Jojo::getOption('bannerimage_carousel_pause', 'yes')=='yes' ? 'hover' : 'none'));
            $smarty->assign('bannerinterval', Jojo::getOption('bannerimages_interval', 6000));
            $smarty->assign('bannerslide', (boolean)(Jojo::getOption('bannerimage_slide', 'yes')=='yes'));
            $bannercode = $smarty->fetch('jojo_bannerimage.tpl');
            return $bannercode;
        }
        return '';
    }


}
