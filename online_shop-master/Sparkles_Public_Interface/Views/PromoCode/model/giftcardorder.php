<?php
class GiftCardOrder {
    private $cust_id;
    private $gift_id;
    private $sent_to;
    private $amt;
    private $msg;
    private $payment_mode;

    public function __construct($cust_id, $gift_id, $sent_to, $amt, $msg, $payment_mode) {
        $this->cust_id = $cust_id;
        $this->gift_id=$gift_id;
        $this->sent_to=$sent_to;
        $this->amt = $amt;
        $this->msg=$msg;
        $this->payment_mode=$payment_mode;
    }

    public function getCustId() {
        return $this->cust_id;
    }

    public function setCustId($value) {
        $this->cust_id = $value;
    }

    public function getGiftId() {
        return $this->gift_id;
    }

    public function setGiftId($value) {
        $this->gift_id = $value;
    }

    public function getSentTo(){
        return $this->sent_to;
    }

    public function setSentTo($value){
        $this->sent_to= $value;
    }

    public function getAmt(){
        return $this->amt;
    }

    public function setAmt($value){
        $this->amt= $value;
    }

    public function getMsg(){
        return $this->msg;
    }

    public function setMsg($value){
        $this->msg= $value;
    }

    public function getMode(){
        return $this->payment_mode;
    }

    public function setMode($value){
        $this->payment_mode= $value;
    }


}
?>