<?php

namespace drunomics\XtrfClient\Model;

class XtrfPriceProfile
{
    /**
     * @var XtrfPerson
     */
    protected $defaultContactPerson;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @return XtrfPerson
     */
    public function getDefaultContactPerson()
    {
        return $this->defaultContactPerson;
    }
    /**
     * @param XtrfPerson $defaultContactPerson
     *
     * @return self
     */
    public function setDefaultContactPerson(XtrfPerson $defaultContactPerson = null)
    {
        $this->defaultContactPerson = $defaultContactPerson;
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
}