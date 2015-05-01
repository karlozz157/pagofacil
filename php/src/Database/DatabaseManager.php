<?php

class DatabaseManager
{
    /**
     * @var AdapterInterface $adapter
     */
    protected $adapter;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param string $table
     * @param array $params
     * @param array $where
     *
     * @return array
     */
    public function select($table, array $params = [], array $where = [])
    {
        return $this->adapter->select($table, $params, $where);
    }

    /**
     * @param string $table
     * @param array $params
     */
    public function insert($table, array $params = [])
    {
        $this->adapter->insert($table, $params);
    }

    /**
     * @param string $table
     * @param array $params
     * @param array $where
     */
    public function update($table, array $params = [], array $where = [])
    {
        $this->adapter->update($table, $params, $where);
    }

    /**
     * @param string $table
     * @param array $where
     */
    public function delete($table, array $where = [])
    {
        $this->adapter->update($table, $params, $where);
    }
}
