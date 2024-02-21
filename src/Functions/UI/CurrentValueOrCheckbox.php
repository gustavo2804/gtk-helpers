<?php


function currentValueOrCheckbox(
    $dataAccessor,
    $identifier,
    $phpKey,
    $value,
    $options
){
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