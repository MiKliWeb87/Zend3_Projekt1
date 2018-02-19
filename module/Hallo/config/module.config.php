<?php


namespace Hallo;


use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Navigation\Page\Mvc;
use Zend\Mvc\I18n\Router;


return [
    'router' => [
        'routes' => [
            'hallo' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/:lang/hallo[/:action]',
                    'defaults' => [
                        'controller' => Controller\HalloController::class,
                        'action'     => 'index',
						'lang'       => 'de',
                    ],
					'constraints' => [
                        'lang' => '(de|en)', //Hier kann Sprache dazukommen
                    ],
                ],
            ],
		],
	],
    'controllers' => [
        'factories' => [
            Controller\HalloController::class => InvokableFactory::class,
        ],
    ],
	
	'navigation'    => [
        'default' => [
            'hallo' => [
                'type'          => Mvc::class,
                'order'         => '200',
                'label'         => 'Hallo',
                'route'         => 'hallo',
                'controller'    => Controller\HalloController::class,
                'action'        => 'index',
                'useRouteMatch' => true,
            ], 
        ],
    ],
	
	//Für Sprache
	'translator' => [
        'translation_file_patterns' => [
            [
                'type'     => 'phparray',
                'base_dir' => HALLO_MODULE_ROOT . '/language',
                'pattern'  => '%s.php',
            ],
        ],
    ],
	
    'view_manager' => [
        'template_path_stack' => [
           'hallo' => __DIR__ . '/../view',
        ],
    ],
 ];

