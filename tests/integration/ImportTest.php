<?php
require_once(PLUGIN_DIR . '/Installations/includes/Importer.php');
class ImportTest extends Installations_Test_AppTestCase
{
    
    public function testImportInstallation()
    {
        $test_data = include(PLUGIN_DIR . '/Installations/tests/test_data.php');
        $importer = new InstallationsImporter($test_data);
        $importer->importInstallation($test_data['installation']);

        $db = get_db();
        $installations = $db->getTable('Installation')->findBy(array('key'=>'123key'));
        $this->assertEquals(1, count($installations));
        $installation = $installations[0];
        $this->assertEquals('123key', $installation->key);
    }
    
    public function testImportCollection()
    {
        $test_data = include(PLUGIN_DIR . '/Installations/tests/test_data.php');
        $importer = new InstallationsImporter($test_data);
        $importer->importCollection($test_data['collections'][0]);
        $db = get_db();
        $collections = $db->getTable('InstallationCollection')->findBy(array('installation_id'=>1, 'orig_id'=>10));
        $this->assertTrue(count($collections) == 1);
    }
    
    
    
    
}