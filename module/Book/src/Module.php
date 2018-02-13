<?php
namespace Book; //name angepasst 

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
        define('BOOK_MODULE_ROOT', __DIR__ . '/..');
    }
	
	
	 // Add this method:
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\BookTable::class => function($container) {
                    $tableGateway = $container->get(Model\BookTableGateway::class);
                    return new Model\BookTable($tableGateway);
                },
                Model\BookTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Book());
                    return new TableGateway('book', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
	
	// Add this method:
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\BookController::class => function($container) {
                    return new Controller\BookController(
                        $container->get(Model\BookTable::class)
                    );
                },
            ],
        ];
    }
}
?>