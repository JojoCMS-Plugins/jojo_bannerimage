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
 * @author  Harvey Kane <code@ragepank.com>
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @author  Melanie Schulz <mel@gardyneholt.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */

if (!defined('_MULTILANGUAGE')) {
    define('_MULTILANGUAGE', Jojo::getOption('multilanguage', 'no') == 'yes');
}

$table = 'bannerimage';
$o = 1;

$default_td[$table]['td_displayfield'] = 'bi_name';
$default_td[$table]['td_parentfield'] = '';
$default_td[$table]['td_orderbyfields'] = 'bi_name';
$default_td[$table]['td_topsubmit'] = 'yes';
$default_td[$table]['td_filter'] = 'yes';
$default_td[$table]['td_deleteoption'] = 'yes';
$default_td[$table]['td_menutype'] = 'list';
$default_td[$table]['td_categoryfield'] = '';
$default_td[$table]['td_categorytable'] = '';
$default_td[$table]['td_group1'] = '';
$default_td[$table]['td_help'] = 'Bannerimages are managed from here.  The system will comfortably take many hundreds of quotes, but you may want to manually delete anything that is no longer relevant, or correct.';

//bannerimage ID
$field = 'bannerimageid';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'readonly';
$default_fd[$table][$field]['fd_help'] = 'A unique ID, automatically assigned by the system';
$default_fd[$table][$field]['fd_mode'] = 'advanced';
$default_fd[$table][$field]['fd_tabname'] = 'Content';

//Image name
$field = 'bi_name';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'text';
$default_fd[$table][$field]['fd_required'] = 'yes';
$default_fd[$table][$field]['fd_size'] = '60';
$default_fd[$table][$field]['fd_help'] = 'Title of the image.';
$default_fd[$table][$field]['fd_mode'] = 'basic';
$default_fd[$table][$field]['fd_tabname'] = 'Content';

//Image
$field = 'bi_image';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'fileupload';
$default_fd[$table][$field]['fd_help'] = 'An image for the banner';
$default_fd[$table][$field]['fd_mode'] = 'standard';
$default_fd[$table][$field]['fd_tabname'] = 'Content';
$default_fd[$table][$field]['fd_required'] = 'yes';

//Image caption
$field = 'bi_caption';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'text';
$default_fd[$table][$field]['fd_required'] = 'yes';
$default_fd[$table][$field]['fd_size'] = '80';
$default_fd[$table][$field]['fd_help'] = 'Caption description of the image.';
$default_fd[$table][$field]['fd_mode'] = 'basic';
$default_fd[$table][$field]['fd_tabname'] = 'Content';

if (_MULTILANGUAGE) {
    $dlanguage = Jojo::getOption('multilanguage-default', 'en');
    $languages = Jojo::selectQuery("SELECT * from {language} WHERE `active`=1");
    foreach ($languages as $l ){    
        if ($l['languageid'] != $dlanguage) {
            $field = 'bi_caption_' . $l['languageid'];
            $default_fd[$table][$field]['fd_order']     = $o++;
            $default_fd[$table][$field]['fd_name'] = $l['english_name'] . ' caption';
            $default_fd[$table][$field]['fd_type']      = 'text';
            $default_fd[$table][$field]['fd_size'] = '80';
            $default_fd[$table][$field]['fd_mode']      = 'basic';
            $default_fd[$table][$field]['fd_tabname'] = 'Content';
        }
    }      
}