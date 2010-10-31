<?php

if (!defined('_MULTILANGUAGE')) {
    define('_MULTILANGUAGE', Jojo::getOption('multilanguage', 'no') == 'yes');
}

$table = 'bannerimage';
$query = "
    CREATE TABLE {bannerimage} (
      `bannerimageid` int(11) NOT NULL auto_increment,
      `bi_name` varchar(255) NOT NULL default '',
      `bi_caption` varchar(255) NOT NULL default '',
      ";
if (_MULTILANGUAGE) {
    $languages = Jojo::selectQuery("SELECT * from {language} WHERE `active` = '1'");
    $dlanguage = Jojo::getOption('multilanguage-default', 'en');
          
    foreach ($languages as $l ){    
        if ($l['languageid'] != $dlanguage) {
        $query .= "`bi_caption_" . $l['languageid']  . "` varchar(255),
        ";
        }
    }      
}           
$query .= "      
      `bi_image` varchar(255) NOT NULL default '',
      PRIMARY KEY  (`bannerimageid`),
      FULLTEXT KEY `caption` (`bi_caption`)
    ) TYPE=MyISAM ;";

/* Check table structure */
$result = JOJO::checkTable($table, $query);

/* Output result */
if (isset($result['created'])) {
    echo sprintf("jojo_bannerimage: Table <b>%s</b> Does not exist - created empty table.<br />", $table);
}

if (isset($result['added'])) {
    foreach ($result['added'] as $col => $v) {
        echo sprintf("jojo_bannerimage: Table <b>%s</b> column <b>%s</b> Does not exist - added.<br />", $table, $col);
    }
}

if (isset($result['different'])) JOJO::printTableDifference($table,$result['different']);