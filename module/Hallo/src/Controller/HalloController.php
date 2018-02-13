<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Hallo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HalloController extends AbstractActionController
{
    public function indexAction()
    {
		$name = ['wort'=>'Pause','nachname'=>'Doe ' , 'vorname'=>'John ', 'phrase'=>'hallo '];
		return new ViewModel($name);
    }
}
