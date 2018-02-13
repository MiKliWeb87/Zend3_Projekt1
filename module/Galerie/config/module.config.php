<?php
namespace Galerie;

use Zend\Router\Http\Segment;
// Remove this:
#use Zend\ServiceManager\Factory\InvokableFactory;

return [
// And remove the entire "controllers" section here:
/*    'controllers' => [
        'factories' => [
            Controller\GalerieController::class => InvokableFactory::class,
        ],
    ], */
	
// The following section is new and should be added to your file: //* = 0 oder mehr, + 1 oder mehr, ? = 0 oder 1
    'router' => [
        'routes' => [
            'galerie' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/:lang/galerie[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
						'lang' => '(de|en)',
                    ],
		
                    'defaults' => [
                        'controller' => Controller\GalerieController::class,
                        'action'     => 'index',
						'lang'       => 'de',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'galerie' => __DIR__ . '/../view',
        ],
    ],
	//Für Sprache
	'translator' => [
        'translation_file_patterns' => [
            [
                'type'     => 'phparray',
                'base_dir' => GALERIE_MODULE_ROOT . '/language',
                'pattern'  => '%s.php',
            ],
        ],
    ],
];
?>