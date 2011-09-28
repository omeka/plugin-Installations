<?php
define('INSTALLATIONS_PLUGIN_DIR', dirname(__FILE__));
require_once PLUGIN_DIR . '/RecordRelations/includes/models/RelatableRecord.php';
class InstallationsPlugin extends Omeka_Plugin_Abstract
{
    
    protected $_hooks = array('install', 'uninstall');
    protected $_filters = array();
    protected $_options = null;
    
    public function install()
    {
        $db = get_db();
        //Installation table
        $sql = "
        CREATE TABLE IF NOT EXISTS `$db->Installation` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `url` text NULL,
          `admin_email` text NULL,
          `title` text NULL,
          `description` text NULL,
          `key` text NULL,
          `import_url` text NULL,
          `last_import` timestamp NULL DEFAULT NULL,
          `added` timestamp NULL DEFAULT NULL,
          `copyright_info` text,
          `author_info` text NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM ;
        
        ";
        $db->query($sql);
        //InstallationCollection table
        $sql = "
        CREATE TABLE IF NOT EXISTS `$db->InstallationCollection` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `installation_id` int(10) unsigned NOT NULL,
          `orig_id` int(10) unsigned NOT NULL,
          `url` text NULL,
          `title` text NULL,
          `description` text NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM ;
        ";
                
        $db->query($sql);
        
        //InstallationExhibit table
        $sql = "
        CREATE TABLE IF NOT EXISTS `$db->InstallationExhibit` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `installation_id` int(10) unsigned NOT NULL,
          `orig_id` int(10) unsigned NOT NULL,
          `url` text NULL,
          `title` text NULL,
          `description` text NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM ;
        ";
        
        $db->query($sql);
        //InstallationItem table
        $sql = "
        CREATE TABLE IF NOT EXISTS `$db->InstallationItem` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `item_id` int(10) unsigned NOT NULL,
          `installation_id` int(10) unsigned NOT NULL,
          `orig_id` int(10) unsigned NOT NULL,
          `url` text NULL,
          `license` text NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM ;
        ";
        $db->query($sql);
  
        //@TODO: remove after development
        //set up a fake installation to work with
        $inst = new Installation();
        $inst->url = "http://example.com";
        $inst->copyright_info = "CC-BY";
        $inst->save();
        
    }
    
    public function uninstall()
    {
        $db = get_db();
        $sql = "DROP TABLE IF EXISTS `$db->Installation`,
        		DROP TABLE IF EXISTS `$db->InstallationExhibit`,
        		DROP TABLE IF EXISTS `$db->InstallationCollection`,
        		DROP TABLE IF EXISTS `$db->InstallationItem`,
        ";
    }
    
    
    
}