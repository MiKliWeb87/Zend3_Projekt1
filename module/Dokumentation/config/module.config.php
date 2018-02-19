<?php


namespace Dokumentation;


use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Navigation\Page\Mvc;
use Zend\Mvc\I18n\Router;


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
			'may_terminate' => true,
            ],
		],
	],
    'controllers' => [
        'factories' => [
            Controller\DokumentationController::class => InvokableFactory::class,
        ],
    ],
	
	'navigation'    => [
        'default' => [
            'dokumentation' => [
                'type'          => Mvc::class,
                'order'         => '700',
                'label'         => 'Dokumentation',
                'route'         => 'dokumentation',
                'controller'    => Controller\DokumentationController::class,
                'action'        => 'index',
                'useRouteMatch' => true,
            /*    'pages'         => [
                    
					[
                        'label'  => 'Add',
                        'route'  => 'dokumentation',
                        'action' => 'add',
						'useRouteMatch' => true,
                    ],
					[
                        'label'  => 'Edit',
                        'route'  => 'dokumentation',
                        'action' => 'edit',
						'useRouteMatch' => true,
                    ],
                    [
                        'label'  => 'Delete',
                        'route'  => 'dokumentation',
                        'action' => 'delete',
						'useRouteMatch' => true,
                    ],
                ], */
            ], 
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

