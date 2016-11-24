<?php

namespace drunomics\XtrfClient\Model;

class XtrfUser
{
    /**
     * @var XtrfContact
     */
    protected $contact;
    /**
     * @var string
     */
    protected $firstName;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $lastName;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $position;
    /**
     * @var string
     */
    protected $type;
    /**
     * @return XtrfContact
     */
    public function getContact()
    {
        return $this->contact;
    }
    /**
     * @param XtrfContact $contact
     *
     * @return self
     */
    public function setContact(XtrfContact $contact = null)
    {
        $this->contact = $contact;
        return $this;
    }
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    /**
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName($firstName = null)
    {
        $this->firstName = $firstName;
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
    public function getLastName()
    {
        return $this->lastName;
    }
    /**
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param string $type
     *
     * @return self
     */
    public function setType($type = null)
    {
        $this->type = $type;
        return $this;
    }
}