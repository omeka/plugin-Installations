<?php

class InstallationItemTable extends Omeka_Db_Table
{
    

    protected $_alias = 'iit';
    
    public function _applySearchFilters($select, $params)
    {
        foreach($params as $field=>$value)
        {
            $select->where($this->_alias . ".$field = ? ", $value);
        }
        return $select;
    }
    
    
}