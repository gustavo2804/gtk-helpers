<?php


function currentValueOrCheckbox(
    $user,
    $dataAccessor,
    $identifier,
    $phpKey,
    $value,
    $options
){
    $debug = false;

    if (!$identifier || !is_string($identifier))
    {
        if (isset($options["identifier"]))
        {
            $identifier = $options["identifier"];
        }
        else
        {
            throw new Exception("Identifier is required or must be string. Got: ".print_r($identifier, true));
        }
    }

    if (!$phpKey || !is_string($phpKey))
    {
        if (isset($options["phpKey"]))
        {
            $phpKey = $options["phpKey"];
        }
        else
        {
            throw new Exception("PHP Key is required or must be string. Got: ".print_r($phpKey, true));
        }
    }

    if ($debug)
    {
        if ($options)
        {
            error_log("currentValueOrCheckbox - Options: ".print_r($options, true));
        }
        else
        {
            error_log("currentValueOrCheckbox - Options: null");
        }
        error_log("currentValueOrCheckbox - PHPKey: ".$phpKey);
        error_log("currentValueOrCheckbox - Value: ".$value);
        error_log("currentValueOrCheckbox - Identifier: ".$identifier);
    }

    if (isTruthy($value))
    {
        return "<p>".$value."</p>";
    }

    $html = "";

    $checkbox  = "<input";
    $checkbox .= " type='checkbox'";
    $checkbox .= ' id="'.$identifier.'-'.$phpKey.'"'; 
    $checkbox .= ' name="'.$phpKey.'"';
    $checkbox .= '>';

    $html .= $checkbox;

    if (isTruthy($options["explainCheckBox"]))
    {
        $html .= "<span>";
        $html .= $options["explainCheckBox"];
        $html .= "</span>";
    }

    return $html;
}

function currentUserIfChecked($columnMapping, $formItem)
{
    $debug = false;

    $formValue = $columnMapping->getValueFromArray($formItem);

    if ($debug)
    {
        error_log("currentUserIfChecked - Form Value: ".$formValue);
    }

    $toReturn = null;

    switch ($formValue)
    {
        case "1":
        case "checked":
        case "on":
            $toReturn = DataAccessManager::get('persona')->getCurrentUser("cedula");
            break;
        default:
            break;
    }

    return $toReturn;
}

function ensureCannotBeChangedIfTruthy()
{

}
