<?php

namespace drunomics\XtrfClient\Model;

class XtrfLoginResponse
{
    /**
     * @var string
     */
    protected $jsessionid;
    /**
     * @return string
     */
    public function getJsessionid()
    {
        return $this->jsessionid;
    }
    /**
     * @param string $jsessionid
     *
     * @return self
     */
    public function setJsessionid($jsessionid = null)
    {
        $this->jsessionid = $jsessionid;
        return $this;
    }
}