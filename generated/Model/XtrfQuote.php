<?php

namespace drunomics\XtrfClient\Model;

class XtrfQuote
{
    /**
     * @var XtrfUser
     */
    protected $accepter;
    /**
     * @var bool
     */
    protected $autoAccept;
    /**
     * @var string
     */
    protected $customerNotes;
    /**
     * @var XtrfDate
     */
    protected $deadline;
    /**
     * @var XtrfDate
     */
    protected $estimatedDeliveryDate;
    /**
     * @var XtrfDate
     */
    protected $expiryDate;
    /**
     * @var bool
     */
    protected $hasInputResources;
    /**
     * @var bool
     */
    protected $hasInputWorkfiles;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $idNumber;
    /**
     * @var XtrfLanguageCombinations[]
     */
    protected $languageCombinations;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var XtrfOffice
     */
    protected $office;
    /**
     * @var XtrfUser
     */
    protected $projectManager;
    /**
     * @var string
     */
    protected $refNumber;
    /**
     * @var XtrfUser
     */
    protected $salesPerson;
    /**
     * @var string
     */
    protected $service;
    /**
     * @var string
     */
    protected $specialization;
    /**
     * @var XtrfDate
     */
    protected $startDate;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var XtrfMoneyAmount
     */
    protected $tmSavings;
    /**
     * @var XtrfMoneyAmount
     */
    protected $totalAgreed;
    /**
     * @var string
     */
    protected $workflow;
    /**
     * @return XtrfUser
     */
    public function getAccepter()
    {
        return $this->accepter;
    }
    /**
     * @param XtrfUser $accepter
     *
     * @return self
     */
    public function setAccepter(XtrfUser $accepter = null)
    {
        $this->accepter = $accepter;
        return $this;
    }
    /**
     * @return bool
     */
    public function getAutoAccept()
    {
        return $this->autoAccept;
    }
    /**
     * @param bool $autoAccept
     *
     * @return self
     */
    public function setAutoAccept($autoAccept = null)
    {
        $this->autoAccept = $autoAccept;
        return $this;
    }
    /**
     * @return string
     */
    public function getCustomerNotes()
    {
        return $this->customerNotes;
    }
    /**
     * @param string $customerNotes
     *
     * @return self
     */
    public function setCustomerNotes($customerNotes = null)
    {
        $this->customerNotes = $customerNotes;
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
     * @return XtrfDate
     */
    public function getEstimatedDeliveryDate()
    {
        return $this->estimatedDeliveryDate;
    }
    /**
     * @param XtrfDate $estimatedDeliveryDate
     *
     * @return self
     */
    public function setEstimatedDeliveryDate(XtrfDate $estimatedDeliveryDate = null)
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
        return $this;
    }
    /**
     * @return XtrfDate
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }
    /**
     * @param XtrfDate $expiryDate
     *
     * @return self
     */
    public function setExpiryDate(XtrfDate $expiryDate = null)
    {
        $this->expiryDate = $expiryDate;
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
     * @return XtrfUser
     */
    public function getSalesPerson()
    {
        return $this->salesPerson;
    }
    /**
     * @param XtrfUser $salesPerson
     *
     * @return self
     */
    public function setSalesPerson(XtrfUser $salesPerson = null)
    {
        $this->salesPerson = $salesPerson;
        return $this;
    }
    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }
    /**
     * @param string $service
     *
     * @return self
     */
    public function setService($service = null)
    {
        $this->service = $service;
        return $this;
    }
    /**
     * @return string
     */
    public function getSpecialization()
    {
        return $this->specialization;
    }
    /**
     * @param string $specialization
     *
     * @return self
     */
    public function setSpecialization($specialization = null)
    {
        $this->specialization = $specialization;
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
     * @return string
     */
    public function getWorkflow()
    {
        return $this->workflow;
    }
    /**
     * @param string $workflow
     *
     * @return self
     */
    public function setWorkflow($workflow = null)
    {
        $this->workflow = $workflow;
        return $this;
    }
}