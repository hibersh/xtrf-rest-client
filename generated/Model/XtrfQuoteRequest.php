<?php

namespace drunomics\XtrfClient\Model;

class XtrfQuoteRequest
{
    /**
     * @var XtrfPerson[]
     */
    protected $additionalPersons;
    /**
     * @var bool
     */
    protected $autoAccept;
    /**
     * @var string
     */
    protected $customerProjectNumber;
    /**
     * @var XtrfCustomFields[]
     */
    protected $customFields;
    /**
     * @var XtrfDate
     */
    protected $deliveryDate;
    /**
     * @var XtrfFile[]
     */
    protected $files;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $notes;
    /**
     * @var XtrfOffice
     */
    protected $office;
    /**
     * @var XtrfPerson
     */
    protected $person;
    /**
     * @var XtrfPerson[]
     */
    protected $persons;
    /**
     * @var mixed
     */
    protected $priceProfile;
    /**
     * @var XtrfFile[]
     */
    protected $referenceFiles;
    /**
     * @var XtrfPerson
     */
    protected $sendBackTo;
    /**
     * @var XtrfWorkflow
     */
    protected $service;
    /**
     * @var XtrfLanguage
     */
    protected $sourceLanguage;
    /**
     * @var XtrfSpecialization
     */
    protected $specialization;
    /**
     * @var XtrfLanguage[]
     */
    protected $targetLanguages;
    /**
     * @var XtrfWorkflow
     */
    protected $workflow;
    /**
     * @return XtrfPerson[]
     */
    public function getAdditionalPersons()
    {
        return $this->additionalPersons;
    }
    /**
     * @param XtrfPerson[] $additionalPersons
     *
     * @return self
     */
    public function setAdditionalPersons(array $additionalPersons = null)
    {
        $this->additionalPersons = $additionalPersons;
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
    public function getCustomerProjectNumber()
    {
        return $this->customerProjectNumber;
    }
    /**
     * @param string $customerProjectNumber
     *
     * @return self
     */
    public function setCustomerProjectNumber($customerProjectNumber = null)
    {
        $this->customerProjectNumber = $customerProjectNumber;
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
     * @return XtrfDate
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }
    /**
     * @param XtrfDate $deliveryDate
     *
     * @return self
     */
    public function setDeliveryDate(XtrfDate $deliveryDate = null)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }
    /**
     * @return XtrfFile[]
     */
    public function getFiles()
    {
        return $this->files;
    }
    /**
     * @param XtrfFile[] $files
     *
     * @return self
     */
    public function setFiles(array $files = null)
    {
        $this->files = $files;
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
    public function getNotes()
    {
        return $this->notes;
    }
    /**
     * @param string $notes
     *
     * @return self
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;
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
     * @return XtrfPerson
     */
    public function getPerson()
    {
        return $this->person;
    }
    /**
     * @param XtrfPerson $person
     *
     * @return self
     */
    public function setPerson(XtrfPerson $person = null)
    {
        $this->person = $person;
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
    /**
     * @return mixed
     */
    public function getPriceProfile()
    {
        return $this->priceProfile;
    }
    /**
     * @param mixed $priceProfile
     *
     * @return self
     */
    public function setPriceProfile($priceProfile = null)
    {
        $this->priceProfile = $priceProfile;
        return $this;
    }
    /**
     * @return XtrfFile[]
     */
    public function getReferenceFiles()
    {
        return $this->referenceFiles;
    }
    /**
     * @param XtrfFile[] $referenceFiles
     *
     * @return self
     */
    public function setReferenceFiles(array $referenceFiles = null)
    {
        $this->referenceFiles = $referenceFiles;
        return $this;
    }
    /**
     * @return XtrfPerson
     */
    public function getSendBackTo()
    {
        return $this->sendBackTo;
    }
    /**
     * @param XtrfPerson $sendBackTo
     *
     * @return self
     */
    public function setSendBackTo(XtrfPerson $sendBackTo = null)
    {
        $this->sendBackTo = $sendBackTo;
        return $this;
    }
    /**
     * @return XtrfWorkflow
     */
    public function getService()
    {
        return $this->service;
    }
    /**
     * @param XtrfWorkflow $service
     *
     * @return self
     */
    public function setService(XtrfWorkflow $service = null)
    {
        $this->service = $service;
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
     * @return XtrfSpecialization
     */
    public function getSpecialization()
    {
        return $this->specialization;
    }
    /**
     * @param XtrfSpecialization $specialization
     *
     * @return self
     */
    public function setSpecialization(XtrfSpecialization $specialization = null)
    {
        $this->specialization = $specialization;
        return $this;
    }
    /**
     * @return XtrfLanguage[]
     */
    public function getTargetLanguages()
    {
        return $this->targetLanguages;
    }
    /**
     * @param XtrfLanguage[] $targetLanguages
     *
     * @return self
     */
    public function setTargetLanguages(array $targetLanguages = null)
    {
        $this->targetLanguages = $targetLanguages;
        return $this;
    }
    /**
     * @return XtrfWorkflow
     */
    public function getWorkflow()
    {
        return $this->workflow;
    }
    /**
     * @param XtrfWorkflow $workflow
     *
     * @return self
     */
    public function setWorkflow(XtrfWorkflow $workflow = null)
    {
        $this->workflow = $workflow;
        return $this;
    }
}