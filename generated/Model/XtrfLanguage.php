<?php

namespace drunomics\XtrfClient\Model;

class XtrfLanguage
{
    /**
     * @var string
     */
    protected $displayName;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $symbol;
    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }
    /**
     * @param string $displayName
     *
     * @return self
     */
    public function setDisplayName($displayName = null)
    {
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param int $id
     *
     * @return self
     */
    public function setId($id = null)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }
    /**
     * @param string $symbol
     *
     * @return self
     */
    public function setSymbol($symbol = null)
    {
        $this->symbol = $symbol;
        return $this;
    }
}