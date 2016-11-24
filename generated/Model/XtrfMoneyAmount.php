<?php

namespace drunomics\XtrfClient\Model;

class XtrfMoneyAmount
{
    /**
     * @var float
     */
    protected $amount;
    /**
     * @var string
     */
    protected $currency;
    /**
     * @var string
     */
    protected $formattedAmount;
    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }
    /**
     * @param float $amount
     *
     * @return self
     */
    public function setAmount($amount = null)
    {
        $this->amount = $amount;
        return $this;
    }
    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
    /**
     * @param string $currency
     *
     * @return self
     */
    public function setCurrency($currency = null)
    {
        $this->currency = $currency;
        return $this;
    }
    /**
     * @return string
     */
    public function getFormattedAmount()
    {
        return $this->formattedAmount;
    }
    /**
     * @param string $formattedAmount
     *
     * @return self
     */
    public function setFormattedAmount($formattedAmount = null)
    {
        $this->formattedAmount = $formattedAmount;
        return $this;
    }
}