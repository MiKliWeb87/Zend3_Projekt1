<?php
namespace Album;

use Zend\Router\Http\Segment;
use Zend\Navigation\Page\Mvc;
use Zend\Mvc\I18n\Router;
// Remove this:
#use Zend\ServiceManager\Factory\InvokableFactory;

return [
// And remove the entire "controllers" section here:
/*    'controllers' => [
        'factories' => [
            Controller\AlbumController::class => InvokableFactory::class,
        ],
    ], */
	
// The following section is new and should be added to your file: //* = 0 oder mehr, + 1 oder mehr, ? = 0 oder 1
    'router' => [
        'routes' => [
            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/:lang/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
						'lang' => '(de|en)',
						
                    ],
					
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
						'lang'       => 'de',
                    ],
                ],
            ],
        ],
    ],
	
	'navigation'    => [
        'default' => [
            'album' => [
                'type'          => Mvc::class,
                'order'         => '300',
                'label'         => 'Album',
                'route'         => 'album',
                'controller'    => Controller\AlbumController::class,
                'action'        => 'index',
                'useRouteMatch' => true,
                'pages'         => [
                    
					[
                        'label'  => 'Add',
                        'route'  => 'album',
                        'action' => 'add',
						'useRouteMatch' => true,
                    ],
					[
                        'label'  => 'Edit',
                        'route'  => 'album',
                        'action' => 'edit',
						'useRouteMatch' => true,
                    ],
                    [
                        'label'  => 'Delete',
                        'route'  => 'album',
                        'action' => 'delete',
						'useRouteMatch' => true,
                    ],
                ], 
            ], 
        ],
    ],
	
	
	//Für Sprache
	'translator' => [
        'translation_file_patterns' => [
            [
                'type'     => 'phparray',
                'base_dir' => ALBUM_MODULE_ROOT . '/language',
                'pattern'  => '%s.php',
            ],
        ],
    ],
	
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];
?>