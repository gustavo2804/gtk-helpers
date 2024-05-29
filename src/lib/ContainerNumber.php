<?php 
class ContainerNumber
{
	public static function isValidISOContainerString($containerString)
	{
		return isset(self::$containerData[$containerString]);
	}

	// Source: 
	// https://www.hapag-lloyd.com/en/services-information/cargo-fleet/container/container-type-groups.html
	//
	// TODO: Ver si los isotanques requieren un tratamiento especial, codigo iso, etc
	//
	private static $containerData = [
		//--------------------------
		// 20 footers
		//--------------------------
		"20G0" => [
			"english" => "20' General Purpose", 
			"spanish" => "Contenedor de 20 pies propósito general",
			"length"  => 20,
			"stonewood" => "20DC",
		],
		"20G1" => [
			"english" => "20' General Purpose (passive vents)", 
			"spanish" => "Contenedor de 20 pies propósito general (ventilación pasiva)",
			"length"  => 20,
			"stonewood" => "20DC",
		],
		"22G0" => [
			"english" => "20' General Purpose", 
			"spanish" => "Contenedor de 20 pies propósito general",
			"length"  => 20,
			"stonewood" => "20DC",
		],
		"22G1" => [
			"english" => "20' General Purpose (passive vents)", 
			"spanish" => "Contenedor de 20 pies propósito general (ventilación pasiva)",
			"length"  => 20,
			"stonewood" => "20DC",
		],
		"22V0" => [
			"english" => "20' Ventilated", 
			"spanish" => "Contenedor de 20 pies ventilado",
			"length"  => 20,
			"stonewood" => "20DC",
		],
		"22U6" => [
			"english" => "20' Hardtop", 
			"spanish" => "Contenedor de 20 pies tipo techo rígido",
			"length"  => 20,
			"stonewood" => "20DC",
		],
		//--------------------------
		// 20 Open Top
		//--------------------------
		"22U1" => [
			"english" => "20' Open Top", 
			"spanish" => "Contenedor de 20 pies tipo techo abierto",
			"length"  => 20,
			"stonewood" => "20OT",
		],
		//--------------------------
		// 20 Flat Rack
		//--------------------------
		"20P1" => [
			"english" => "20' Flat (fixed ends)", 
			"spanish" => "Contenedor de 20 pies tipo plataforma (extremos fijos)",
			"length"  => 20,
			"stonewood" => "20FR",
		],
		"22P1" => [
			"english" => "20' Flat (fixed ends)", 
			"spanish" => "Contenedor de 20 pies tipo plataforma (extremos fijos)",
			"length"  => 20,
			"stonewood" => "20FR",
		],
		"22P3" => [
			"english" => "20' Flat (collapsible)", 
			"spanish" => "Contenedor de 20 pies tipo plataforma (plegable)",
			"length"  => 20,
			"stonewood" => "20FR",
		],
		"22P8" => [
			"english" => "20' Flat (collapsible flush folding)", 
			"spanish" => "Contenedor de 20 pies tipo plataforma (plegable, plegado a ras)",
			"length"  => 20,
			"stonewood" => "20FR",
		],
		//--------------------------
		// 20 Fridges
		//--------------------------
		"22R1" => [
			"english" => "20' Refrigerated", 
			"spanish" => "Contenedor de 20 pies refrigerado",
			"length"  => 20,
			"stonewood" => "20RH",
		],
		"22R9" => [
			"english" => "20' Refrigerated (non foodstuff)", 
			"spanish" => "Contenedor de 20 pies refrigerado (no productos alimenticios)",
			"length"  => 20,
			"stonewood" => "20RH",
		],
		//--------------------------
		// 20 Tanks
		//--------------------------
		"20T5" => [
			"english" => "20' Tank (dangerous liquids, test pressure 4 bar)", 
			"spanish" => "Contenedor de 20 pies cisterna (líquidos peligrosos, presión de prueba 4 bar)",
			"length"  => 20,
			"stonewood" => "20TK",
		],
		"22T0" => [
			"english" => "20' Tank (nondangerous liquids, test pressure 0,45 bar)", 
			"spanish" => "Contenedor de 20 pies cisterna (líquidos no peligrosos, presión de prueba 0,45 bar)",
			"length"  => 20,
			"stonewood" => "20TK",
		],
		"22T5" => [
			"english" => "20' Tank (dangerous liquids, test pressure 4 bar)", 
			"spanish" => "Contenedor de 20 pies cisterna (líquidos peligrosos, presión de prueba 4 bar)",
			"length"  => 20,
			"stonewood" => "20TK",
		],
		"22T6" => [
			"english" => "20' Tank (dangerous liquids, test pressure 6 bar)", 
			"spanish" => "Contenedor de 20 pies cisterna (líquidos peligrosos, presión de prueba 6 bar)",
			"length"  => 20,
			"stonewood" => "20TK",
		],
		//--------------------------
		// 40 Dry
		//--------------------------
		"42G0" => [
			"english" => "40' General Purpose", 
			"spanish" => "Contenedor de 40 pies propósito general",
			"length"  => 40,
			"stonewood" => "40DC",
		],
		"42G1" => [
			"english" => "40' General Purpose (passive vents)", 
			"spanish" => "Contenedor de 40 pies propósito general (ventilación pasiva)",
			"length"  => 40,
			"stonewood" => "40DC",
		],
		"42U6" => [
			"english"   => "40' Hardtop", 
			"spanish"   => "Contenedor de 40 pies tipo techo rígido",
			"length"    => 40,
			"stonewood" => "40DC",
		],
		//--------------------------
		// 40 Open Top
		//--------------------------
		"42U1" => [
			"english" => "40' Open Top",
			"spanish" => "Contenedor de 40 pies tipo techo abierto",
			"length"  => 40,
			"stonewood" => "40OT",
		],
		//--------------------------
		// 40 Flat Rack
		//--------------------------
		"42P1" => [
			"english" => "40' Flat (fixed ends)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (extremos fijos)",
			"length"  => 40,
			"stonewood" => "40FR",
		],
		"42P3" => [
			"english" => "40' Flat (collapsible)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (plegable)",
			"length"  => 40,
			"stonewood" => "40FR",
		],
		"42P8" => [
			"english" => "40' Flat (collapsible flush folding)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (plegable, plegado a ras)",
			"length"  => 40,
			"stonewood" => "40FR",
		],
		//--------------------------
		// 40 Fridge
		//--------------------------
		"42R1" => [
			"english" => "40' Refrigerated", 
			"spanish" => "Contenedor de 40 pies refrigerado (no productos alimenticios)",
			"length"  => 40,
			"colloquial" => "40RH",
		],
		"42R9" => [
			"english" => "40' Refrigerated (no foodstuff)", 
			"spanish" => "Contenedor de 40 pies refrigerado (no productos alimenticios)",
			"length"  => 40,
			"stonewood" => "40RH",
		],
		//
		// 40 ft Container
		//--------------------------
		"45P3" => [
			"english" => "40' Flat (collapsible)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (plegable)",
			"length"  => 40,
			"stonewood" => "40FR",
		],
		"45P8" => [
			"english" => "40' Flat (collapsible flush folding)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (plegable, plegado a ras)",
			"length"  => 40,
			"stonewood" => "40FR",
		],
		"45G0" => [
			"english" => "40' High Cube General Purpose", 
			"spanish" => "Contenedor de 40 pies propósito general (alta altura)",
			"length"   => 40,
			"stonewood" => "40HC",
		],
		"45G1" => [
			"english" => "40' High Cube GP (passive vents)", 
			"spanish" => "Contenedor de 40 pies propósito general (alta altura, ventilación pasiva)",
			"length"   => 40,
			"stonewood" => "40HC",
		],

		"45U1" => [
			"english" => "40' High Cube Open Top", 
			"spanish" => "Contenedor de 40 pies tipo techo abierto (alta altura)",
			"length"   => 40,
			"stonewood" => "40HC-OT",
		],
		"45U6" => [
			"english" => "40' High Cube Hardtop",
			"spanish" => "Contenedor de 40 pies tipo techo rígido (alta altura)",
			"length"   => 40,
			"stonewood" => "40HC-DC",
		],
		"45R1" => [
			"english" => "40' Refrigerated", 
			"spanish" => "Contenedor de 40 pies refrigerado",
			"length"   => 40,
			"stonewood" => "40RH",
		],
		"45R9" => [
			"english"  => "40' Refrigerated (no foodstuff)", 
			"spanish"  => "Contenedor de 40 pies refrigerado (no productos alimenticios)",
			"length"   => 40,
			"stonewood" => "40RH",
		],
		//
		// 45 ft Container
		//--------------------------
		"L5G1" => [
			"english" => "45' High Cube General Purpose (passive vents)", 
			"spanish" => "Contenedor de 45 pies propósito general (alta altura, ventilación pasiva)",
			"length"  => 45,
			"stonewood" => "45HC",
		],
		"L2G1" => [
			"english" => "45'General Purpose Dry Container", 
			"spanish" => "Contenedor de 45 pies propósito general",
			"length"  => 45,
			"stonewood" => "45DC",
		],
	];

	public static function generateISOContainerSelect(CustomInputFunctionArgument $argument)
	{

		$debug = false;

		$columnName  = $argument->getColumnName();
		$columnValue = $argument->getColumnValue();
		$options     = $argument->getOptions();
		
		if ($debug)
		{
			error_log("Will prepare container select...");
		}
    	$language = isset($options['language']) ? $options['language'] : 'spanish';

    	$containerData = ContainerNumber::$containerData;

    	$select = '<select name="' . $columnName . '">';

		$addNullCase = true;

		if ($addNullCase)
		{
        	$select .= '<option';
			$select .= ' value=""';

			if (!$columnValue)
			{
				$select .= ' selected ';
			}

			$select .= '>';

			switch ($language)
			{
				case "english":
					$select .= "N / A";
					break;
				case "spanish":
				default:
					$select .= "No aplica";
					break;
			}
			$select .= '</option>';
		}

    	foreach ($containerData as $value => $descriptions) 
		{
        	$label = ($language === 'spanish') ? $descriptions['spanish'] : $descriptions['english'];

        	$select .= '<option';
			$select .= ' value="'.$value .'"';
			if ($value === $columnValue)
			{
				$select .= ' selected ';
			}
			$select .= '>';
			$select .= $value.' - '.$label;
			$select .= '</option>';
    	}
 
    	$select .= '</select>';

		if ($debug)
		{
			error_log("Did prepare container select...");
		}

    	return $select;
	}


	public static function getContainerData($key = null, $throwException = true)
	{
		if ($key)
		{
			$hasError = false;

			if (is_numeric($key) || is_string($key))
			{
				$hasError = false;
			}
			else
			{
				$hasError = true;
			}

			if ($hasError)
			{
				$message = "Illegal offset type on `getContainerWithData` - got: ".print_r($key, true)." - Type: - ".gettype($key);
				throw new Exception($message);
			}

			if (!array_key_exists($key, self::$containerData))
			{
				if ($throwException)
				{

					$message = ("Error: unknown isoCategory in `getContainerData`: $key");
					throw new Exception($message);
				}
			}
			else
			{
				return self::$containerData[$key];
			}
		} 
		else 
		{
			return self::$containerData;
		}
	}
	

	/*
	22G1	20DC	DRY CONTAINER
	22P1	20FR	FLAT RACK
	22R1	20RH	REFRIGERATOR
	22TO	20TK	TANK
	20U1	20OT	OPEN TOP
	42G1	40DC	DRY CONTAINER
	42P1	40FR	FLAT RACK
	42R1	40RH	REFRIGERATOR
	42U1	40OT	OPEN TOP
	45G1	40HC	HIGH CUBE
	45R1	40RH	REFRIGERATOR
	*/


	public static function stonewoodContainerTypeFromIsoCategory($isoCategory)
	{
		// $debug = false;

		$data = self::getContainerData();

		$selection = $data[$isoCategory];

		/*
		if ($debug)
		{
			error_log("Got selection: ".$selection);
		}
		*/

		return $selection["stonewood"];
	}

	public static function containerArrayFromNumberStonewoodContainerType($containerNumber, $stonewoodContainerType)
	{
		$isoCategory  = ContainerNumber::isoCategoryFromStonewoodContainerType($stonewoodContainerType);
	
		$container = [
			"type"           => $isoCategory,
			"stonewood_type" => $stonewoodContainerType,
			"number"         => $containerNumber,
		];

		return $container;
	}

	public static function containerArrayFromNumberIsoCategory($containerNumber, $isoCategory)
	{
		$stonewoodContainerType = ContainerNumber::stonewoodContainerTypeFromIsoCategory($isoCategory);
	
		$container = [
			"type"           => $isoCategory,
			"stonewood_type" => $stonewoodContainerType,
			"number"         => $containerNumber,
		];

		return $container;
	}

	public static function isoCategoryFromStonewoodContainerType($stonewoodContainerType)
	{
		$data = self::getContainerData();

		foreach ($data as $isoType => $container)
		{
			if ($container["stonewood"] === $stonewoodContainerType)
			{
				$container["iso_type"] = $isoType;
				return $container;
			}
		}

		// return null;

		$message = ("Error: unknown isoCategory in `stonewoodContainerType`: $stonewoodContainerType");

		if (true)
		{
			error_log($message);
		}
		else
		{
			throw new Exception($message);
		}

		return null;
	}


	public static function stonewoodContainerTypeFromOldDPHReading($isoCategory)
	{
		// https://www.globalspec.com/learnmore/material_handling_packaging_equipment/material_handling_equipment/iso_containers#:~:text=Coding%2C%20Identifying%2C%20and%20Marking%20The%20standard%20used%20to,size%20and%20type%20code%2C%20and%20additional%20optional%20markings.
		switch ($isoCategory)
		{
			case '1*':
				return '45R1';
			case '2T':
				return '20TK';
			case '22':
				return '20DC';
			case '42':
				return '40DC';
			case '2G':
				return '20OT';
			case '2T':
				return '20FR';
			case 'BE':
				return '20RF';
			case '*C':
				return '45HC';
			case 'G1':
				return '40RH';
			case 'L2':
				return '20HC';
			case 'R1':
				return '20TK';	
		}
	}

	public static function containerSizeFromString($string)
	{
		$debug = false;

		if ($debug)
		{
			error_log("Getting container size from string: ".$string);
		}

		// Method 1
		$data = self::getContainerData($string, false);

		if ($data)
		{
			$length = $data["length"];

			if ($debug)
			{
				error_log("Will return `length` from data: ($length) --- ".serialize($data));
			}
			
			return $length;
		}


		// Method 2

		switch ($string)
		{
			case '1*':
			case '*C':
			case '45HC':
			case '45R1':
				return 45;
			case '2T':
			case '22':
			case '2G':
			case 'L2':
			case 'R1':
			case 'BE':
			case '20DC':
			case '20FR':
			case '20HC':
			case '20OT':
			case '20RF':
			case '20TK':
				return 20;
			case '45';
			case '42':
			case 'G1':
			case '40DC':
			case '40FR':
			case '40HC':
			case '40OT':
			case '40RF':
			case '40TK':
				return 40;
			default:
				throw new Exception("`containerSizeFromString` Invalid Container Number: $string");
				return 88;
		}
		
		
	}


	public $string;
	public $ownerPrefix;
	public $equipmentIdentifier;
	public $serialnumber;
	public $checkDigit;
	public $tipoISO;

	public function __construct($string, $tipoISO = null)
	{
		$this->ownerPrefix         = substr($string, 0, 3);
		$this->equipmentIdentifier = substr($string, 3, 1);
		$this->serialnumber		   = substr($string, 4, 6);
		$this->checkDigit		   = substr($string, 10, 1);
		$this->tipoISO			   = $tipoISO;

	}

	public function isValidISOType()
	{
		if ($this->tipoISO)
		{
			return array_key_exists($this->tipoISO, self::$containerData);
		}

		return false;
	}

	public function isValidContainerNumber()
	{
		if ($this->ownerPrefix === "GTK")
		{
			return true;
		}	

		if (count($this->string) != 11)
		{
			return false;
		}	

		if (ctype_alpha($this->ownerPrefix) 
			&& ctype_alpha($this->equipmentIdentifier)
			&& is_numeric($this->serialnumber) 
			&& is_numeric($this->checkDigit))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function isValid()
	{
		return $this->isValidContainerNumber();
	}

	public function allIsValid()
	{
		return $this->isValidISOType() && $this->isValidContainerNumber();
	}


	public function getEquipmentCategory()
	{
		if ($this->equipmentIdentifier === 'U')
		{
			return 'Freight Container';
		}
		else if ($this->equipmentIdentifier === 'J')
		{
			return 'Detachable Freight Container Related Equipment';
		}
		else if ($this->equipmentIdentifier === 'Z')
		{
			return 'Trailers and Chassis';
		}
		else
		{
			return 'Unknown';
		}
	}




	
}
