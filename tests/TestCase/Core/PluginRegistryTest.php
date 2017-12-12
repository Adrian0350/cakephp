<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.6.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Test\TestCase\Core;

use Cake\Core\PluginRegistry;
use Cake\TestSuite\TestCase;
use TestPlugin\Plugin as TestPlugin;

/**
 * Plugin Registry Test
 */
class PluginRegistryTest extends TestCase
{

    /**
     * testRegistry
     *
     * @return void
     */
    public function testRegistry()
    {
        $registry = new PluginRegistry();
        $result = $registry->load('TestPlugin', [
            'className' => TestPlugin::class
        ]);
        $this->assertInstanceOf(TestPlugin::class, $result);

        $result = $registry->get('TestPlugin');
        $this->assertInstanceOf(TestPlugin::class, $result);

        $result = $registry->loaded();
        $this->assertEquals(['TestPlugin'], $result);
    }

    public function testDotSyntax()
    {
        /*
        $registry = new PluginRegistry();
        //$result = $registry->load('TestPlugin');
        //$this->assertInstanceOf(TestPlugin::class, $result);

        $result = $registry->load('Company\TestPluginFive');
        //$this->assertInstanceOf(TestPlugin::class, $result);
        debug($result);
        */
    }

    /**
     * @expectedException \Error
     * @expectedExceptionMessage Class 'DoesNotExist\Plugin' not found
     */
    public function testClassNotFoundException()
    {
        $registry = new PluginRegistry();
        $registry->load('DoesNotExist');
    }
}
