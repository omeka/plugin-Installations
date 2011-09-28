<?php
//require_once INSTALLATIONS_PLUGIN_DIR . '/models/Installation.php';
//

class CollectionTableTest extends Installations_Test_AppTestCase
{
    public function testFindBy()
    {
        $db = get_db();
        $collection = $db->getTable('InstallationCollection')->findBy(array('installation_id'=>1, 'orig_id'=>2));
        $this->assertTrue(count($collection) > 0);
    }
    
}