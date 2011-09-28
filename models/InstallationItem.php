<?php

class InstallationItem extends RelatableRecord
{
    public $id;
    public $item_id;
    public $installation_id;
    public $orig_id;
    public $url;
    public $license;
    
    protected $property_id;
    protected $namespace = SIOC;
    protected $local_part = 'has_space';
    protected $subject_record_type = 'InstallationItem';
    protected $object_record_type = 'InstallationExhibit';
    protected $_isSubject = true;
    
}