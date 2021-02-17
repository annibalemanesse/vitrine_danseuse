<?php

spl_autoload_register(function ($class)
{
    $sources = [
        "controllers/$class.php",
        "models/$class.php",
        "utilities/$class.php"
    ];

    foreach($sources as $source)
    {
        if(file_exists($source))
        {
            require_once $source;
        }
    }
});