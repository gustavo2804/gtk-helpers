<?php


class ValidationResult {
	
}

// FormResultOutcomes::Successful;
// FormResultOutcomes::Failure;
enum FormResultOutcomes {
	case Successful;
	case Failure;
}

class FormResult {
	/*
	
	Python: In Python, objects are considered "truthy" by default. However, you can define the __bool__() or __len__() magic methods in your class to customize the boolean evaluation of objects.
	PHP: In the example above, we define a Test class that has a private $value property. The __bool() magic method is implemented to control the evaluation of the object as a boolean. In this case, the __bool() method converts the $value property to a boolean using the (bool) typecast.

	*/
	public $success;
	public $data;
	public $value;

	public function value()
	{
		return $this->success;
	}

	public function __construct($enum, $stringOrArray)
	{
		$this->success = $enum;
		$this->value = $enum->value;
		if (is_array($stringOrArray))
		{
			$this->data = $stringOrArray;
		}
		else
		{
			$this->data = [ "message" => $stringOrArray ];
		}
	}

	public function enum()
	{
		return $this->success;
	}

	public function __toString() {
		return json_encode($this);
	}

	public function mergeWithResult($result)
	{
		$this->success = $this->success && $result->success;
		$this->data    = array_merge($this->data, $result->data);
	}

	public function message($splitter = "\n") {
		if (is_string($this->data))
		{
			return $this->data;
		}
		else if (is_array($this->data) && array_key_exists("message", $this->data))
		{
			
			$messageAsArrayOrString = $this->data["message"];

			if (is_string($messageAsArrayOrString))
			{
				return $messageAsArrayOrString;
			}
			else
			{
				return implode($splitter, $messageAsArrayOrString);
			}
		}
		else 
		{
			return "No message";
		}
	}

	public function get($key)
	{
		if (array_key_exists($key, $this->data))
		{
			return $this->data[$key];
		}
		else
		{
			return null;
		}
	}

	public function isSuccess()
	{
		return $this->success == 1;
	}

	public function isFailure()
	{
		return !$this->success;
	}

}
