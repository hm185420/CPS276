<?php

class Validation{
	/* USED AS A FLAG CHANGES TO TRUE IF ONE OR MORE ERRORS IS FOUND */
	// check for proper formatting and no fields can be blank 
    // update for all the form fields 
    private $error = false;

	/* CHECK FORMAT IS BASCALLY A SWITCH STATEMENT THAT TAKES A VALUE AND THE NAME OF THE FUNCTION THAT NEEDS TO BE CALLED FOR THE REGULAR EXPRESSION */
	// form field 
    public function checkFormat($value, $regex)
	{
		switch($regex){
            // ALL FORM FIELDS 
            // login page
            case "password": return $this->password($value); break;
			// contact page 
            case "name": return $this->name($value); break;
			case "address": return $this->phone($value); break;
			case "city": return $this->city($value); break;
            case "phone": return $this->phone($value); break;
            case "dob": return $this->dob($value); break;
            case "email": return $this->email($value); break;
		}
	}

	
	/* THE REST OF THE FUNCTIONS ARE THE INDIVIDUAL REGULAR EXPRESSION FUNCTIONS*/
    private function password($value)
	{
		$match = preg_match('/^[\w\W]{1,50}$/i', $value);
		return $this->setError($match);
	}
    private function name($value){
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}
    private function address($value)
	{
		$match = preg_match('/^\d+ [a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}
    private function city($value)
	{
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}
    private function phone($value)
	{
		$match = preg_match('/^\d{3}\.\d{3}\.\d{4}$/', $value);
		return $this->setError($match);
	}
    private function email($value)
	{
		$match = preg_match('/^[a-z-A-Z-\'\d_]{1,30}@[a-z-A-Z-\'\d_]{1,20}\.[a-z-A-Z-\d]{1,8}$/i', $value);
		return $this->setError($match);
	}
    private function dob($value)
	{
		$match = preg_match('/^(0[0-9]|1[012])\/(0[1-9]|[12][0-9]|3[01])\/(19|20)\d\d$/i', $value);
		return $this->setError($match);
	}
	private function setError($match){
		if(!$match){
			$this->error = true;
			return "error";
		}
		else {
			return "";
		}
	}


	/* THE SET MATCH FUNCTION ADDS THE KEY VALUE PAR OF THE STATUS TO THE ASSOCIATIVE ARRAY */
	public function checkErrors(){
		return $this->error;
	}
	
}