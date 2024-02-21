<?php

function printTo(StreamInterface $destination, $toPrint) {
    $destination->write($toPrint);
}

function printLineTo(StreamInterface $destination, $toPrint) {
    $destination->writeLine($toPrint);
}

function getStreamFromArgs($args) 
{
    foreach ($args as $arg) 
    {
        if (strpos($arg, '--printTo=') === 0) 
        {
            $value = substr($arg, strlen('--printTo='));

            if ($value === 'StringStream') 
            {
                return new StringStream();
            } 
            elseif (is_string($value) && !empty($value)) 
            {
                return new FileStream($value);
            }
        }
    }

    return new StdOutStream();  // default
}
