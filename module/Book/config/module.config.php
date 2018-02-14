<?php
namespace Book;

use Zend\Router\Http\Segment;
// Remove this:
#use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Navigation\Page\Mvc;
use Zend\Mvc\I18n\Router;
return [
// And remove the entire "controllers" section here:
/*    'controllers' => [
        'factories' => [
            Controller\BookController::class => InvokableFactory::class,
        ],
    ], */
	
// The following section is new and should be added to your file: //* = 0 oder mehr, + 1 oder mehr, ? = 0 oder 1
    'router' => [
        'routes' => [
            'book' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/:lang/book[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
						'lang' => '(de|en)',
                    ],
		
                    'defaults' => [
                        'controller' => Controller\BookController::class,
                        'action'     => 'index',
						'lang'       => 'de',
                    ],
                ],
		/*Versuch mit Child Routes 	
			'may_terminate' => true, //kann auch ohne action aufgerufen werden
                'child_routes'  => [
                    'add' => [
                        'type'    => Segment::class,
						'useRouteMatch' => true,
                        'options' => [
                            'route'       => '/[:id]',
                            'defaults'    => [
                                'controller' => Controller\BookController::class,
                            ],
                            'constraints' => [
                                #'action' => '(add|edit|delete|approve|block)',
                                'id'     => '[1-9][0-9]*',
                            ],
                        ],
                    ],
                    'edit'   => [
                        'type'    => Segment::class,
						'useRouteMatch' => true,
                        'options' => [
                            'route'       => '/[:id]',
                            'defaults'    => [
                                'action' => 'edit',
                            ],
                            'constraints' => [
								'controller' => Controller\BookController::class,
                                'id' => '[1-9][0-9]*',
                            ],
                        ],
                    ],
                    'delete'   => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'       => '/[:id]',
                            'constraints' => [
								'controller' => Controller\BookController::class,
                                'page' => '[1-9][0-9]*',
                            ],
                        ],
                    ],
                ],	*/ //Ende Child routes, kann wohl abgeschaltet werden	
            ],
        ],
    ],
	
	'navigation'    => [
        'default' => [
            'book' => [
                'type'          => Mvc::class,
                'order'         => '200',
                'label'         => 'Book',
                'route'         => 'book',
                'controller'    => Controller\BookController::class,
                'action'        => 'index',
                'useRouteMatch' => true,
                'pages'         => [
                    
					[
                        'label'  => 'Add',
                        'route'  => 'book',
                        'action' => 'add',
						'useRouteMatch' => true,
                    ],
					[
                        'label'  => 'Edit',
                        'route'  => 'book',
                        'action' => 'edit',
						'useRouteMatch' => true,
                    ],
                    [
                        'label'  => 'Delete',
                        'route'  => 'book',
                        'action' => 'delete',
						'useRouteMatch' => true,
                    ],
					/*'add' => [
                        'type'    => Mvc::class,
                        'route'   => 'book/add',
                        #'visible' => false,
                    ],
                    'edit' => [
                        'type'    => Mvc::class,
                        'route'   => 'book/edit',
                        #'visible' => false,
                    ],
                    'delete' => [
                        'type'    => Mvc::class,
                        'route'   => 'book/delete',
                        #'visible' => false,
                    ],*/
                ], 
            ], 
        ],
    ], 

    'view_manager' => [
        'template_path_stack' => [
            'book' => __DIR__ . '/../view',
        ],
    ],
	//Für Sprache
	'translator' => [
        'translation_file_patterns' => [
            [
                'type'     => 'phparray',
                'base_dir' => BOOK_MODULE_ROOT . '/language',
                'pattern'  => '%s.php',
            ],
        ],
    ],
];
?>