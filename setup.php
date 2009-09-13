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


/* Edit Banner Images */
$data = JOJO::selectQuery("SELECT * FROM {page} WHERE pg_url='admin/edit/bannerimage'");
if (count($data) == 0) {
    echo "jojo_bannerimage: Adding <b>Edit Banner Images</b> Page to menu<br />";
    JOJO::insertQuery("INSERT INTO {page} SET pg_title='Edit Banner Images', pg_link='Jojo_Plugin_Admin_Edit', pg_url='admin/edit/bannerimage', pg_parent=?, pg_order=4", array($_ADMIN_CONTENT_ID));
}

/* Ensure there is a folder for uploading banner images */
$res = JOJO::RecursiveMkdir(_DOWNLOADDIR . '/banners');
if ($res === true) {
    echo "jojo_bannerimage: Created folder: " . _DOWNLOADDIR . '/bannerimages';
} elseif($res === false) {
    echo 'jojo_bannerimage: Could not automatically create ' .  _DOWNLOADDIR . '/bannerimages' . 'folder on the server. Please create this folder and assign 777 permissions.';
}