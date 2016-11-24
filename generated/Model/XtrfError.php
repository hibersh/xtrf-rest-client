<?php

namespace drunomics\XtrfClient\Model;

class XtrfError
{
    /**
     * @var int
     */
    protected $status;
    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @param int $status
     *
     * @return self
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
        return $this;
    }
}