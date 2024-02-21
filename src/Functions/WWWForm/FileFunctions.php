<?php 

function containsSubstantiatedFile($fileKeyToSearchFor, $options = null)
{
	$debug = false;

	$filesContainer = null;

	if ($options)
	{
		if (isset($options["filesContainer"]))
		{
			$filesContainer = $options["filesContainer"];
		}

		if (isset($options["maxImageSize"]))
		{
			$maxImageSize = $options["maxImageSize"];
		}
	}

	if (!$filesContainer)
	{
		if ($debug)
		{
			error_log('Usando $_FILES para $fileContainer');
		}
		$filesContainer = $_FILES;
	}

	if ($debug)
	{
		error_log("Procesando `filesContainer`: ".serialize($filesContainer));
	}

	foreach ($filesContainer as $fileKey => $fileValue)
	{
		if ($fileKeyToSearchFor === $fileKey)
		{
			if (!isset($fileValue["name"]))
			{
				return false;
			}

			$fileValueSize = $fileValue["size"];

			if ($fileValueSize === 0)
			{
				if ($debug)
				{
				
					error_log("Archivo de valor zero");
				}
				return false;
			}

			return true;
		}
	}

	return false;
}


function fileConformsToSize($fileKey, $options)
{
	$debug = false;

	$minSize     = null;
	$maxSize     = null;
	$fileSize    = null;
	$fileDetails = null;

	if ($options)
	{
		if (isset($options["filesContainer"]))
		{
			$filesContainer = $options["filesContainer"];
		}

		if (isset($options["maxSize"]))
		{
			$maxSize = $options["maxSize"];
		}

		if (isset($options["minSize"]))
		{
			$minSize = $options["minSize"];
		}

		if (isset($options["allowedFileSpecs"]))
		{
			$allowedFileSpecs = $options["allowedFileSpecs"];

			if (isset($allowedFileSpecs["maxMegaBytes"]))
			{
				$maxSize = $allowedFileSpecs["maxMegaBytes"] * 1024 * 1024;
			}
		}	
	}

	if (!$filesContainer)
	{
		if ($debug)
		{
			error_log('Usando $_FILES para $fileContainer');
		}
		$filesContainer = $_FILES;
	}

	$fileDetails = $filesContainer[$fileKey];

	if ($debug)
	{
		error_log("Procesando `file`: ".serialize($fileKey).":::".serialize($fileDetails));
	}

	$fileSize = $fileDetails["size"];

	if ($fileSize === 0 || $fileSize === null)
	{
		if ($debug)
		{
			error_log("Archivo de valor zero");
		}
		return false;
	}

	if ($maxSize)
	{
		if ($fileSize > $maxSize)
		{
			if ($debug)
			{
				error_log("Archivo $fileKey excede el tamano");
			}
			return false;
		}
	}

	if ($minSize)
	{
		if ($fileSize < $minSize)
		{
			return false;
		}
	}

	return true;
}

function fileConformsToAllowedTypes($fileKey, $options)
{
	$debug = false;

	$acceptedExtensions = null;

	if ($options)
	{
		if (isset($options["filesContainer"]))
		{
			$filesContainer = $options["filesContainer"];
		}

		if (isset($options["maxSize"]))
		{
			$maxSize = $options["maxSize"];
		}

		if (isset($options["minSize"]))
		{
			$minSize = $options["minSize"];
		}

		if (isset($options["acceptedExtension"]))
		{
			$acceptedExtensions = $options["acceptedExtension"];
		}
		else
		{
			$acceptedExtensions = [
				'jpg',
				'jpeg',
				'png',
				'gif',
				'bmp',
				'heic',
				'pdf',
			];
	
		}
	}

	if (!$filesContainer)
	{
		if ($debug)
		{
			error_log('Usando $_FILES para $fileContainer');
		}
		$filesContainer = $_FILES;
	}

	$fileDetails = $filesContainer[$fileKey];


	if ($debug)
	{
		error_log("Procesando `fileConformsToAllowedTypes` con ".serialize($fileKey));
		error_log("Buscando tipos...: ".serialize($acceptedExtensions));
	}

	$useMimeType = false;
	
	if ($useMimeType)
	{
		$fileType = $fileDetails["type"];
		return in_array($fileType, $acceptedExtensions);
	}
	else
	{
		$fileName       = $fileDetails["name"];
		$fileExtension  = pathinfo($fileName, PATHINFO_EXTENSION);

		return in_array($fileExtension, $acceptedExtensions);
	}
}
