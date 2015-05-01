<?php

trait IdentifiableAware
{
    /**
     * @var int $id
     */
    protected $id;
    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
