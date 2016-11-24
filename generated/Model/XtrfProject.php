<?php

namespace drunomics\XtrfClient\Model;

class XtrfProject
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $idNumber;
    /**
     * @var string
     */
    protected $refNumber;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var XtrfMoneyAmount
     */
    protected $tmSavings;
    /**
     * @var XtrfMoneyAmount
     */
    protected $totalAgreed;
    /**
     * @var XtrfLanguageCombinations[]
     */
    protected $languageCombinations;
    /**
     * @var XtrfDate
     */
    protected $startDate;
    /**
     * @var XtrfDate
     */
    protected $deadline;
    /**
     * @var bool
     */
    protected $hasInputWorkfiles;
    /**
     * @var bool
     */
    protected $hasInputResources;
    /**
     * @var XtrfOffice
     */
    protected $office;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var XtrfUser
     */
    protected $projectManager;
    /**
     * @var bool
     */
    protected $hasOutputFiles;
    /**
     * @var XtrfPerson[]
     */
    protected $contactPersons;
    /**
     * @var XtrfPerson[]
     */
    protected $additionalContacts;
    /**
     * @var XtrfCustomFields[]
     */
    protected $customFields;
    /**
     * @var bool
     */
    protected $awaitingCustomerReview;
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
    public function getIdNumber()
    {
        return $this->idNumber;
    }
    /**
     * @param string $idNumber
     *
     * @return self
     */
    public function setIdNumber($idNumber = null)
    {
        $this->idNumber = $idNumber;
        return $this;
    }
    /**
     * @return string
     */
    public function getRefNumber()
    {
        return $this->refNumber;
    }
    /**
     * @param string $refNumber
     *
     * @return self
     */
    public function setRefNumber($refNumber = null)
    {
        $this->refNumber = $refNumber;
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
     * @return XtrfMoneyAmount
     */
    public function getTmSavings()
    {
        return $this->tmSavings;
    }
    /**
     * @param XtrfMoneyAmount $tmSavings
     *
     * @return self
     */
    public function setTmSavings(XtrfMoneyAmount $tmSavings = null)
    {
        $this->tmSavings = $tmSavings;
        return $this;
    }
    /**
     * @return XtrfMoneyAmount
     */
    public function getTotalAgreed()
    {
        return $this->totalAgreed;
    }
    /**
     * @param XtrfMoneyAmount $totalAgreed
     *
     * @return self
     */
    public function setTotalAgreed(XtrfMoneyAmount $totalAgreed = null)
    {
        $this->totalAgreed = $totalAgreed;
        return $this;
    }
    /**
     * @return XtrfLanguageCombinations[]
     */
    public function getLanguageCombinations()
    {
        return $this->languageCombinations;
    }
    /**
     * @param XtrfLanguageCombinations[] $languageCombinations
     *
     * @return self
     */
    public function setLanguageCombinations(array $languageCombinations = null)
    {
        $this->languageCombinations = $languageCombinations;
        return $this;
    }
    /**
     * @return XtrfDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
    /**
     * @param XtrfDate $startDate
     *
     * @return self
     */
    public function setStartDate(XtrfDate $startDate = null)
    {
        $this->startDate = $startDate;
        return $this;
    }
    /**
     * @return XtrfDate
     */
    public function getDeadline()
    {
        return $this->deadline;
    }
    /**
     * @param XtrfDate $deadline
     *
     * @return self
     */
    public function setDeadline(XtrfDate $deadline = null)
    {
        $this->deadline = $deadline;
        return $this;
    }
    /**
     * @return bool
     */
    public function getHasInputWorkfiles()
    {
        return $this->hasInputWorkfiles;
    }
    /**
     * @param bool $hasInputWorkfiles
     *
     * @return self
     */
    public function setHasInputWorkfiles($hasInputWorkfiles = null)
    {
        $this->hasInputWorkfiles = $hasInputWorkfiles;
        return $this;
    }
    /**
     * @return bool
     */
    public function getHasInputResources()
    {
        return $this->hasInputResources;
    }
    /**
     * @param bool $hasInputResources
     *
     * @return self
     */
    public function setHasInputResources($hasInputResources = null)
    {
        $this->hasInputResources = $hasInputResources;
        return $this;
    }
    /**
     * @return XtrfOffice
     */
    public function getOffice()
    {
        return $this->office;
    }
    /**
     * @param XtrfOffice $office
     *
     * @return self
     */
    public function setOffice(XtrfOffice $office = null)
    {
        $this->office = $office;
        return $this;
    }
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
        return $this;
    }
    /**
     * @return XtrfUser
     */
    public function getProjectManager()
    {
        return $this->projectManager;
    }
    /**
     * @param XtrfUser $projectManager
     *
     * @return self
     */
    public function setProjectManager(XtrfUser $projectManager = null)
    {
        $this->projectManager = $projectManager;
        return $this;
    }
    /**
     * @return bool
     */
    public function getHasOutputFiles()
    {
        return $this->hasOutputFiles;
    }
    /**
     * @param bool $hasOutputFiles
     *
     * @return self
     */
    public function setHasOutputFiles($hasOutputFiles = null)
    {
        $this->hasOutputFiles = $hasOutputFiles;
        return $this;
    }
    /**
     * @return XtrfPerson[]
     */
    public function getContactPersons()
    {
        return $this->contactPersons;
    }
    /**
     * @param XtrfPerson[] $contactPersons
     *
     * @return self
     */
    public function setContactPersons(array $contactPersons = null)
    {
        $this->contactPersons = $contactPersons;
        return $this;
    }
    /**
     * @return XtrfPerson[]
     */
    public function getAdditionalContacts()
    {
        return $this->additionalContacts;
    }
    /**
     * @param XtrfPerson[] $additionalContacts
     *
     * @return self
     */
    public function setAdditionalContacts(array $additionalContacts = null)
    {
        $this->additionalContacts = $additionalContacts;
        return $this;
    }
    /**
     * @return XtrfCustomFields[]
     */
    public function getCustomFields()
    {
        return $this->customFields;
    }
    /**
     * @param XtrfCustomFields[] $customFields
     *
     * @return self
     */
    public function setCustomFields(array $customFields = null)
    {
        $this->customFields = $customFields;
        return $this;
    }
    /**
     * @return bool
     */
    public function getAwaitingCustomerReview()
    {
        return $this->awaitingCustomerReview;
    }
    /**
     * @param bool $awaitingCustomerReview
     *
     * @return self
     */
    public function setAwaitingCustomerReview($awaitingCustomerReview = null)
    {
        $this->awaitingCustomerReview = $awaitingCustomerReview;
        return $this;
    }
}