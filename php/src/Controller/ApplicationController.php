<?php

class ApplicationController extends AbstractController
{   
    /**
     * @var ApplicationManager $applicationManager
     */
    protected $applicationManager;

    public function indexAction()
    {
        $applications = $this->applicationManager->fetchAll();
        $this->view('index', ['applications' => $applications]);
    }

    public function newAction()
    {
        // some like that!
        if ($_POST) { 
            $this->applicationManager->save($application);
            $this->redirect('/applications');
        }

        $this->view('new');
    }

    public function editAction()
    {
        // some like that, I don't have time :-(
        if ($_POST) {
            $this->applicationManager->update($application);
            $this->redirect('/applications');
        }

        $this->view('edit');
    }

    public function deleteAction()
    {
        $this->applicationManager->remove($application);
        $this->redirect('/applications');
    }

    /**
     * @param ApplicationManager $applicationManager
     */
    public function setApplicationManager(ApplicationManager $applicationManager)
    {
        $this->applicationManager = $applicationManager;
    }

    /**
     * @return ApplicationManager
     */
    public function getApplicationManager()
    {
        return $this->applicationManager;
    }
}
