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
}