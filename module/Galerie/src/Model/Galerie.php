<?php
namespace Galerie\Model; //Ändern

// Add the following import statements:
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;


class Galerie implements InputFilterAwareInterface
{
    public $id;
    public $picname;
    public $figcaption;
	public $alttext;//eingefügt
	
	// Add this property:
    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->picname = !empty($data['picname']) ? $data['picname'] : null;
        $this->figcaption  = !empty($data['figcaption']) ? $data['figcaption'] : null;
		$this->alttext  = !empty($data['alttext']) ? $data['alttext'] : null; //eingefügt
    }
	
	// Add the following method:
    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'picname' => $this->picname,
            'figcaption'  => $this->figcaption,
			'alttext'  => $this->alttext, //alttext hinzugefügt
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
            'name' => 'picname',
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
                        'max' => 40,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'figcaption',
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
            'name' => 'alttext',
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