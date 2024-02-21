<?php

function generateSelectForDictionary(
    $conceptos,
    $dataAccessor,
    $objectID,
    $columnName,
    $columnValue,
    $options = null
){
    $select = '<select name="' . $columnName . '">';

    foreach ($conceptos as $concepto)
    {
        $label = null;

        if (isset($concepto["label"]))
        {
            if (isTruthy($concepto["label"]))
            {
                $label = $concepto["label"];
            }
            
        }
        
        if (!$label)
        {
            $label = $concepto["value"];
        }
        
        $select .= '<option';
        $select .= ' value="'.$concepto["value"] .'"';
        if ($columnValue === $concepto["value"])
        {
            $select .= ' selected ';
        }
        $select .= '>';
        $select .= $label;
        $select .= '</option>';
    }

    $select .= "</select>";


    return $select;
}
