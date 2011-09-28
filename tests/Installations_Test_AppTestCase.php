<?php

class Installations_Test_AppTestCase extends Omeka_Test_AppTestCase
{
    public function setUp()
    {
        parent::setUp();
        require_once PLUGIN_DIR . '/Installations/models/InstallationCollection.php';
        $pluginHelper = new Omeka_Test_Helper_Plugin;
        $pluginHelper->setUp('RecordRelations');
        $pluginHelper->setUp('Installations');
        $this->_setUpVocabs();
        $this->_setUpData();
        $this->_authenticateUser($this->_getDefaultUser());

    }

    public function tearDown()
    {
        parent::tearDown();
    }
    
    private function _setUpVocabs()
    {
        $vocabs = include PLUGIN_DIR . '/RecordRelations/formal_vocabularies.php';
        record_relations_install_properties($vocabs);
    }
    
    private function _setUpData()
    {
        $collection = new InstallationCollection();
        $collection->url = "http://example.org/test/collection";
        $collection->title = "Test Collection Title";
        $collection->orig_id = 2;
        $collection->installation_id = 1;
        $collection->save();
    }
}