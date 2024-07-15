<?php 



function dateOnlyFromString($date, $format = 'Y-m-d')
{
    $dateTime = new DateTime($date);
    $dateTime->setTime(0, 0);
    return $dateTime->format('Y-m-d');
}

class UNEDIFactContainerStatus
{

    const RESERVED = 1;
    const EXPORT = 2;
    const IMPORT = 3;
	const EMPTY_CONTAINER = 4;
    const FULL_CONTAINER = 5;
    const TRANSHIPMENT = 6;
    const RESERVED_2 = 7;
    const RESERVED_3 = 8;
    const RESERVED_4 = 9;

    public static function getDescription($status) {
        switch ($status) {
            case self::EMPTY_CONTAINER:
                return 'Empty container';
            case self::FULL_CONTAINER:
                return 'Full container';
            case self::RESERVED:
                return 'Reserved';
            case self::EXPORT:
                return 'Export';
            case self::IMPORT:
                return 'Import';
            case self::TRANSHIPMENT:
                return 'Transhipment';
            case self::RESERVED_2:
            case self::RESERVED_3:
            case self::RESERVED_4:
                return 'Reserved for future use';
            default:
                return 'Unknown status';
        }
    }

    public static function isValid($status) {
        return in_array($status, [
            self::EMPTY_CONTAINER,
            self::FULL_CONTAINER,
            self::RESERVED,
            self::EXPORT,
            self::IMPORT,
            self::TRANSHIPMENT,
            self::RESERVED_2,
            self::RESERVED_3,
            self::RESERVED_4
        ]);
    }
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


	//-----------------------------------------
	// ISO Code Legend
	//-----------------------------------------
	// 1st Digit - Length (2 - 20, 4 - 40, L/5 - 45, M - 48)
	// 2nd Digit - Height 
	//		0 - 8'
	//		2 - 8'6" 
	//		5 - 9'6"
	// Last 2 Digits - Type
	// 		G1 - General Purpose
	// 		P1 - Flat Rack / Platform Container
	// 		R1 - Refrigerated Container
	// 		U1 - Open Top Container
	// 		T1 - Tank Container
	// 		HH - Half Height (non standar, MSC thing)
	// - https://www.bic-code.org/size-type-code/
	// - https://www.bic-code.org/type-code-designation/
	/* Non Standard / Not Really ISO Containers


	Here's the table formatted as a TXT table with headers, separated by "|", and spaced for easy readability:

	Code   | Description                                          | Cntr Type            | TEU's | Container type group | ISO Code
	-------|------------------------------------------------------|----------------------|-------|----------------------|----------
	20.1   | 20FT BOX 8FT DRY VAN                                 | DRY VAN              | 1     |                      | 20G1
	25.7   | 20FT HIGH CUBE TK CONT. (25T0) NON DANGEROUS LIQ.    | HIGH CUBE            | 1     |                      | 20HH
	22.8   | 20' DRY BULK CONTAINER                               | BULK VAN             | 1     |                      | 22B0
	22.1   | 20' DRY VAN                                          | DRY VAN              | 1     |                      | 22G1
	22.2   | 20IN INSULATED                                       | INSULATED            | 1     |                      | 22H0
	22.61  | 20 FT FLAT                                           | FLAT RACK            | 1     |                      | 22P1
	22.62  | 20FT FREESTANDING POST FLAT RACK                     | FLAT RACK            | 1     |                      | 22P2
	22.63  | 20' DOMINO F/R 30MGW                                 | FLAT RACK            | 1     |                      | 22P3
	22.64  | 20' FLAT COLLAPSIBLE                                 | FLAT RACK            | 1     |                      | 22P3
	22.99  | 20FT POWERPACK                                       | POWER PACK           | 1     | 20' DRY VAN          | 22PP
	24.99  | 20FT POWERPACK HIGH CUBE 9-6                         | POWER PACK           | 1     |                      | 22PP
	22.32  | 20' REEFER                                           | REEFER               | 1     |                      | 22R1
	25.32  | 20' REEFER                                           | REEFER               | 1     |                      | 22R1
	22.7   | 20CT TANK CONTAINER                                  | TANK                 | 1     |                      | 22T0
	22.76  | 20CT TANK CONTAINER (DANGEROUS CARGO)                | TANK                 | 1     |                      | 22T0
	22.74  | 20CT TANK CONTAINER (DANGEROUS LIQUID)               | TANK                 | 1     |                      | 22T0
	22.75  | 20CT TANK CONTAINER (DANGEROUS CARGO)                | TANK                 | 1     |                      | 22T6
	22.51  | 20OT OPEN TOP                                        | OPEN TOP             | 1     |                      | 22U1
	22.13  | 20VE VENTILATED                                      | VENTILATED           | 1     |                      | 22V0
	26.72  | 20' HC TANK (24K2) (NON-DENGER.) 4 BAR               | TANK                 | 1     | 20' TANK CONTAINER   | 24K2
	24.1   | 20HC HIGH CUBE                                       | HIGH CUBE            | 1     |                      | 25G1
	25.01  | 20' HC OPEN SIDE                                     | HIGH CUBE            | 1     | 20' HIGH CUBE        | 25G2
	45.51  | 40 HIGH CUBE OPEN TOP                                | OPEN TOP             | 2     |                      | 40OT
	90     | 45' PALLETWIDE STANDARD CONTAINER                    | PL                   | 2     | 40' FLAT RACK        | 40PW
	43.8   | 40BV BULK VAN                                        | BULK VAN             | 2     |                      | 42B0
	42.09  | 40DV PALLETWIDE                                      | DRY VAN              | 2     | 20' DRY VAN          | 42G0
	43.99  | 40FT POWER PACK (DV)                                 | DRY VAN              | 2     |                      | 42G0
	43.1   | 40' DRY VAN                                          | DRY VAN              | 2     |                      | 42G1
	45.99  | 40' FT POWER PACK (HC)                               | HIGH CUBE            | 2     |                      | 42P0
	48.99  | 40FT TRIAXLE CHASSIS                                 | CHASSIS SLIDER       | 1     |                      | 42P0
	43.61  | 40' FIXED END FL                                     | FLAT RACK            | 2     |                      | 42P1
	43.62  | 40FT FLAT RACK FIXED STANDING POST                   | FLAT RACK            | 2     |                      | 42P2
	45.63  | 40' HIGHCUBE FLATRACK COLLAPSIBLE COMPLETE-ENDS      | FLAT RACK            | 2     | 40' FLAT RACK        | 42P3
	43.64  | 40FT COLLAPSIBLE FLAT RACK                           | FLAT RACK            | 2     |                      | 42P3
	43.63  | 40FT COLLAPSIBLE STACK BED                           | FLAT RACK            | 2     |                      | 42P3
	45.61  | 40FT FL FIXED END HIGH CUBE                          | FLAT RACK            | 2     |                      | 42P3
	43.32  | RF4/40' REEFER                                       | REEFER               | 2     |                      | 42R1
	43.75  | 40 CT TANK CNTR (DANGEROUS CARGO)                    | TANK                 | 2     |                      | 42T0
	43.7   | 40CT TANK CONTAINER                                  | TANK                 | 2     |                      | 42T0
	43.51  | 40' OPEN TOP                                         | OPEN TOP             | 2     |                      | 42U1
	42.56  | 40HT HARD TOP                                        | HIGH CUBE            | 2     |                      | 42U6
	43.13  | 40VE 40FT VENTILATED                                 | VENTILATED           | 2     |                      | 42V0
	46.51  | 40HH HALF HIGH                                       | HALF HIGH            | 2     |                      | 45G0
	45.19  | 40HP - HIGH CUBE PALLETWIDE                          | PALLETWIDE           | 2     | 40' HIGH CUBE        | 45G0
	45.1   | 40' HIGH CUBE                                        | HIGH CUBE            | 2     |                      | 45G1
	45.32  | 40' HIGH CUBE REEFER                                 | HR                   | 2     |                      | 45R1
	49.6   | 40' PLATFORM                                         | FLAT PL              | 2     |                      | 48P0
	44.81  | 40' TANK DRY BULK                                    | TANK                 | 2     | 20' TANK CONTAINER   | 4DNL
	94     | 45FT HIGH CUBE - L5G1                                | HIGH CUBE            | 2     |                      | L5G1

	//========================================================================================================================
	//========================================================================================================================
	//========================================================================================================================
	
	
	  MSC Code  | Description									| Type				|  TEUs |  Container Group	| ISO Code
	------------------------------------------------------------------------------------------------------------------------
		18.7	| 10 FEET HALF HIGHT TANK						| TANK				|   0.5	| 					|
		22.09	| 20DV PALLETWIDE								| DRY VAN			|   1	| 					|
		28.51	| 20FT HALF OPEN TOP							| OPEN TOP			|   1	| 					|
		26.51	| 20FT HH HALF HEIGHT							| HALF HIGH			|   1	| 					|
		28.7	| 20FT HH THERMAL TANK							| TANK				|   1	| 					|
		25.19	| 20HC PALLETWIDE								| HIGH CUBE			|   1	| 					|
		22.01	| 20OS OPEN SIDE								| OPEN SIDE			|   1	| 					|
		22.15	| 20VE VENTILATED								| VENTILATED		|   1	| 					|
		29.99	| 23' CHASSIS (SLIDER)							| CHASSIS SLIDER	|   1	| 					|
		33.99	| 23' TRIAXLE CHASSIS							| CHASSIS SLIDER	|   1	| 20' FLAT RACK		|
		49.99	| 40' CHASSIS (GOOSENECK)						| CHASSIS SLIDER	|   1	| 					|
		43.2	| 40IN INSULATED								| INSULATED			|   2   |  					|
		43.01	| 40OS OPEN SIDE								| OPEN SIDE    		|   2	| 					|
		95.1	| 9 M3 CONTAINERS								| CHASSIS SLIDER    |   1	| 					|
		99.4	| CLIP-ON GEN SET								| CHASSIS SLIDER    |   1	| 					|
		26.7	| 20FT HALF HEIGHT HEATD BITUMEN TAN (TERMCO)	| TANK				|   1	| 					| 26T0
		29.6	| 20' PLATFORM FLAT								| PL				|   1	| 					| 28P0
		9990	| BREAK BULK									| BULK				|   1	| 20' OPEN TOP		| BV
		0		| BREAKBULL	B									| ULK				|   1	| 					| BV
	*/
	private static $containerData = [
		//--------------------------
		// 20 = 8' 20 foot containers
		//--------------------------
		"20G0" => [ // 1
			"english"   => "20' General Purpose", 
			"spanish"   => "Contenedor de 20 pies propósito general",
			"length"    => 20,
			"stonewood" => "20DC",
		],
		"20G1" => [ // 2
			"english"   => "20' General Purpose (passive vents)", 
			"spanish"   => "Contenedor de 20 pies propósito general (ventilación pasiva)",
			"length"    => 20,
			"stonewood" => "20DC",
			"msc_code"  => "20.1",
		],
		"20HH"	=> [ // 3
			"english"   => "20FT HIGH CUBE TK CONT. (25T0) NON DANGEROUS LIQ.", 
			"spanish"   => "20FT HIGH CUBE TK CONT. (25T0) NON DANGEROUS LIQ.",
			"length"    => 20,
			"stonewood" => "20TK",
			"msc_code"  => "25.7",
		],
		"20P1" => [ // 4
			"english"   => "20' Flat (fixed ends)", 
			"spanish"   => "Contenedor de 20 pies tipo plataforma (extremos fijos)",
			"length"    => 20,
			"stonewood" => "20FR",
		],
		"22T0" => [ // 5
			"english"   => "20' Tank (nondangerous liquids, test pressure 0,45 bar)", 
			"spanish"   => "Contenedor de 20 pies cisterna (líquidos no peligrosos, presión de prueba 0,45 bar)",
			"length"    => 20,
			"stonewood" => "20TK",
		],
		"20T5" => [ // 6
			"english"  => "20' Tank (dangerous liquids, test pressure 4 bar)", 
			"spanish"  => "Contenedor de 20 pies cisterna (líquidos peligrosos, presión de prueba 4 bar)",
			"length"   => 20,
			"stonewood" => "20TK",
		],
		//--------------------------
		// 22 = 8'6" 20 foot containers 
		//--------------------------
		"22B0" => [ // 1
			"english"   => "20' Dry Bulk Container", 
			"spanish"   => "Contenedor de 20 pies a granel seco",
			"length"    => 20,
			"stonewood" => "20DC",
			"msc_code"  => "22.8",
		],
		"22G1" => [ // 2
			"english"   => "20' General Purpose (passive vents)", 
			"spanish"   => "Contenedor de 20 pies propósito general (ventilación pasiva)",
			"length"    => 20,
			"stonewood" => "20DC",
			"msc_code"  => "22.1",
		],
		"22HO" => [ // 3
			"english"   => "20IN INSULATED", 
			"spanish"   => "Contenedor de 20 pies aislado",
			"length"    => 20,
			"stonewood" => "20DC",
			"msc_code"  => "22.2",
		],
		"22P1" => [ // 4
			"english"   => "20' Flat (fixed ends)", 
			"spanish"   => "Contenedor de 20 pies tipo plataforma (extremos fijos)",
			"length"    => 20,
			"stonewood" => "20FR",
			"msc_code"  => "22.61",
		],
		"22P2" => [ // 5
			"english"   => "20FT FREESTANDING POST FLAT RACK", 
			"spanish"   => "Contenedor de 20 pies tipo plataforma (poste independiente)",
			"length"    => 20,
			"stonewood" => "20FR",
			"msc_code"  => "22.62",
		],
		"22P3" => [ // 7
			"english"   => "20' Domino F/R 30MGW", 
			"spanish"   => "Contenedor de 20 pies tipo plataforma (domino F/R 30MGW)",
			"length"    => 20,
			"stonewood" => "20FR",
			"msc_code"  => "22.63",
		],
		"22P8" => [ // 8
			"english"   => "20' Flat (collapsible flush folding)", 
			"spanish"   => "Contenedor de 20 pies tipo plataforma (plegable, plegado a ras)",
			"length"    => 20,
			"stonewood" => "20FR",
		],
		"22PP" => [ // 9
			"english"   => "20FT POWERPACK", 
			"spanish"   => "Contenedor de 20 pies tipo powerpack",
			"length"    => 20,
			"stonewood" => "20DC",
			"msc_code"  => "22.99",
		],
		"22R1" => [ // 10
			"english"   => "20' Refrigerated", 
			"spanish"   => "Contenedor de 20 pies refrigerado",
			"length"    => 20,
			"stonewood" => "20RH",
			"msc_code"  => [ "22.32", "25.32" ],
		],
		"22R9" => [  // 11
			"english"   => "20' Refrigerated (non foodstuff)", 
			"spanish"   => "Contenedor de 20 pies refrigerado (no productos alimenticios)",
			"length"    => 20,
			"stonewood" => "20RH",
		],
		"22T0" => [ // 12
			"english"   => "20' Tank", 
			"spanish"   => "Contenedor de 20 pies cisterna",
			"length"    => 20,
			"stonewood" => "20TK",
			"msc_code"  => [ "22.7", "22.76", "22.74" ],
		],
		"22T5" => [ // 13
			"english"   => "20' Tank (dangerous liquids, test pressure 4 bar)", 
			"spanish"   => "Contenedor de 20 pies cisterna (líquidos peligrosos, presión de prueba 4 bar)",
			"length"    => 20,
			"stonewood" => "20TK",
		],
		"22T6" => [ // 14
			"english"   => "20' Tank (dangerous liquids, test pressure 6 bar)", 
			"spanish"   => "Contenedor de 20 pies cisterna (líquidos peligrosos, presión de prueba 6 bar)",
			"length"    => 20,
			"stonewood" => "20TK",
			"msc_code"  => "22.75",
		],
		"22U1" => [ // 15
			"english"   => "20' Open Top", 
			"spanish"   => "Contenedor de 20 pies tipo techo abierto",
			"length"    => 20,
			"stonewood" => "20OT",
			"msc_code"  => "22.51",
		],
		"22U6" => [ // 16
			"english"   => "20' Hardtop", 
			"spanish"   => "Contenedor de 20 pies tipo techo rígido",
			"length"    => 20,
			"stonewood" => "20DC",
		],
		"22V0" => [ // 17
			"english"   => "20' Ventilated", 
			"spanish"   => "Contenedor de 20 pies ventilado",
			"length"    => 20,
			"stonewood" => "20DC",
			"msc_code"  => "22.13",
		],
		//--------------------------
		// 24 = 8'6" 20 foot containers HC
		//--------------------------
		"24K2" => [ // 1
			"english"   => "20' HC Tank (24K2) (non-dangerous, 4 bar)", 
			"spanish"   => "Contenedor de 20 pies cisterna alta altura (24K2) (no peligrosos, 4 bar)",
			"length"    => 20,
			"stonewood" => "20TK",
			"msc_code"  => "26.72",
		],
		//--------------------------
		// 25 = 9'6" 20 foot containers HC
		//--------------------------
		"25G1" => [ // 1
			"english"   => "20' High Cube", 
			"spanish"   => "Contenedor de 20 pies alta altura",
			"length"    => 20,
			"stonewood" => "20HC",
			"msc_code" 	=> "24.1",
		],
		"25G2" => [ // 2
			"english"   => "20' High Cube Open Side", 
			"spanish"   => "Contenedor de 20 pies alta altura (lado abierto)",
			"length"    => 20,
			"stonewood" => "20HC",
			"msc_code" 	=> "25.01",
		],
		//--------------------------
		// 4D - 8'6" 40 foot containers
		//--------------------------
		"4DNL" => [ // 1
			"english" => "40' Tank Dry Bulk", 
			"spanish" => "Contenedor de 40 pies cisterna a granel seco",
			"length"  => 40,
			"stonewood" => "40TK",
			"msc_code" => "44.81",
		],
		//--------------------------
		// 40 = 8' 40 foot containers
		//--------------------------
		"40OT" => [ // 1
			"english" => "40' Open Top", 
			"spanish" => "Contenedor de 40 pies tipo techo abierto",
			"length"  => 40,
			"stonewood" => "40OT",
			"msc_code" => "45.51",
		],
		"40PW" => [ // 2
			"english" => "45' Palletwide Standard Container", 
			"spanish" => "Contenedor estándar de 45 pies de ancho de palet",
			"length"  => 40,
			"stonewood" => "40FR",
			"msc_code" => "90",
		],

		//--------------------------
		// 42 = 8'6" 40 foot containers
		//--------------------------
		"42B0" => [ // 1
			"english" => "40' Bulk Van", 
			"spanish" => "Contenedor de 40 pies a granel",
			"length"  => 40,
			"stonewood" => "40DC",
			"msc_code" => "43.8",
		],
		"42G0" => [ // 2
			"english" => "40' General Purpose", 
			"spanish" => "Contenedor de 40 pies propósito general",
			"length"  => 40,
			"stonewood" => "40DC",
			"msc_code" => [ "42.09", "43.99" ],
		],
		"42G1" => [ // 3
			"english" => "40' General Purpose (passive vents)", 
			"spanish" => "Contenedor de 40 pies propósito general (ventilación pasiva)",
			"length"  => 40,
			"stonewood" => "40DC",
			"msc_code" => "43.1",
		],
		"42P0" => [ // 4
			"english" => "40' Power Pack", 
			"spanish" => "Contenedor de 40 pies tipo power pack",
			"length"  => 40,
			"stonewood" => "40DC",
			"msc_code" => "45.99",
		],
		"42P1" => [ // 5
			"english" => "40' Flat (fixed ends)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (extremos fijos)",
			"length"  => 40,
			"stonewood" => "40FR",
			"msc_code" => "43.61",
		],
		"42P2" => [ // 6
			"english" => "40' Flat (fixed standing post)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (poste fijo)",
			"length"  => 40,
			"stonewood" => "40FR",
			"msc_code" => "43.62",
		],
		"42P3" => [ // 7
			"english" => "40' Flat (collapsible)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (plegable)",
			"length"  => 40,
			"stonewood" => "40FR",
			"msc_code" => [ "45.63", "43.64", "43.63", "45.61" ],
		],
		"42P8" => [ // 8
			"english" => "40' Flat (collapsible flush folding)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (plegable, plegado a ras)",
			"length"  => 40,
			"stonewood" => "40FR",
		],
		"42R1" => [ // 9
			"english" => "40' Refrigerated", 
			"spanish" => "Contenedor de 40 pies refrigerado (no productos alimenticios)",
			"length"  => 40,
			"stonewood" => "40RH",
			"msc_code" => "43.32",
		],
		"42R9" => [ // 10
			"english"   => "40' Refrigerated (no foodstuff)", 
			"spanish"   => "Contenedor de 40 pies refrigerado (no productos alimenticios)",
			"length"    => 40,
			"stonewood" => "40RH",
		],
		"42T0" => [ // 11
			"english"   => "40' Tank Dry Bulk", 
			"spanish"   => "Contenedor de 40 pies cisterna a granel seco",
			"length"    => 40,
			"stonewood" => "40TK",
			"msc_code"  => [ "43.75", "43.7" ],
		],
		"42U1" => [ // 12
			"english" => "40' Open Top",
			"spanish" => "Contenedor de 40 pies tipo techo abierto",
			"length"  => 40,
			"stonewood" => "40OT",
			"msc_code" => "43.51",
		],
		"42U6" => [ // 13
			"english"   => "40' Hardtop", 
			"spanish"   => "Contenedor de 40 pies tipo techo rígido",
			"length"    => 40,
			"stonewood" => "40DC",
			"msc_code"  => "42.56",
		],
		"42V0" => [ // 14
			"english" => "40' Ventilated", 
			"spanish" => "Contenedor de 40 pies ventilado",
			"length"  => 40,
			"stonewood" => "40DC",
			"msc_code" => "43.13",
		],
		//--------------------------
		// 40 - 9'6" 40 foot containers
		//--------------------------
		"45G0" => [ // 1
			"english" => "40' High Cube General Purpose", 
			"spanish" => "Contenedor de 40 pies propósito general (alta altura)",
			"length"   => 40,
			"stonewood" => "40HC",
			"msc_code" => [ "46.51", "45.19" ],
		],
		"45G1" => [ // 2
			"english" => "40' High Cube GP (passive vents)", 
			"spanish" => "Contenedor de 40 pies propósito general (alta altura, ventilación pasiva)",
			"length"   => 40,
			"stonewood" => "40HC",
			"msc_code" => "45.1",
		],
		"45R1" => [ // 3
			"english" => "40' Refrigerated", 
			"spanish" => "Contenedor de 40 pies refrigerado",
			"length"   => 40,
			"stonewood" => "40RH",
			"msc_code" => "45.32",
		],
		"45R9" => [ // 4
			"english"  => "40' Refrigerated (no foodstuff)", 
			"spanish"  => "Contenedor de 40 pies refrigerado (no productos alimenticios)",
			"length"   => 40,
			"stonewood" => "40RH",
		],
		"45P0" => [ // 5
			"english" => "40' Flat (fixed ends)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (extremos fijos)",
			"length"  => 40,
			"stonewood" => "40FR",
			"msc_code" => "49.6",
		],
		"45P3" => [ // 6
			"english" => "40' Flat (collapsible)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (plegable)",
			"length"  => 40,
			"stonewood" => "40FR",
		],
		"45P8" => [ // 7
			"english" => "40' Flat (collapsible flush folding)", 
			"spanish" => "Contenedor de 40 pies tipo plataforma (plegable, plegado a ras)",
			"length"  => 40,
			"stonewood" => "40FR",
		],
		"45U1" => [ // 8
			"english" => "40' High Cube Open Top", 
			"spanish" => "Contenedor de 40 pies tipo techo abierto (alta altura)",
			"length"   => 40,
			"stonewood" => "40HC-OT",
		],
		"45U6" => [ // 9
			"english" => "40' High Cube Hardtop",
			"spanish" => "Contenedor de 40 pies tipo techo rígido (alta altura)",
			"length"   => 40,
			"stonewood" => "40HC-DC",
		],
		//
		// 45 ft Container
		//--------------------------
		"L5G1" => [ // 1
			"english" => "45' High Cube General Purpose (passive vents)", 
			"spanish" => "Contenedor de 45 pies propósito general (alta altura, ventilación pasiva)",
			"length"  => 45,
			"stonewood" => "45HC",
			"msc_code" => "94",
		],
		"L2G1" => [ // 2
			"english" => "45'General Purpose Dry Container", 
			"spanish" => "Contenedor de 45 pies propósito general",
			"length"  => 45,
			"stonewood" => "45DC",
		],
	];

	private static $mscCodeLookupKeys;

	public static function prepareMSCCodeLookupKeys()
	{
		$containerData = ContainerNumber::$containerData;

		$mscCodeLookupKeys = [];

		foreach ($containerData as $key => $data)
		{
			if (isset($data["msc_code"]))
			{
				$mscCode = $data["msc_code"];

				if (is_array($mscCode))
				{
					foreach ($mscCode as $code)
					{
						$mscCodeLookupKeys[$code] = $key;
					}
				}
				else
				{
					$mscCodeLookupKeys[$mscCode] = $key;
				}
			}
			else
			{
				// echo "No msc_code for key: ".$key."<br>";
				// error_log("No msc_code for key: $key");
			}
		}

		ContainerNumber::$mscCodeLookupKeys = $mscCodeLookupKeys;
	}

	public static function getByMSCCode($toLookup)
	{
		$debug = false;

		$mscCode = (string)$toLookup;

		if (!ContainerNumber::$mscCodeLookupKeys)
		{
			ContainerNumber::prepareMSCCodeLookupKeys();
		}

		$mscCodeLookupKeys = ContainerNumber::$mscCodeLookupKeys;

		if ($debug)
		{
			$message = "MSC Code Lookup Keys: $mscCode - ".print_r($mscCodeLookupKeys, true)."<br>";
			echo $message;
			error_log($message);
		}

		if (isset($mscCodeLookupKeys[(string)$mscCode]))
		{
			// die("Found it set");
			$key = $mscCodeLookupKeys[$mscCode];
			$containerData = ContainerNumber::getContainerData($key);
			$containerData["iso_type"] = $key;
			
			if ($debug)
			{
				$message = "Container found for mscCode: $mscCode";
				error_log($message);
				echo $message."<br>";
			}

			return $containerData;
		}
		else
		{
			die("No container found for mscCode: $mscCode");
			return null;
		}
	}

	public static function getISOCodeFromMSCCode($mscCode)
	{
		$container = ContainerNumber::getByMSCCode($mscCode);

		if ($container)
		{
			return $container["iso_type"];
		}
		else
		{
			return null;
		}
	}

	public static function generateISOContainerSelect($argument)
	{

		$debug = false;

		if ($argument instanceof CustomInputFunctionArgument)
		{
			$columnName  = $argument->getColumnName();
			$columnValue = $argument->getColumnValue();
			$options     = $argument->getOptions();
		}
		else if (is_array($argument))
		{
			$columnName  = $argument["columnName"];
			$columnValue = $argument["columnValue"];
			$options     = $argument["options"];
		}
		else
		{
			die("Illegal argument type in `generateISOContainerSelect`");
		}


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
			case '25':
				return '20HC';
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
			case '25':
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
