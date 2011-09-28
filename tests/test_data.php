<?php

$test_data = array(
    'key' => '123key',
    'installation' => array(
                    'url' => 'http://example.com/installation',
                    'title' => 'Installation Title',
                    'admin_email' => 'admin@example.com',
                    'description' => 'Installation Description',
                    'import_url' => 'http://example.com/import_url',
                    'copyright_info' => 'CC-BY',
                    'author_info' => 'Installation Author Info'
                    ),
    'collections' => array(
                        array(
                            'title' => 'Collection Title',
                            'description' => 'Collection Description',
                            'orig_id' => 10,
                            'url' => 'http://example.com/collection'
                        ),
                        array(
                        
                        )
                    ),
                    
    'exhibits' => array(
                        array(
                            'title'=> 'Exhibit1 Title',
                            'description' => 'Exhibit1 Description',
                            'url' => 'http://example.com/exhibit1',
                            'orig_id' => 5
                        
                        ),
                        array(
                        
                        )
                    ),
                    
    'items' => array(
                        array(
                        
                        
                        ),
                        array(
                        
                        )
                    )

);

return $test_data;