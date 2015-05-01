<?php

class CompanyManager
{
    use DatabaseManagerAware;

    /**
     * @param array $criteria
     *
     * @return Company
     */
    public function findOne(array $criteria = [])
    {
        $companyArray = $this->databaseManager->select($table, $criteria);

        $company = new Company();
        $company->setId($companyArray['id']);
        $company->setName($companyArray['name']);

        return $company;
    }

    /**
     * @return CompanyCollection
     */
    public function fetchAll()
    {
        $companyCollection = new CompanyCollection();
        $companies = $this->databaseManager->select($this->table);

        foreach ($companies as $companyArray) {
            $company = new Company();
            $company->setId($company['id']);
            $company->setName($company['name']);

            $companyCollection->append($company);
        }

        return $companyCollection;
    }

    /**
     * @param Company $company
     */
    public function save(Company $company)
    {
        $params = [
            'name' => $company->getName(),
        ];

        $this->databaseManager->insert($this->table, $params);
    }

    /**
     * @param Company $company
     */
    public function update(Company $company)
    {
        $params = [
            'name' => $company->getName()
        ];

        $where  = [
            'id' => $company->getId()
        ];
        
        $this->databaseManager->update($this->table, $params, $where);
    }

    /**
     * @param Company $company 
     */
    public function remove(Company $company)
    {
        $where = [
            'id' => $company->getId()
        ];
        
        $this->databaseManager->delete($this->table, $where);
    }
}
