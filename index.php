<?php
session_start();

// Autoload
spl_autoload_register(function ($class) {
    if (file_exists('controllers/' . $class . '.php')) {
        require_once 'controllers/' . $class . '.php';
    } elseif (file_exists('models/' . $class . '.php')) {
        require_once 'models/' . $class . '.php';
    } elseif (file_exists('config/' . $class . '.php')) {
        require_once 'config/' . $class . '.php';
    }
});

require_once 'web.php';
