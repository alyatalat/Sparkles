<?php
class price_convert
{
    private $convert_Id;
    private $convert_Date;
    private $convert_US_Rate;
    public function __construct($date_Today,$rate)
    {
        $this->convert_Date = $date_Today;
        $this->convert_US_Rate = $rate;
    }
    public function getId()
    {
        return $this->convert_Id;
    }
    public function setId($value)
    {
        $this->convert_Id = $value;
    }

    public function getConvertDate()
    {
        return $this->convert_Date;
    }

    public function setConvertDate($convert_Date)
    {
        $this->convert_Date = $convert_Date;
    }

    public function getConvertUSRate()
    {
        return $this->convert_US_Rate;
    }

    public function setConvertUSRate($convert_US_Rate)
    {
        $this->convert_US_Rate = $convert_US_Rate;
    }
}