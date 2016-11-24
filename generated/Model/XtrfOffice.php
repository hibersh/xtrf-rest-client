<?php

namespace drunomics\XtrfClient\Model;

class XtrfOffice
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var XtrfPerson[]
     */
    protected $persons;
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
     * @return XtrfPerson[]
     */
    public function getPersons()
    {
        return $this->persons;
    }
    /**
     * @param XtrfPerson[] $persons
     *
     * @return self
     */
    public function setPersons(array $persons = null)
    {
        $this->persons = $persons;
        return $this;
    }
}