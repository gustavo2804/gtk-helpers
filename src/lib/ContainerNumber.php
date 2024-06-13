<?php 



function dateOnlyFromString($date, $format = 'Y-m-d')
{
    $dateTime = new DateTime($date);
    $dateTime->setTime(0, 0);
    return $dateTime->format('Y-m-d');
}


class UNEDIFactContainerType 
{
    const FULL_CONTAINER_LOAD = 1;
    const EMPTY_CONTAINER = 2;
    const EXPORT_CONTAINER = 3;
    const IMPORT_CONTAINER = 4;
    const SHIPPER_OWNED_CONTAINER = 5;
    const CARRIER_OWNED_CONTAINER = 6;
    const LEASED_CONTAINER = 7;
    const DAMAGED_CONTAINER = 8;
    const RESERVED_CONTAINER = 9;
    const QUARANTINED_CONTAINER = 10;

    public static function getDescription($type) {
        switch ($type) {
            case self::FULL_CONTAINER_LOAD:
                return 'Full container load';
            case self::EMPTY_CONTAINER:
                return 'Empty container';
            case self::EXPORT_CONTAINER:
                return 'Export container';
            case self::IMPORT_CONTAINER:
                return 'Import container';
            case self::SHIPPER_OWNED_CONTAINER:
                return 'Shipper-owned container';
            case self::CARRIER_OWNED_CONTAINER:
                return 'Carrier-owned container';
            case self::LEASED_CONTAINER:
                return 'Leased container';
            case self::DAMAGED_CONTAINER:
                return 'Damaged container';
            case self::RESERVED_CONTAINER:
                return 'Reserved container';
            case self::QUARANTINED_CONTAINER:
                return 'Quarantined container';
            default:
                return 'Unknown type';
        }
    }
}

// 8051  Transport stage code qualifier
// https://service.unece.org/trade/untdid/d99b/tred/tred8051.htm
class UNEDITransportStageCodeQualifier 
{
	public function source()
	{
		return "https://service.unece.org/trade/untdid/d99b/tred/tred8051.htm";
	}

    const INLAND_TRANSPORT = 1;
    const STATISTICAL_TERRITORY_LIMIT = 2;
    const PRE_CARRIAGE_TRANSPORT = 10;
    const AT_BORDER = 11;
    const AT_DEPARTURE = 12;
    const AT_DESTINATION = 13;
    const MAIN_CARRIAGE_FOURTH_CARRIER = 15;
    const MAIN_CARRIAGE_FIFTH_CARRIER = 16;
    const MAIN_CARRIAGE_SIXTH_CARRIER = 17;
    const MAIN_CARRIAGE_SEVENTH_CARRIER = 18;
    const MAIN_CARRIAGE_EIGHTH_CARRIER = 19;
    const MAIN_CARRIAGE_TRANSPORT = 20;
    const MAIN_CARRIAGE_FIRST_CARRIER = 21;
    const MAIN_CARRIAGE_SECOND_CARRIER = 22;
    const MAIN_CARRIAGE_THIRD_CARRIER = 23;
    const INLAND_WATERWAY_TRANSPORT = 24;
    const DELIVERY_CARRIER_ALL_TRANSPORT = 25;
    const SECOND_PRE_CARRIAGE_TRANSPORT = 26;
    const PRE_ACCEPTANCE_TRANSPORT = 27;
    const SECOND_ON_CARRIAGE_TRANSPORT = 28;
    const MAIN_CARRIAGE_NINTH_CARRIER = 29;
    const ON_CARRIAGE_TRANSPORT = 30;
    const MAIN_CARRIAGE_TENTH_CARRIER = 31;
    const MAIN_CARRIAGE_ELEVENTH_CARRIER = 32;
    const MAIN_CARRIAGE_TWELFTH_CARRIER = 33;

    public static function getDescription($code) {
        switch ($code) {
            case self::INLAND_TRANSPORT:
                return 'Inland transport';
            case self::STATISTICAL_TERRITORY_LIMIT:
                return 'At the statistical territory limit';
            case self::PRE_CARRIAGE_TRANSPORT:
                return 'Pre-carriage transport';
            case self::AT_BORDER:
                return 'At border';
            case self::AT_DEPARTURE:
                return 'At departure';
            case self::AT_DESTINATION:
                return 'At destination';
            case self::MAIN_CARRIAGE_FOURTH_CARRIER:
                return 'Main carriage - fourth carrier';
            case self::MAIN_CARRIAGE_FIFTH_CARRIER:
                return 'Main carriage - fifth carrier';
            case self::MAIN_CARRIAGE_SIXTH_CARRIER:
                return 'Main carriage - sixth carrier';
            case self::MAIN_CARRIAGE_SEVENTH_CARRIER:
                return 'Main carriage - seventh carrier';
            case self::MAIN_CARRIAGE_EIGHTH_CARRIER:
                return 'Main carriage - eighth carrier';
            case self::MAIN_CARRIAGE_TRANSPORT:
                return 'Main-carriage transport';
            case self::MAIN_CARRIAGE_FIRST_CARRIER:
                return 'Main carriage - first carrier';
            case self::MAIN_CARRIAGE_SECOND_CARRIER:
                return 'Main carriage - second carrier';
            case self::MAIN_CARRIAGE_THIRD_CARRIER:
                return 'Main carriage - third carrier';
            case self::INLAND_WATERWAY_TRANSPORT:
                return 'Inland waterway transport';
            case self::DELIVERY_CARRIER_ALL_TRANSPORT:
                return 'Delivery carrier all transport';
            case self::SECOND_PRE_CARRIAGE_TRANSPORT:
                return 'Second pre-carriage transport';
            case self::PRE_ACCEPTANCE_TRANSPORT:
                return 'Pre-acceptance transport';
            case self::SECOND_ON_CARRIAGE_TRANSPORT:
                return 'Second on-carriage transport';
            case self::MAIN_CARRIAGE_NINTH_CARRIER:
                return 'Main carriage - ninth carrier';
            case self::ON_CARRIAGE_TRANSPORT:
                return 'On-carriage transport';
            case self::MAIN_CARRIAGE_TENTH_CARRIER:
                return 'Main carriage - tenth carrier';
            case self::MAIN_CARRIAGE_ELEVENTH_CARRIER:
                return 'Main carriage - eleventh carrier';
            case self::MAIN_CARRIAGE_TWELFTH_CARRIER:
                return 'Main carriage - twelfth carrier';
            default:
                return 'Unknown code';
        }
    }
}

enum UNMeasurementPurposeCode: string 
{
    case ACTUAL_MEASUREMENT = 'AAE'; // Actual measurement
    case DIMENSION 			= 'DIM'; // Dimension
    case GROSS_WEIGHT 		= 'G'; // Gross weight
    case NET_WEIGHT 		= 'N'; // Net weight
}

enum UNMeasurementUnitCode: string {
    case KILOGRAM 	 = 'KGM'; // Kilogram
    case METER 		 = 'MTR'; // Meter
    case CUBIC_METER = 'MTQ'; // Cubic Meter
    case TON 		 = 'TNE'; // Ton
}


enum UNMeasuredAttributeCode: string 
{
    case LENGTH = 'LN'; // Length
    case WIDTH  = 'WD'; // Width
    case HEIGHT = 'HT'; // Height
    case VOLUME = 'VOL'; // Volume
    case WEIGHT = 'WT'; // Weight

	public function source() 
	{
		return "https://service.unece.org/trade/untdid/d01a/tred/tred6313.htm";
	}
}

enum UNEmptyFullContainerStatus: string {
    case FULL  = 1; // Full container load
    case EMPTY = 2; // Empty container

	public static function getDescription($code) {
		switch ($code) {
			case self::FULL:
				return 'Full container load';
			case self::EMPTY:
				return 'Empty container';
			default:
				return 'Unknown code';
		}
	}
}



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

	public function getKGWeightEmpty($string)
	{
		$data = self::getContainerData($string, false);

		if ($data)
		{
			if (isset($data["empty_weight"]))
			{
				return $data["empty_weight"];
			}
		}

		$size = self::containerSizeFromString($string);

		switch ($size)
		{
			case 20:
				return "2200"; // could be 2400
			case 40:
				return "3600"; // could be 4000
			case 45:
				return "4200"; // could be 4800
		}
	}

	public function getKGWeightFull($string)
	
	{
		$data = self::getContainerData($string, false);

		if ($data)
		{
			if (isset($data["full_weight"]))
			{
				return $data["full_weight"];
			}
		}
		
		$size = self::containerSizeFromString($string);

		switch ($size)
		{
			case 20:
				return "24000"; // could be 30480
			case 40:
				return "30480"; // could be 30480
			case 45:
				return "32500"; // could be 32500
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
