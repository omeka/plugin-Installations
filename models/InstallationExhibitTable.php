<?php

class InstallationExhibitTable extends Omeka_Db_Table
{
    
    protected $_alias = 'iet';
    
    public function _applySearchFilters($select, $params)
    {
        foreach($params as $field=>$value)
        {
            $select->where($this->_alias . ".$field = ? ", $value);
        }
        return $select;
    }
}