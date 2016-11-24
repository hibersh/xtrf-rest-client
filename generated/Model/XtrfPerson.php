<?php

namespace drunomics\XtrfClient\Model;

class XtrfPerson
{
    /**
     * @var string
     */
    protected $email;
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
    protected $position;
    /**
     * @var int
     */
    protected $version;
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email = null)
    {
        $this->email = $email;
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
    public function getPosition()
    {
        return $this->position;
    }
    /**
     * @param string $position
     *
     * @return self
     */
    public function setPosition($position = null)
    {
        $this->position = $position;
        return $this;
    }
    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }
    /**
     * @param int $version
     *
     * @return self
     */
    public function setVersion($version = null)
    {
        $this->version = $version;
        return $this;
    }
}