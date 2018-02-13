<?php
namespace Register; //name angepasst 

// Add these import statements:
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\ModuleManagerInterface; //Sprache


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
        define('REGISTER_MODULE_ROOT', __DIR__ . '/..');
    }
	
	 // Add this method:
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\RegisterTable::class => function($container) {
                    $tableGateway = $container->get(Model\RegisterTableGateway::class);
                    return new Model\RegisterTable($tableGateway);
                },
                Model\RegisterTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Register());
                    return new TableGateway('register', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
	
	// Add this method:
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\RegisterController::class => function($container) {
                    return new Controller\RegisterController(
                        $container->get(Model\RegisterTable::class)
                    );
                },
            ],
        ];
    }
}
?>