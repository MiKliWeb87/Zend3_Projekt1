<?php
namespace Book\Form;

use Zend\Form\Form;

class BookForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('book');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Title',
            ],
        ]);
        $this->add([
            'name' => 'autor',
            'type' => 'text',
            'options' => [
                'label' => 'Autor',
            ],
        ]);
		//für Buch eingefügt
		$this->add([
            'name' => 'land',
            'type' => 'text',
            'options' => [
                'label' => 'Land',
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
}
?>