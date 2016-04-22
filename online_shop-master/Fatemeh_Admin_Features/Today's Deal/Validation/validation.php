<?php

class validation {

    private $error="";

    public function getError()
    {
        return $this->error;
    }
///////////////////////Sooah/////////////////////////
    public function isEmpty($value){
        if($value=="" || $value==NULL){
            $this->error .= "You cannot leave this field blank" . "<br/>";
            return true;
        }
        else
        {
            return false;
        }
    }
    public function radioValidate($value){
        if(!isset($value)){
            $this->error .= "No radio button is selected" . "<br/>";
            return false;
        }
        else{
            return true;
        }
    }

    public function chkBoxValidate($value){
        if(!isset($value)){
            $this->error .= "No checkbox is selected" . "<br />";
            return false;
        }
        else{
            return true;
        }
    }
    public function ddlValidate($value){
        if(!isset($value)){
            $this->error .= "No option is selected in the drop down list" . "<br />";
            return false;
        }
        else if($value == ""){
            $this->error .= "No option is selected in the drop down list". "<br />";
            return false;
        }
        else{
            return true;
        }
    }
    public function txtAreaValidate($value){

        if(!isset($value)){
            $this->error .= "There is no text in the textarea" . "<br />";
            return false;
        }
        else if($value==""){
            $this->error .= "There is no text in the textarea" . "<br />";
            return false;
        }
        else{
            return true;
        }

    }
///////////////////////////////////FATEMEH///////////////////////////////////////////////////////////////////
//This method will return true if the number is a digit number otherwise false if the number is not a digit
    public function isDigitNumber($number){
        if(ctype_digit($number))
            return true;
        else {
            $this->error .= "Invalid digit number" . "<br />";
            return false;
        }

    }
    public function isFloat($number){
        if(is_numeric($number)){
            // Try to convert the string to a float
            $floatVal = floatval($number);
            // If the parsing succeeded and the value is not equivalent to an int
            if($floatVal && intval($floatVal) != $floatVal)
            {
                return true;
            }
            else{
                $this->error .= "Invalid float number" . "<br />";
                return false;
            }

        }
        else{
            $this->error .= "Invalid float number" . "<br />";
            return false;
        }

    }
//This function validate against different formats of Canada phone number pattern.As below:
//212-222-1010
//(203)+753-5678
//2155551212
    public function isPhoneNumber($number){
        $pattern='/\D*([2-9]\d{2})(\D*)([2-9]\d{2})(\D*)(\d{4})\D*/';
        if(preg_match($pattern,$number))
            return true;
        else
        {
            $this->error .= "Invalid phone number" . "<br />";
            return false;
        }

    }
    public function getLength($number){
        return strlen($number);
    }
    public function isPositive($number){
        if((is_numeric($number)) && ($number>0))
            return true;
        else
        {
            $this->error .= "It is not a positive number" . "<br />";
            return false;
        }

    }
    public function isNegative($number){
        if((is_numeric($number)) && ($number<0))
            return true;
        else
        {
            $this->error .= "It is not a negative number" . "<br />";
            return false;
        }
    }
///////////////////////////////////////Loveleen///////////////////////////////

    public function valid_email($email,$errorMsg="Not a Valid Email<br/>")
    {
        if (preg_match( "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/",$email)) {
            $this->error.="";
            return true;
        }
        else
        {
            $this->error.=$errorMsg;
            return false;
        }
    }
    public function valid_url($url,$errorMsg="Not a Valid Url<br/>")
    {
        $pattern_1 = "/^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+.(com|org|net|dk|at|us|tv|info|uk|co.uk|biz|se)$)(:(\d+))?\/?/i";
        $pattern_2 = "/^(www)((\.[A-Z0-9][A-Z0-9_-]*)+.(com|org|net|dk|at|us|tv|info|uk|co.uk|biz|se)$)(:(\d+))?\/?/i";
        if(preg_match($pattern_1, $url) || preg_match($pattern_2, $url))
        {
            $this->error.="";
            return true;
        }
        else
        {
            $this->error .= $errorMsg;
            return false;
        }
    }
    public function valid_zip($zip,$errorMsg="Not a valid zip<br/>")
    {
        if(!preg_match("/^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$/i",$zip))
        {
            $this->error .= $errorMsg;
            return false;
        }
        else
        {
            $this->error.="";
            return true;
        }
    }
///////////////////////////////////////////////////////Alya///////////////////////////////
//if u want the date to be in future
    public function valid_future_date($date){
        $today = new DateTime();
        $inputDate = new DateTime($date);
        $d = explode("-", $date);
        $isValid = checkdate($d[1], $d[2], $d[0]);
        if ($inputDate < $today or !$isValid) {
            $this->date = "";
            $this->error .= "<br/>Invalid Date<br/>";
            return false;
        }
        else{
            return true;
        }
    }

    // if u want date to be in past
    public function valid_past_date($date){
        $today = new DateTime();
        $inputDate = new DateTime($date);
        $d = explode("-", $date);
        $isValid = checkdate($d[1], $d[2], $d[0]);
        if ($inputDate > $today or !$isValid) {
            $this->date = "";
            $this->error .= "<br/>Invalid Date<br/>";
            return false;
        }
        else{
            return true;
        }
    }

    public function valid_date($date)
    {
        // generate today's date for comparison
        $today = new DateTime();

        // if user did not enter anything
        if (empty($date)){
            $this->error.="<br/> Date Field Missing <br/>";
            return false;
        }
        // if formate of date is incorrect
        else if (!preg_match("/^\d{4}\-\d{2}\-\d{2}$/",$date)){
            $this->date="";
            $this->error.="<br/> Invalid Date Format <br/>";
            return false;
        }
        else {
            return true;
        }

    }
///////////////////Akshi///////////////////////////////////////////////////////////////////////////

    //password is a required field
    public function passwordRequired($value, $errorMsg = "Please specify a password")
    {
        if (strlen($value)==0) {
            $this->error .= $errorMsg . "<br />";
            return false;
        } else {
            return true;
        }
    }
    //length of password is 6
    public function passwordLength6($value, $errorMsg = "Password should be 6 or more than 6 letters")
    {
        if (strlen($value) < 6) {
            $this->error .= $errorMsg . "<br />";
            return false;
        }
        else {
            return true;
        }
    }
    //length of password is 7
    public function passwordLength7($value, $errorMsg = "Password should be 7 or more than 7 letters")
    {
        if (strlen($value) < 7) {
            $this->error .= $errorMsg . "<br />";
            return false;
        }
        else {
            return true;
        }
    }

    //length of password is 8
    public function passwordLength8($value, $errorMsg = "Password should be 8 or more than 8 letters")
    {

        if (strlen($value) < 8) {
            $this->error .= $errorMsg . "<br />";
            return false;
        }
        else {
            return true;
        }
    }
    //Password should contain special charater, atleast one capital and a number
    public function password_Complex($value, $errorMsg = "Password should contain a special character, atleast one capital and a number "){

        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $value)) {
            $this->error .= $errorMsg . "<br />";
            return false;
        }

        else{
            return true;
        }
    }
} 