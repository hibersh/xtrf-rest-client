<?php

namespace drunomics\XtrfClient\Model;

class XtrfCustomFields
{
    /**
     * @var string
     */
    protected $key;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $value;
    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }
    /**
     * @param string $key
     *
     * @return self
     */
    public function setKey($key = null)
    {
        $this->key = $key;
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
    public function getValue()
    {
        return $this->value;
    }
    /**
     * @param string $value
     *
     * @return self
     */
    public function setValue($value = null)
    {
        $this->value = $value;
        return $this;
    }
}