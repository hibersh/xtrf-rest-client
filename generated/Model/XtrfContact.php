<?php

namespace drunomics\XtrfClient\Model;

class XtrfContact
{
    /**
     * @var string
     */
    protected $email;
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
}