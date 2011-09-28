<?php

require_once (PLUGIN_DIR . '/Installations/tests/Installations_Test_AppTestCase.php');

class Installations_AllTests extends PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        $suite = new Installations_AllTests('Installations Tests');
        $testCollector = new PHPUnit_Runner_IncludePathTestCollector(
          array(dirname(__FILE__) . '/integration')
        );
        $suite->addTestFiles($testCollector->collectTests());
        return $suite;
    }
}