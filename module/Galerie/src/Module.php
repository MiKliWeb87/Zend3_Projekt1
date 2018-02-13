<?php
namespace Galerie; //name angepasst 

// Add these import statements:
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\ModuleManagerInterface;

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
        define('GALERIE_MODULE_ROOT', __DIR__ . '/..');
    }
	
	
	 // Add this method:
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\GalerieTable::class => function($container) {
                    $tableGateway = $container->get(Model\GalerieTableGateway::class);
                    return new Model\GalerieTable($tableGateway);
                },
                Model\GalerieTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Galerie());
                    return new TableGateway('galerie', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
	
	// Add this method:
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\GalerieController::class => function($container) {
                    return new Controller\GalerieController(
                        $container->get(Model\GalerieTable::class)
                    );
                },
            ],
        ];
    }
}
?>