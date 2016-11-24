<?php

namespace drunomics\XtrfClient\Model;

class XtrfSpecialization
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $localizedName;
    /**
     * @var string
     */
    protected $name;
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
    public function getLocalizedName()
    {
        return $this->localizedName;
    }
    /**
     * @param string $localizedName
     *
     * @return self
     */
    public function setLocalizedName($localizedName = null)
    {
        $this->localizedName = $localizedName;
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
}