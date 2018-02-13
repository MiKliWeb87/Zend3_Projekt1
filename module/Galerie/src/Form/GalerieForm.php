<?php
/* nicht benötigt ggf. für Hinzufügen
namespace Galerie\Form;

use Zend\Form\Form;

class GalerieForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('galerie');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'picname',
            'type' => 'text',
            'options' => [
                'label' => 'Picname',
            ],
        ]);
        $this->add([
            'name' => 'figcaption', //Bildunterschrift
            'type' => 'text',
            'options' => [
                'label' => 'figcaption',
            ],
        ]);
		//für Buch eingefügt
		$this->add([
            'name' => 'alttext',
            'type' => 'text',
            'options' => [
                'label' => 'Alttext',
            ],
        ]); 
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);
    }
} */
?>