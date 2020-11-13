<?php
    spl_autoload_register(function ($class) {
        $path = __DIR__ . "/";
        
        $requiredClasses = array(
            "app-commands" =>  $path . "app/commands/" . $class . ".php",
            "app-controllers" =>  $path . "app/controllers/" . $class . ".php",
            "app-models" =>  $path . "app/models/" . $class . ".php",
            "app" =>  $path . "app/" . $class . ".php", 
            "framework" => $path . "framework/" . $class . ".php", 
            "tpl" => $path . "tpl/" . $class . ".php",
            "config" => $path . "config/" . $class . ".php"
        );

        foreach ($requiredClasses as $name => $class) {
            if (file_exists($class)) {
                require $class;
            }
        }
    });
?>