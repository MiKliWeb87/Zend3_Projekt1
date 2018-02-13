<?php
namespace Register\Form;

use Zend\Form\Form;

class RegisterForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('register');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'firstname',
            'type' => 'text',
            'options' => [
                'label' => 'Firstname', //kein translate notwendig, direkt als Schlüssel in Sprachdatei
            ],
        ]);
        $this->add([
            'name' => 'lastname',
            'type' => 'text',
            'options' => [
                'label' => 'Lastname',
            ],
        ]);
		// eingefügt
		$this->add([
            'name' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'Email',
            ],
        ]);
		$this->add([
            'name' => 'password',
            'type' => 'password',
            'options' => [
                'label' => 'Password',
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