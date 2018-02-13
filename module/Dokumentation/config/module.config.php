<?php


namespace Dokumentation;


use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
        'routes' => [
            'dokumentation' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/:lang/dokumentation[/:action]',
                    'defaults' => [
                        'controller' => Controller\DokumentationController::class,
                        'action'     => 'index',
						'lang'       => 'de',
                    ],
					'constraints' => [
                        'lang' => '(de|en)',
                    ],
                ],
            ],
		],
	],
    'controllers' => [
        'factories' => [
            Controller\DokumentationController::class => InvokableFactory::class,
        ],
    ],
	//Für Sprache
	'translator' => [
        'translation_file_patterns' => [
            [
                'type'     => 'phparray',
                'base_dir' => DOKUMENTATION_MODULE_ROOT . '/language',
                'pattern'  => '%s.php',
            ],
        ],
    ],
	
    'view_manager' => [
        'template_path_stack' => [
           'dokumentation' => __DIR__ . '/../view',
        ],
    ],
 ];

