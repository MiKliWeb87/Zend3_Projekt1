<?php
namespace Galerie\Controller;

// Add the following import:
use Galerie\Model\GalerieTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

// Add the following import statements at the top of the file:
#use Galerie\Form\GalerieForm;
use Galerie\Model\Galerie;

class GalerieController extends AbstractActionController
{
	// Add this property:
    private $table;
	
	// Add this constructor:
    public function __construct(GalerieTable $table)
    {
        $this->table = $table;
    }
	
	public function indexAction()
	{
		// Grab the paginator from the AlbumTable:
		$paginator = $this->table->fetchAll(true);

		// Set the current page to what has been passed in query string,
		// or to 1 if none is set, or the page is invalid:
		$page = (int) $this->params()->fromQuery('page', 1);
		$page = ($page < 1) ? 1 : $page;
		$paginator->setCurrentPageNumber($page);

		// Set the number of items per page to 10:
		$paginator->setItemCountPerPage(5);

		return new ViewModel(['paginator' => $paginator, 'galerie' => '/img/picgal/']); //neuer Schlüssel zum Pfad der Bildergalerie, relativ zur index im public Ordner
	}
	
    

    /* Update the following method to read as follows: */
/*    public function addAction()
    {
        $form = new GalerieForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $galerie = new Galerie();
        $form->setInputFilter($galerie->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $galerie->exchangeArray($form->getData());
        $this->table->saveGalerie($galerie);
        return $this->redirect()->toRoute('galerie');
    }


    
	public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('galerie', ['action' => 'add']);
        }

        // Retrieve the galerie with the specified id. Doing so raises
        // an exception if the galerie is not found, which should result
        // in redirecting to the landing page.
        try 
		{
            $galerie = $this->table->getGalerie($id);
        } 
		catch (\Exception $e) 
		{
            return $this->redirect()->toRoute('galerie', ['action' => 'index']);
        }

        $form = new GalerieForm();
        $form->bind($galerie);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) 
		{
            return $viewData;
        }

        $form->setInputFilter($galerie->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) 
		{
            return $viewData;
        }

        $this->table->saveGalerie($galerie);

        // Redirect to galerie list
        return $this->redirect()->toRoute('galerie', ['action' => 'index']);
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('galerie');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deleteGalerie($id);
            }

            // Redirect to list of galeries
            return $this->redirect()->toRoute('galerie');
        }

        return [
            'id'    => $id,
            'galerie' => $this->table->getGalerie($id),
        ];
    } */
}
?>