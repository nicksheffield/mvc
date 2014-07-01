<?php

# start output buffering. This temporarily stores any echoes or included views.
# We will output it later, at the bottom of this file.
# This allows us to use a header redirect any time, without worrying about previous echoes.
ob_start();

# Define constants for the app and system folders
define('APP_URL', '../app');
define('SYS_URL', '../sys');

# Load the config file that contains all the settings for this application
require_once(APP_URL.'/config/config.php');

# Load the routes file that handles unique routes
require_once(APP_URL.'/config/routes.php');

# set the base url constant, which we will use in html
define('BASE_URL', $config['base_url']);

# loading for system classes that definitely need to be loaded into the registry
require_once(SYS_URL.'/libraries/load.php');

# Load the Registry
require_once(SYS_URL.'/libraries/registry.php');
Registry::$config = $config;
Registry::$routes = $routes;

# Load the base Controller class
require_once(SYS_URL.'/libraries/controller.php');
require_once(SYS_URL.'/libraries/model.php');

# Autoload all the classes needed
require_once(SYS_URL.'/core/autoload.php');

# Deal with the url to see exactly what controller we are using
require_once(SYS_URL.'/core/routing.php');

# output any views we have loaded and any echoes we did.
echo ob_get_clean();