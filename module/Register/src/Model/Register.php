<?php
namespace Register\Model; //Ändern

// Add the following import statements:
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;


class Register implements InputFilterAwareInterface
{
    public $id;
    public $firstname;
    public $lastname;
	public $email;//eingefügt
	public $password;
	
	// Add this property:
    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->firstname = !empty($data['firstname']) ? $data['firstname'] : null;
        $this->lastname  = !empty($data['lastname']) ? $data['lastname'] : null;
		$this->email  = !empty($data['email']) ? $data['email'] : null; //eingefügt
		$this->password  = !empty($data['password']) ? $data['password'] : null; //eingefügt
    }
	
	// Add the following method:
    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
			'email'  => $this->email, //land hinzugefügt
			'password'  => $this->password,
        ];
    }
	
	/* Add the following methods: */

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) 
		{
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'firstname',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 2,
                        'max' => 50,
                    ],
                ],
            ],
        ]);
		
		$inputFilter->add([
            'name' => 'lastname',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 2,
                        'max' => 50,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => 'EmailAddress',
                    'options' => [
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                        'useMxCheck' => false,
                    ],
                ],
            ],
        ]);
		
		// neu eingefügt 
		// Add "password" field
            $inputFilter->add([           
                'name' => 'password',
				'required' => true,
                'attributes' => [
                    'id' => 'password'
                ],
                'options' => [
                    'label' => 'Choose Password',
					'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 20,
                ],
            ]);
		
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}
?>