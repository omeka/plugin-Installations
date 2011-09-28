<?php

class Installations_IndexController extends Omeka_Controller_Action
{
    
    public function indexAction()
    {
        $this->redirect->gotoSimple('browse', 'installations');
        return;
    }
    
}