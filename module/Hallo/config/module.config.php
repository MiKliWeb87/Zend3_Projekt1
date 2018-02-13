<?php


namespace Hallo;


use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;


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
                        'lang' => '(de|en|fr)',
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

