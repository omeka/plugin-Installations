<?php
/*
 * This will later be sorted out into a real importer. Now, it is mostly for testing and developing
 */

class InstallationsImporter
{
    private $installation_id;
    private $db;
    private $key;
    
    public function __construct($data)
    {
        $this->db = get_db();
        $this->key = $data['key'];
        $installation = $this->db->getTable('Installation')->findBy(array('key'=>$data['key']));
        if($installation) {
            $this->installation_id = $installation->id;
        }
    }
    public function importInstallation($data)
    {
        
        //$installations = $this->db->getTable('Installation')->findBy(array($this->key));
        if(empty($this->installation_id)) {
            $installation = new Installation();
        } else {
            $installation = $this->db->getTable('Installation')->find($this->installation_id);
        }
        foreach($data as $key=>$value) {
            $installation->$key = $value;
        }
        $installation->last_import = Zend_Date::now()->toString('yyyy-MM-dd HH:mm:ss');
        $installation->key = $this->key;
        $installation->save();
        
        $this->installation_id = $installation->id;
    }
    
    public function importCollection($data)
    {
        
        $collections = $this->db->getTable('InstallationCollection')->findBy(array(
            															'installation_id'=>$this->installation_id,
            															'orig_id'=>$data['orig_id']
                                                                        )
                                                                    );

        if(empty($collections)) {
            $collection = new InstallationCollection();
        } else {
            $collection = $collections[0];
        }
        foreach($data as $key=>$value) {
            $collection->$key = $value;
        }
        $collection->save();
    }
    
    public function importItem($data)
    {
        
        $item = $this->db->getTable('InstallationItem')->findBy(array(
        															'installation_id'=>$this->installation_id,
        															'orig_id'=>$data['orig_id']
                                                                    )
                                                                );
        if(empty($item)) {
            $collection = new $type();
        }
        foreach($data as $key=>$value) {
            $item->$key = $value;
        }
        // @TODO: setup item relations
        $item->save();
    }
    
    public function importExhibit($data)
    {
        
        $exhibit = $this->db->getTable('InstallationExhibit')->findBy(array(
            															'installation_id'=>$this->installation_id,
            															'orig_id'=>$data['orig_id']
                                                                        )
                                                                    );
        if(empty($exhibit)) {
            $exhibit = new InstallationExhibit();
        }
        foreach($data as $key=>$value) {
            $exhibit->$key = $value;
        }
        $exhibit->save();
    }
    
}