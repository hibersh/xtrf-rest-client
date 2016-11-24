<?php

namespace drunomics\XtrfClient\Model;

class XtrfDate
{
    /**
     * @var string
     */
    protected $formatted;
    /**
     * @var int
     */
    protected $millisGMT;
    /**
     * @return string
     */
    public function getFormatted()
    {
        return $this->formatted;
    }
    /**
     * @param string $formatted
     *
     * @return self
     */
    public function setFormatted($formatted = null)
    {
        $this->formatted = $formatted;
        return $this;
    }
    /**
     * @return int
     */
    public function getMillisGMT()
    {
        return $this->millisGMT;
    }
    /**
     * @param int $millisGMT
     *
     * @return self
     */
    public function setMillisGMT($millisGMT = null)
    {
        $this->millisGMT = $millisGMT;
        return $this;
    }
}