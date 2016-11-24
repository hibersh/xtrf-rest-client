<?php

namespace drunomics\XtrfClient\Model;

class XtrfLanguageCombinations
{
    /**
     * @var bool
     */
    protected $hasAssociatedTask;
    /**
     * @var XtrfLanguage
     */
    protected $sourceLanguage;
    /**
     * @var XtrfLanguage
     */
    protected $targetLanguage;
    /**
     * @return bool
     */
    public function getHasAssociatedTask()
    {
        return $this->hasAssociatedTask;
    }
    /**
     * @param bool $hasAssociatedTask
     *
     * @return self
     */
    public function setHasAssociatedTask($hasAssociatedTask = null)
    {
        $this->hasAssociatedTask = $hasAssociatedTask;
        return $this;
    }
    /**
     * @return XtrfLanguage
     */
    public function getSourceLanguage()
    {
        return $this->sourceLanguage;
    }
    /**
     * @param XtrfLanguage $sourceLanguage
     *
     * @return self
     */
    public function setSourceLanguage(XtrfLanguage $sourceLanguage = null)
    {
        $this->sourceLanguage = $sourceLanguage;
        return $this;
    }
    /**
     * @return XtrfLanguage
     */
    public function getTargetLanguage()
    {
        return $this->targetLanguage;
    }
    /**
     * @param XtrfLanguage $targetLanguage
     *
     * @return self
     */
    public function setTargetLanguage(XtrfLanguage $targetLanguage = null)
    {
        $this->targetLanguage = $targetLanguage;
        return $this;
    }
}