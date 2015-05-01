<?php

class ApplicationManager
{
    use DatabaseManagerAware;

    /**
     * @var CompanyManager $companyManager
     */
    protected $companyManager;

    /**
     * @param array $criteria
     *
     * @return Application
     */
    public function findOne(array $criteria = [])
    {
        $data = $this->databaseManager->select($this->table, $criteria);
        $company = $this->companyManager->findOne(['id' => $data['id']]);

        $application = new Application();
        $application->setId($data['id']);
        $application->setCompany($company);
        $application->setName($data['name']);

        return $application;
    }

    /**
     * @return ApplicationCollection
     */
    public function fetchAll()
    {
        $applicationCollection = new ApplicationCollection();
        $data = $this->databaseManager->select($this->table);

        foreach ($data as $applicationArray) {
            $company = $this->companyManager->findOne(['id' => $applicationArray['id']]);

            $application = new Application();
            $application->setId($applicationArray['id']);
            $application->setName($applicationArray['name']);
            $application->setCompany($company);

            $applicationCollection->append($collection);
        }

        return $applicationCollection;
    }

    /**
     * @param Application $application
     */
    public function save(Application $application)
    {
        $params = [
            'name'        => $application->getName(),
            'company'     => $application->getCompany()->getId(),
            'description' => $application->getDescription(),
        ];

        $this->databaseManager->insert($this->table, $params);
    }

    /**
     * @param Application $application
     */
    public function update(Application $application)
    {
        $params = [
           'name'        => $application->getName(),
           'company'     => $application->getCompany()->getId(),
           'description' => $application->getDescription(),
        ];

        $where = [
            'id' => $application->getId()
        ];
        
        $this->databaseManager->update($this->table, $params, $where);        
    }

    /**
     * @param Application $application
     */
    public function remove(Application $application)
    {
        $where = [
            'id' => $application->getId()
        ];
        
        $this->databaseManager->delete($this->table, $where);
    }

    /**
     * @param CompanyManager $companyManager
     */
    public function setCompanyManager(CompanyManager $companyManager)
    {
        $this->companyManager = $companyManager;
    }

    /**
     * @return CompanyManager
     */
    public function getCompanyManager()
    {
        return $this->companyManager;
    }
}
