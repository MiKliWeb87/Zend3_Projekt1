<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Dokumentation\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DokumentationController extends AbstractActionController
{
    public function indexAction()
    {
		$name = ['erstens'=>'Dokumentation zum Projekt ZF3_Projekt1',
				 'doc' => '/doc/cmd_protokoll_zend_projekt.html'];
		
		$doc = [];
		return new ViewModel($name); //, $doc
    }
}
