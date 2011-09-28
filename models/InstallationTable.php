<?php

class InstallationTable extends Omeka_Db_Table
{
    
    protected $_alias = 'it';
    
    public function _applySearchFilters($select, $params)
    {
        foreach($params as $field=>$value)
        {
            $select->where($this->_alias . ".$field = ? ", $value);
        }
        return $select;
    }
    
    
}