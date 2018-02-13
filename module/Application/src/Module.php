<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\I18n\I18nListener;
#use Application\View\LayoutListener;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\ModuleManagerInterface;
use Zend\Mvc\MvcEvent;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
	
	/**
     * @param EventInterface|MvcEvent $e
     */
    public function onBootstrap(EventInterface $e)
    {
        // get services
        $serviceManager = $e->getApplication()->getServiceManager();

        // add listeners
        $eventManager = $e->getApplication()->getEventManager();

        #$layoutListener = new LayoutListener(['header', 'footer']);
        #$layoutListener->attach($eventManager);

        /** @var I18nListener $i18nListener */
        $i18nListener = $serviceManager->get(I18nListener::class);
        $i18nListener->attach($eventManager);
    }
	
	/**
     * Initialize module //für Translator
     *
     * @param ModuleManagerInterface $manager
     */
    public function init(ModuleManagerInterface $manager)
    {
        define('APPLICATION_MODULE_ROOT', __DIR__ . '/..');
    }
}
