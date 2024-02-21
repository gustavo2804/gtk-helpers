<?php 

function isInvalidFile($fileKey, $options)
{
    $debug = false;

    $required         = true;
    $allowedFileSpecs = null;

    if ($options)
    {

        if (isset($options["filesContainer"]))
        {
            $filesContainer = $options["filesContainer"];

            if ($debug)
            {
                gtk_log("Got files container: ".serialize($filesContainer));
            }

            if (isTruthy($filesContainer["isTest"]))
            {
                return false;
            }
        }

        if (isset($options["maxImageSize"]))
        {
            $maxImageSize = $options["maxImageSize"];
        }

        if (isset($options["required"]))
        {
            $required = $options["required"];
        }
        else if (isset($allowedFileSpecs["required"]))
        {
            $required = $allowedFileSpecs["required"];
        }

        if (!isset($options["allowedFileSpecs"]))
        {
            return new FormResult(
                ConduceSaveOptions::InvalidData, 
                "No se especificaron allowedFileSpecs");
        }
        else
        {
            if (isset($allowedFileSpecs[$fileKey]))
            {
                $allowedFileSpecs = $options["allowedFileSpecs"][$fileKey];
            }
            else
            {
                $allowedFileSpecs = $options["allowedFileSpecs"];
            }
            
        }
    }


    $containsSubstantiatedFile = containsSubstantiatedFile($fileKey, [
        "filesContainer"   => $filesContainer,
        "allowedFileSpecs" => $allowedFileSpecs,
    ]);

    if (!$containsSubstantiatedFile)
    {
        if ($required)
        {
            $missingMessage = useFirstArrayToSetKey("missingMessage", [
                $options, $allowedFileSpecs,
            ], "File `$fileKey` missing. Invalid data.");
    
            if ($debug)
            {
                error_log($missingMessage);
            }
    
            return new FormResult(
                0,
                $missingMessage);
        }
        else 
        {
            return false;
        }
    }

    if (!fileConformsToAllowedTypes($fileKey, [
        "filesContainer"    => $filesContainer,
        "allowedFileSpecs"  => $allowedFileSpecs,
    ]))
    {
        $notAllowableTypeMessage = useFirstArrayToSetKey("notAllowableTypeMessage", [
            $options, $allowedFileSpecs,
        ], "File `$fileKey` does not conform to allowable types. Invalid data.");
            

        if ($debug)
        {
            error_log($notAllowableTypeMessage);
        }


        return new FormResult(
            0,
            $notAllowableTypeMessage);
    }

    if (!fileConformsToSize($fileKey, [
        "filesContainer"   => $filesContainer,
        "allowedFileSpecs" => $allowedFileSpecs,
    ]))
    {
        $tooBigMessage = useFirstArrayToSetKey("tooBigMessage", [
            $options, $allowedFileSpecs,
        ], "File `$fileKey` does not conform to allowable types. Invalid data.");
            
        if ($debug)
        {
            error_log($tooBigMessage);
        }

        return new FormResult(
            0,
            $tooBigMessage);
    }
}