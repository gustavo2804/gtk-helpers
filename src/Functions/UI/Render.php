<?php

// Function to render a template file with data
function renderTemplate($templatePath, $data)
{
    // Implement your template rendering logic here
    // You can use any templating engine or include the template directly

    // For example, using PHP's native include:
    ob_start();
    extract($data);
    include $templatePath;
    return ob_get_clean();
}

function renderPage($input)
{
	$debug = false;

    if (is_string($input)) 
	{
        // If the input is a string, return it as is
        echo $input;
    } 
	elseif (is_object($input))
	{
        // If the input is an object, check if it conforms to a protocol
        // (e.g., has a specific method or property) and handle accordingly
        if (method_exists($input, 'render')) 
		{
            echo $input->render();
        } 
		elseif (property_exists($input, 'template_path')) 
		{
            // Load the template file and render it with the object data
            renderTemplate($input->template_path, (array)$input);
        } 
		else 
		{
            // If the object doesn't conform to any known protocol, return it as is
            echo $input;
        }
    } 
	else if (is_array($input))
	{
		echo "IS ARRAY IN RENDER PAGE";
	}
	else 
	{
        // If the input is neither a string nor an object, return it as is
        echo $input;
    }
}
