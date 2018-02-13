<?php
namespace Album;

use Zend\Router\Http\Segment;
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
						'lang' => '(de|en|fr)',
						
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