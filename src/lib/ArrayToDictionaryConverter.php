<?php

class ArrayToDictionaryConverter 
{
    private $firstKey;
    private $header;
    private $headerArrayCount;
    private $parsedData;
    private $rawData;

    public function __construct($data, $firstKeyAsID) 
    {
        if (!is_array($data))
        {
            return null;
        }

        $isFirst = true;

        foreach ($data as $array)
        {
            if ($isFirst)
            {
                $this->parseHeaderArray($array, $firstKeyAsID);
            }
            else
            {

                $newDict = $this->parseDataArray($array);

                if ($this->firstKey)
                {
                    $id = $newDict[$this->firstKey];
                    $this->parsedData[$id] = $newDict;
                }
                else
                {
                    $this->parsedData[] = $newDict;
                }
                
            }
        }
    }

    public function parseHeaderArray($array, $firstKeyAsID)
    {
        if ($firstKeyAsID)
        {
            $this->firstKey = $array[0];
        }

        $this->header = $array;
        $this->headerArrayCount = count($array);

        /*
        $isFirst = true;

        foreach ($array as $headerKey)
        {
            if ($isFirst)
            {
                if ($firstKeyAsID)
                {
                    $this->firstKey = $headerKey;
                }
            }
        }
        */
    }

    public function parseDataArray($array)
    {
        $toReturn        = [];

        $isKey           = null;
        $currentKey      = null;
        $arrayCount      = count($array);


        
        $valuesFromHeader = array_slice($array, 0, $this->headerArrayCount + 1); // Up to and including the index
        $customValues     = array_slice($array, $this->headerArrayCount + 1);

        $currentKeyCount = 0;

        foreach ($valuesFromHeader as $value)
        {
            $currentKey = $this->header[$currentKeyCount];
            $toReturn[$currentKey] = $value;
            $currentKeyCount++;
        }

        if (count($customValues) == 1 && is_array($customValues))
        {
            $toReturn = array_merge($toReturn, $customValues);
        }
        else if (count($customValues))
        {
            $currentKey = null;
            foreach ($customValues as $value)
            {
                if ($currentKey)
                {
                    $currentKey = $value;
                }
                else
                {
                    $toReturn[$currentKey] = $value;
                    $currentKey = null;
                }
            }
        }

        return $toReturn;
    }
}
