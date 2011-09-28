<?php

class InstallationCollectionTable extends Omeka_Db_Table
{
    
    protected $_alias = 'ict';
    public function _applySearchFilters($select, $params)
    {
        foreach($params as $field=>$value)
        {
            $select->where($this->_alias . ".$field = ? ", $value);
        }
        return $select;
    }
}