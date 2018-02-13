<?php
namespace Hallo;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\ModuleManagerInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;


class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
	
	
	
	/**
     * Initialize module //für Translator
     *
     * @param ModuleManagerInterface $manager
     */
    public function init(ModuleManagerInterface $manager)
    {
        define('HALLO_MODULE_ROOT', __DIR__ . '/..');
    }
	
	
   }
 
?>