<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Application\I18n\I18nListener;
use Application\I18n\I18nListenerFactory;
use Zend\Navigation\Page\Mvc;
use Zend\Mvc\I18n\Router;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/:lang',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
						'lang'		 => 'de',
                    ],
					'constraints' => [
                        'lang' => '(de|en)',
                    ],
                ],
            ],
				
        /*    'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/:lang/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
						'lang' 		=> 'de',
                    ],
					
					'constraints' => [
                        'lang' => '(de|en)',
                    ],
                ],
            ], */
        ],
    ],
	
	'i18n' => [
        'defaultLang'    => 'de',
        'allowedLocales' => [
            'de' => 'de_DE',
            'en' => 'en_US',
			#'fr' => 'fr_FR',//Sprache
        ],
        'defaultRoute'   => 'home',
    ],
	
	'service_manager' => [
        'factories' => [
            I18nListener::class => I18nListenerFactory::class,
			TranslatorInterface::class => TranslatorServiceFactory::class,
        ],
    ],
	
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
	//für oberste Navigation
	'navigation' => [
        'default' => [
            [
                'label' => 'Home',
                'route' => 'home',
				'useRouteMatch' => true,
            ],	
        ],
    ], 
	//Für Sprache
	'translator' => [
        'translation_file_patterns' => [
            [
                'type'     => 'phparray',
                'base_dir' => APPLICATION_MODULE_ROOT . '/language',
                'pattern'  => '%s.php',
            ],
        ],
    ],
	
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
