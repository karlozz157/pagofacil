<?php

interface AdapterInterface
{
    /**
     * @param string $table
     * @param array $params
     * @param array $where
     *
     * @return array
     */
    public function select($table, array $params = [], array $where = []);

    /**
     * @param string $table
     * @param array $params
     */
    public function insert($table, array $params = []);

    /**
     * @param string $table
     * @param array $params
     * @param array $where
     */
    public function update($table, array $params = [], array $where = []);

    /**
     * @param sting $table
     * @param array $where
     */
    public function delete($table, array $where = []);
}
