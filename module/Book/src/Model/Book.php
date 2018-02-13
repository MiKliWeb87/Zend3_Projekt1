<?php
namespace Book\Model; //Ändern

// Add the following import statements:
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;


class Book implements InputFilterAwareInterface
{
    public $id;
    public $autor;
    public $title;
	public $land;//eingefügt
	
	// Add this property:
    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->autor = !empty($data['autor']) ? $data['autor'] : null;
        $this->title  = !empty($data['title']) ? $data['title'] : null;
		$this->land  = !empty($data['land']) ? $data['land'] : null; //eingefügt
    }
	
	// Add the following method:
    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'autor' => $this->autor,
            'title'  => $this->title,
			'land'  => $this->land, //land hinzugefügt
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
            'name' => 'autor',
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
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'title',
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
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);
		// neu eingefügt 
		$inputFilter->add([
            'name' => 'land',
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
                        'max' => 100,
                    ],
                ],
            ],
        ]);
		
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}
?>